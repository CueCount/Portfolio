// Responsive Carousel with mobile-only option
// Use data-mobile-only="false" to enable carousel on all screen sizes
class ResponsiveCarousel {
    constructor(element) {
        this.carousel = element;
        this.wrapper = element.querySelector('.carousel-wrapper');
        this.items = element.querySelectorAll('.carousel-item');
        
        // Get options from data attributes
        this.mobileOnly = element.dataset.mobileOnly !== 'false'; // Default: true
        this.cols = parseInt(element.dataset.cols) || 1;
        
        this.currentIndex = 0;
        this.isMobile = window.innerWidth <= 768;
        this.isDragging = false;
        this.startX = 0;
        this.currentX = 0;
        this.initialTransform = 0;
        
        this.init();
    }

    init() {
        // Add dots navigation if not mobile-only
        if (!this.mobileOnly) {
            this.createDots();
        }
        
        this.bindEvents();
        this.updateCarousel();
        
        // Handle window resize
        window.addEventListener('resize', () => {
            const wasMobile = this.isMobile;
            this.isMobile = window.innerWidth <= 768;
            
            if (wasMobile !== this.isMobile) {
                this.currentIndex = 0;
                this.updateCarousel();
            }
        });
    }

    createDots() {
        const dotsContainer = document.createElement('div');
        dotsContainer.className = 'carousel-dots';
        
        const totalSlides = this.getTotalSlides();
        
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'carousel-dot';
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => this.goToSlide(i));
            dotsContainer.appendChild(dot);
        }
        
        this.carousel.appendChild(dotsContainer);
        this.dotsContainer = dotsContainer;
    }

    getTotalSlides() {
        // For mobile, always show 1 item at a time
        if (this.isMobile) {
            return this.items.length;
        }
        // For desktop, account for columns
        return Math.max(1, this.items.length - this.cols + 1);
    }

    updateDots() {
        if (!this.dotsContainer) return;
        
        const dots = this.dotsContainer.querySelectorAll('.carousel-dot');
        const totalSlides = this.getTotalSlides();
        
        // Show/hide dots based on total slides
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
            dot.style.display = index < totalSlides ? '' : 'none';
        });
    }

    bindEvents() {
        // Touch events for mobile
        this.wrapper.addEventListener('touchstart', (e) => this.handleStart(e), { passive: false });
        this.wrapper.addEventListener('touchmove', (e) => this.handleMove(e), { passive: false });
        this.wrapper.addEventListener('touchend', (e) => this.handleEnd(e), { passive: true });

        // Mouse events for desktop drag (only if not mobile-only)
        if (!this.mobileOnly) {
            this.wrapper.addEventListener('mousedown', (e) => this.handleStart(e));
            this.wrapper.addEventListener('mousemove', (e) => this.handleMove(e));
            this.wrapper.addEventListener('mouseup', (e) => this.handleEnd(e));
            this.wrapper.addEventListener('mouseleave', (e) => this.handleEnd(e));
        }

        // Prevent context menu on long press
        this.wrapper.addEventListener('contextmenu', (e) => {
            if (this.isDragging) e.preventDefault();
        });

        // Prevent default drag behavior on images
        this.wrapper.addEventListener('dragstart', (e) => e.preventDefault());
    }

    // Check if carousel should be active
    isCarouselActive() {
        if (this.mobileOnly) {
            return this.isMobile;
        }
        return true; // Always active if not mobile-only
    }

    handleStart(e) {
        if (!this.isCarouselActive()) return;
        if (e.type === 'mousedown' && e.button !== 0) return; // Only left mouse button
        
        this.isDragging = true;
        this.wrapper.style.cursor = 'grabbing';
        this.wrapper.style.transition = 'none';
        
        const clientX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
        this.startX = clientX;
        this.currentX = clientX;
        
        // Store current transform value
        const currentTransform = this.wrapper.style.transform;
        const match = currentTransform.match(/translateX\((-?\d+(?:\.\d+)?)px\)/);
        this.initialTransform = match ? parseFloat(match[1]) : 0;

        e.preventDefault();
    }

    handleMove(e) {
        if (!this.isDragging || !this.isCarouselActive()) return;
        
        const clientX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
        this.currentX = clientX;
        
        const deltaX = this.currentX - this.startX;
        const newTransform = this.initialTransform + deltaX;
        
        // Add resistance at the edges
        const maxTransform = 0;
        const minTransform = this.getMinTransform();
        
        let resistedTransform = newTransform;
        if (newTransform > maxTransform) {
            resistedTransform = maxTransform + (newTransform - maxTransform) * 0.3;
        } else if (newTransform < minTransform) {
            resistedTransform = minTransform + (newTransform - minTransform) * 0.3;
        }
        
        this.wrapper.style.transform = `translateX(${resistedTransform}px)`;
        
        e.preventDefault();
    }

    handleEnd(e) {
        if (!this.isDragging) return;
        
        this.isDragging = false;
        this.wrapper.style.cursor = 'grab';
        this.wrapper.style.transition = 'transform 0.3s ease';
        
        if (!this.isCarouselActive()) return;
        
        const deltaX = this.currentX - this.startX;
        const threshold = 80; // Minimum distance to trigger slide change
        const totalSlides = this.getTotalSlides();
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0 && this.currentIndex > 0) {
                this.currentIndex--;
            } else if (deltaX < 0 && this.currentIndex < totalSlides - 1) {
                this.currentIndex++;
            }
        }
        
        this.updateCarousel();
    }

    getItemWidth() {
        return this.items[0]?.offsetWidth || 0;
    }

    getMinTransform() {
        const itemWidth = this.getItemWidth();
        const gap = 15;
        const visibleItems = this.isMobile ? 1 : this.cols;
        return -((this.items.length - visibleItems) * (itemWidth + gap * 2));
    }

    goToSlide(index) {
        const totalSlides = this.getTotalSlides();
        if (index >= 0 && index < totalSlides) {
            this.currentIndex = index;
            this.updateCarousel();
        }
    }

    updateCarousel() {
        // Update dots
        this.updateDots();
        
        if (!this.isCarouselActive()) {
            // Carousel inactive: reset transform
            this.wrapper.style.transform = 'translateX(0)';
            this.wrapper.style.transition = '';
            this.carousel.classList.remove('carousel-active');
            return;
        }

        // Carousel active
        this.carousel.classList.add('carousel-active');
        
        const itemWidth = this.getItemWidth();
        const gap = 15; // Gap between items
        const translateX = -(this.currentIndex * (itemWidth + gap * 2));
        
        this.wrapper.style.transform = `translateX(${translateX}px)`;
    }
}

// Initialize all carousels when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(carousel => new ResponsiveCarousel(carousel));
});