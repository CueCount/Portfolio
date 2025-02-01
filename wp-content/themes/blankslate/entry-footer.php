<footer class="entry-footer">
    <div class="container">
        <div class="container-content">
            <?php if ( comments_open() ) { echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'blankslate' ) ) . '</a></span>'; } ?>
        </div>
    </div>
</footer>