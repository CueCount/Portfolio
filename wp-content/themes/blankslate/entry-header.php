<header id="header" role="banner" class="container-fullWidth entry-header" style="">

    <div class="container-content header-padding">
        <div class="container-text-01">
            <p class="small tag pink">
                James Mocko, Digital Designer with UX/UI Experience
            </p>
            <div class="highlight">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="highlight-bottom-text">
                <span class="cat">
                    <?php $categories = get_the_category(); $post_tags = get_the_tags();
                    if (!empty($categories)) : 
                        foreach ($categories as $category) {echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="tag pill pink">' . esc_html($category->name) . '</a> ';}
                    endif; 
                    if ($post_tags) {
                        foreach ($post_tags as $tag) {echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag pill pink">' . esc_html($tag->name) . '</a> ';}
                    } ?>
                </span>
            </div>
        </div>
    </div>
</header>