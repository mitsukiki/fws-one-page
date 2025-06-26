<?php get_header() ?>
<div class="content-wrapper content-wrapper_full">
    <main id="primary" class="main-content">
        <article class="single">
            <div class="container960 single__inner">
                <header class="single-header">
                    <div class="single-header__inner">
                        <div class="single-header-main">
                            <div class="single-header-data">
                                <time datetime="<?php echo get_the_date('c'); ?>"
                                    class="single-header-data__time"><?php echo get_the_date('Y.m.d'); ?></time>
                                <ul class="single-header-data__cat-list">
                                    <?php
                                    $categories = get_the_category();
                                    $catClass = "";
                                    $category_names = array();
                                    foreach ($categories as $category) {
                                        ?>
                                        <li class="single-header-data__cat-item">
                                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="single-header-data__cat-link">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="single-header-tit">
                                <h1 class="single-header-tit__tit"><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="single-content is-layout-constrained">
                    <?php the_content(); ?>
                </div>
                <div class="">
                    <?php
                    get_template_part('template-parts/post-navigation');
                    ?>
                </div>
            </div>
        </article>
    </main><!-- #main -->
</div>

<?php get_footer() ?>