<?php get_header();
?>

<div class="content-wrapper">
    <main id="primary" class="main-content main-content_full">
        <?php
        get_template_part('template-parts/breadcrumbs');
        $args = array(
            'title' => get_the_archive_title(),
        );
        get_template_part('template-parts/page-fv', null, $args);
        if (have_posts()) :
        ?>
            <section>
                <div class="container960 sec-spacing">
                    <div class="">
                        <?php
                        while (have_posts()) :

                            the_post();

                            get_template_part('template-parts/entry-card');

                        endwhile;
                        ?>
                    </div>
                <?php
                $args = array(
                    'mid_size'           => 1,
                    'prev_text'          => '<',
                    'next_text'          => '>',
                    'screen_reader_text' => ' ',
                );
                the_posts_pagination($args);

            endif;
                ?>
                </div>
            </section>
    </main><!-- #main -->
</div>

<?php
get_footer();
