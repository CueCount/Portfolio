<footer id="footer" role="contentinfo" class="container-content bottom-nav">
    <a href="james_mocko_resume.pdf" target="_blank" class="bottom-nav-button">Download Resume</a>
    <a href="#header" class="bottom-nav-button">Back to Top</a>
    <?php if (!is_front_page() && !is_home()): ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="bottom-nav-button">Back to Home</a>
    <?php endif; ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>