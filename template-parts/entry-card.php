
<article class="entry-card">
    <a href="<?php the_permalink(); ?>" class="entry-card__link">
        <div class="entry-card-data">
            <time datetime="<?php echo get_the_date("Y-m-d") ?>" class="entry-card-data__date">
                <?php echo get_the_date("Y.m.d") ?>
            </time>
            <ul class="entry-card-data__cat-list">
                <?php
                $categories = get_the_category();
                $catClass = "";
                $category_names = array();
                foreach ($categories as $category) {
                    ?>
                    <li class="entry-card-data__cat-item">
                        <?php
                        echo esc_html($category->name);
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="entry-card-tit">
            <h3 class="entry-card-tit__tit">
                <?php the_title(); ?>
            </h3>
        </div>
    </a>
</article>