<div class="post-navigation">
    <div class="post-navigation__inner">
        <nav class="post-navigation-main">
            <?php
            $previous_post = get_previous_post();
            $next_post = get_next_post();
            if (!empty($next_post)) {
            ?>
                <div class="post-navigation-main__nav post-navigation-main__nav_next">
                    <?php
                    $next_title = wp_trim_words($next_post->post_title, 50, '...'); // ここで50語に制限
                    next_post_link('%link', $next_title);
                    ?>
                </div>
            <?php
            }
            if (!empty($previous_post)) {
            ?>
                <div class="post-navigation-main__nav post-navigation-main__nav_prev">
                    <?php
                    $prev_title = wp_trim_words($previous_post->post_title, 50, '...'); // ここで50語に制限
                    previous_post_link('%link', $prev_title);
                    ?>
                </div>
            <?php
            }
            ?>
        </nav>
    </div>
</div>