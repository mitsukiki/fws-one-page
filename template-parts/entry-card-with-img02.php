<article class="shadow-[0_0_20px_0_rgba(0,0,0,0.1)]">
    <a href="<?php the_permalink(); ?>" class="hover:brightness-125 transition block p-4">
        <div class="mb-2">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', array('class' => 'block w-full object-cover aspect-[3/2]')); ?>
            <?php else : ?>
                <img class="block w-full aspect-[3/2]" src="<?php echo get_hash_image_uri("assets/img/dummy.jpg") ?>">
            <?php endif; ?>
        </div>
        <div>
            <time datetime="<?php echo get_the_date('c'); ?>" class="font-num-family font-medium text-[var(--post-time-font-color)] text-[13px] leading-none"><?php echo get_the_date('Y.m.d'); ?></time>
            <h2 class="text-[15px] tracking-[0.1em]">
                <?php the_title(); ?>
            </h2>
        </div>
    </a>
</article>