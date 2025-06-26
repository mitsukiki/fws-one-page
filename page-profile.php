<?php
/*
Template Name: Profile
*/
get_header();
?>

<div class="content-wrapper content-wrapper_full">
    <main id="primary" class="main-content">
        <section class="profile-fv">
            <div class="profile-fv__inner">
                <div class="profile-fv-bg">
                    <?php
                    $sns_bg_image_id = CustomSettingsPlugin::get_setting('sns_bg_image_id', true);
                    if ($sns_bg_image_id) {
                        $sns_bg_image_url = wp_get_attachment_url($sns_bg_image_id);
                    } else {
                        $sns_bg_image_url = get_hash_image_uri("assets/img/profile-fv-bg__img.jpg");
                    }
                    ?>
                    <img src="<?php echo esc_url($sns_bg_image_url); ?>" class="profile-fv-bg__img">
                </div>
                <div class="container960 profile-fv-main">
                    <div class="profile-fv-data">
                        <div class="profile-fv-data-icon">
                            <?php
                            $sns_icon_id = CustomSettingsPlugin::get_setting('sns_icon_id', true);
                            if ($sns_icon_id) {
                                $sns_icon_url = wp_get_attachment_url($sns_icon_id);
                            } else {
                                $sns_icon_url = get_hash_image_uri("assets/img/profile-fv-data-icon__icon.png");
                            }
                            ?>
                            <img src="<?php echo esc_url($sns_icon_url); ?>" alt="" class="profile-fv-data-icon__icon">
                        </div>
                        <div class="profile-fv-data-tit">
                            <div class="profile-fv-data-tit__name">
                                <?php
                                $sns_name = CustomSettingsPlugin::get_setting('sns_name', true);
                                echo esc_html($sns_name ?: 'Growth Hive');
                                ?>
                            </div>
                            <div class="profile-fv-data-tit__post">
                                <?php
                                $sns_post = CustomSettingsPlugin::get_setting('sns_post', true);
                                echo esc_html($sns_post ?: 'Digital Marketing Agency');
                                ?>
                            </div>
                        </div>
                        <div class="profile-fv-data-txt">
                            <p class="profile-fv-data-txt__txt">
                                <?php
                                $sns_description = CustomSettingsPlugin::get_setting('sns_description', true);
                                echo esc_html($sns_description ?: 'データに基づく深い洞察と先進的なマーケティング戦略で、クライアントの成功をリードし、持続的な成長を支援します。');
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $sns_repeater = CustomSettingsPlugin::get_setting('sns_repeater', true);
        if (!empty($sns_repeater) && is_array($sns_repeater)) {
            ?>
            <section class="profile-sns sec-bg_primary">
                <div class="container640 sec-spacing_small profile-sns__inner">
                    <div class="profile-sns-main">
                        <ul class="profile-sns-main__list">
                            <?php

                            foreach ($sns_repeater as $sns_item) {
                                $icon_id = isset($sns_item['icon_id']) ? $sns_item['icon_id'] : '';
                                $title = isset($sns_item['title']) ? $sns_item['title'] : '';
                                $url = isset($sns_item['url']) ? $sns_item['url'] : '';

                                if (!empty($title) || !empty($url) || !empty($icon_id)) {
                                    ?>
                                    <li class="profile-sns-main__item">
                                        <?php if (!empty($url)): ?>
                                            <a href="<?php echo esc_url($url); ?>" class="profile-sns-main__link" target="_blank"
                                                rel="noopener">
                                            <?php else: ?>
                                                <div class="profile-sns-main__link">
                                                <?php endif; ?>
                                                <div class="profile-sns-icon">
                                                    <?php if ($icon_id && wp_get_attachment_url($icon_id)): ?>
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($icon_id)); ?>"
                                                            class="profile-sns-icon__icon" alt="<?php echo esc_attr($title); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url(get_hash_image_uri("assets/img/profile-sns-icon__icon.png")); ?>"
                                                            class="profile-sns-icon__icon" alt="<?php echo esc_attr($title); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="profile-sns-txt">
                                                    <h3 class="profile-sns-txt__tit">
                                                        <?php echo esc_html($title ?: 'SNSリンク'); ?>
                                                    </h3>
                                                </div>
                                                <?php if (!empty($url)): ?>
                                            </a>
                                        <?php else: ?>
                                </div>
                            <?php endif; ?>
                            </li>
                            <?php
                                }
                            }
                            ?>
                    </ul>
                </div>
    </div>
    </section>
<?php
        }

        ?>

<?php
$news_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 5,
    'post_status' => 'publish',
]);
if ($news_query->have_posts()):
    ?>
    <section class="front-news" id="news">
        <div class="container sec-spacing front-news__inner">
            <div class="sec-tit-box" data-aos="custom-fadeIn">
                <div class="sec-tit-box__en-tit">NEWS</div>
                <h2 class="sec-tit-box__jp-tit">お知らせ</h2>
            </div>
            <div class="front-news-main" data-aos="custom-fadeIn">
                <div class="front-news-main__list">
                    <?php

                    while ($news_query->have_posts()):
                        $news_query->the_post();

                        get_template_part('template-parts/entry-card');

                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
                $posts_page_id = get_option('page_for_posts');
                if ($posts_page_id):
                    $posts_page_url = get_permalink($posts_page_id);
                    ?>

                    <div class="front-news-main__btn-area">
                        <a href="<?php echo esc_url($posts_page_url); ?>"
                            class="btn btn_external btn_en front-news-main__btn-link">
                            MORE
                        </a>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
?>
</main><!-- #main -->
</div>

<?php
get_footer();
?>