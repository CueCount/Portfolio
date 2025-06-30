// Add this JavaScript to your theme (enqueue it properly in functions.php)
class ResponsiveCarousel {
    constructor(element) {
        this.carousel = element;
        this.wrapper = element.querySelector('.carousel-wrapper');
        this.items = element.querySelectorAll('.carousel-item');
        
        this.currentIndex = 0;
        this.isMobile = window.innerWidth <= 768;
        this.isDragging = false;
        this.startX = 0;
        this.currentX = 0;
        this.initialTransform = 0;
        
        this.init();
    }

    init() {
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

    bindEvents() {
        // Touch events for mobile
        this.wrapper.addEventListener('touchstart', (e) => this.handleStart(e), { passive: false });
        this.wrapper.addEventListener('touchmove', (e) => this.handleMove(e), { passive: false });
        this.wrapper.addEventListener('touchend', (e) => this.handleEnd(e), { passive: true });

        // Mouse events for desktop drag
        this.wrapper.addEventListener('mousedown', (e) => this.handleStart(e));
        this.wrapper.addEventListener('mousemove', (e) => this.handleMove(e));
        this.wrapper.addEventListener('mouseup', (e) => this.handleEnd(e));
        this.wrapper.addEventListener('mouseleave', (e) => this.handleEnd(e));

        // Prevent context menu on long press
        this.wrapper.addEventListener('contextmenu', (e) => {
            if (this.isDragging) e.preventDefault();
        });

        // Prevent default drag behavior on images
        this.wrapper.addEventListener('dragstart', (e) => e.preventDefault());
    }

    handleStart(e) {
        if (!this.isMobile && e.type === 'mousedown' && e.button !== 0) return; // Only left mouse button
        
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
        if (!this.isDragging || !this.isMobile) return;
        
        const clientX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
        this.currentX = clientX;
        
        const deltaX = this.currentX - this.startX;
        const newTransform = this.initialTransform + deltaX;
        
        // Add resistance at the edges
        const maxTransform = 0;
        const minTransform = -(this.items.length - 1) * (this.getItemWidth() + 30);
        
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
        
        if (!this.isMobile) return;
        
        const deltaX = this.currentX - this.startX;
        const threshold = 80; // Minimum distance to trigger slide change
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0 && this.currentIndex > 0) {
                this.currentIndex--;
            } else if (deltaX < 0 && this.currentIndex < this.items.length - 1) {
                this.currentIndex++;
            }
        }
        
        this.updateCarousel();
    }

    getItemWidth() {
        return this.items[0]?.offsetWidth || 0;
    }

    updateCarousel() {
        if (!this.isMobile) {
            // Desktop: reset transform
            this.wrapper.style.transform = 'translateX(0)';
            this.wrapper.style.transition = '';
            return;
        }

        // Mobile: apply carousel transform
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