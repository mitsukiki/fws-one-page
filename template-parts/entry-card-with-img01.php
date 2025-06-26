<article class="entry-card-with-img01">
    <a href="<?php the_permalink(); ?>" class="entry-card-with-img01__link">
        <div class="entry-card-with-img01__img-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', array('class' => 'entry-card-with-img01__img')); ?>
            <?php else : ?>
                <?php
                $attached_images = get_attached_media('image', get_the_ID());
                if (!empty($attached_images)) :
                    $first_image = array_shift($attached_images);
                    $first_image_src = wp_get_attachment_image_src($first_image->ID, 'large');
                    if ($first_image_src) :
                        echo '<img src="' . esc_url($first_image_src[0]) . '" class="entry-card-with-img01__img">';
                    else :
                ?>
                        <img class="entry-card-with-img01__img" src="<?php echo get_hash_image_uri("assets/img/dummy.jpg") ?>">
                    <?php
                    endif;
                else :
                    ?>
                    <img class="entry-card-with-img01__img" src="<?php echo get_hash_image_uri("assets/img/dummy.jpg") ?>">
                <?php
                endif;
                ?>

            <?php endif; ?>
        </div>
        <div class="entry-card-with-img01__tit-area">
            <h2 class="entry-card-with-img01__tit">
                <?php the_title(); ?>
            </h2>
        </div>
    </a>
</article>