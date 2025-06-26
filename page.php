<?php get_header() ?>
<div class="content-wrapper content-wrapper_full">
    <main id="primary" class="main-content">

        <?php
        get_template_part('template-parts/breadcrumbs');
        get_template_part('template-parts/page-fv');

        while (have_posts()):
            the_post();
        ?>
            <section>
                <div class="container960 sec-spacing">
                    <div class="prose prose-page">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>
            </section>

        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div>

<?php get_footer() ?>