<section class="page-fv sec-bg_secondary">
    <div class="page-fv__inner">
        <div class="page-fv-main">
            <?php
            if (isset($args["en_tit"])):
                ?>
                <div class="page-fv-main__en-tit"><?php echo $args["en_tit"]; ?></div>
            <?php endif; ?>
            <?php
            if (isset($args["jp_tit"])):
                ?>
                <h1 class="page-fv-main__jp-tit"><?php echo $args["jp_tit"]; ?></h1>
            <?php else: ?>
                <h1 class="page-fv-main__jp-tit"><?php the_title(); ?></h1>
            <?php endif; ?>
        </div>
    </div>
</section>