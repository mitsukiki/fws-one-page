<?php get_header(); ?>

<div class="content-wrapper content-wrapper_full">
    <main id="primary" class="main-content">
        <?php
        $args = array(
            "en_tit" => "NEWS",
            "jp_tit" => "ニュース",
        );
        get_template_part('template-parts/page-fv',null , $args);

        get_template_part('template-parts/breadcrumbs');

        ?>
        <section class="news-fv">
            <div class="container960 news-fv__inner">
                <div class="news-fv-main">
                    <div class="news-fv-box">
                        <div class="news-fv-box__inner">
                            <?php if (have_posts()): ?>

                                <ul class="news-fv-box__list simplebar">
                                    <?php while (have_posts()):
                                        the_post(); ?>
                                        <?php
                                        get_template_part('template-parts/entry-card');
                                        ?>
                                    <?php endwhile; ?>
                                </ul>
                                <div class="news-fv-pagination">
                                    <?php
                                    $args = array(
                                        'mid_size' => 1,
                                        'prev_text' => '<',
                                        'next_text' => '>',
                                        'screen_reader_text' => ' ',
                                    );
                                    the_posts_pagination($args);
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>