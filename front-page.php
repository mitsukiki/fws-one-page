<?php
get_header();
?>

<div class="content-wrapper content-wrapper_full">
    <main id="primary" class="main-content">
        <section class="front-fv">
            <div class="front-fv__inner">
                <div class="front-fv-main">
                    <div class="front-fv-txt" data-aos="custom-fadeIn" data-aos-delay="1000">
                        <div class="front-fv-txt__en-tit">
                            Where Nature<br>
                            Meets Innovation.
                        </div>
                        <h2 class="front-fv-txt__jp-tit">
                            自然と革新が出会う場所。
                        </h2>
                    </div>
                    <div class="front-fv-img" data-aos="custom-fadeIn" data-aos-delay="500">
                        <div class="swiper front-fv-img__list-wrapper">
                            <ul class="swiper-wrapper front-fv-img__list">
                                <li class="swiper-slide front-fv-img__item">
                                    <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-fv-img__img01.jpg")); ?>"
                                        class="front-fv-img__img">
                                </li>
                                <li class="swiper-slide front-fv-img__item">
                                    <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-fv-img__img02.jpg")); ?>"
                                        class="front-fv-img__img">
                                </li>
                                <li class="swiper-slide front-fv-img__item">
                                    <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-fv-img__img03.jpg")); ?>"
                                        class="front-fv-img__img">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="front-about" id="about">
            <div class="container sec-spacing front-about__inner">
                <div class="front-about-main">
                    <div class="front-about-txt" data-aos="custom-fadeInLeft">
                        <h2 class="sec-tit-box__en-tit front-about-txt__tit">
                            ABOUT US
                        </h2>
                        <div class="front-about-txt__txt-area">
                            <p class="front-about-txt__txt">
                                NATURAL CREATEは、自然の美しさや調和を大切にしながら、持続可能なものづくりとデザインを追求するクリエイティブカンパニーです。
                                私たちは、環境に配慮した素材選びから、シンプルでありながら機能的なデザイン、そして心に響くクリエイティブな提案まで、一貫した想いを持って取り組んでいます。
                            </p>
                            <p class="front-about-txt__txt">
                                「本当に良いものは、自然の流れの中にある。」
                            </p>
                            <p class="front-about-txt__txt">
                                私たちは、この理念のもと、人々の暮らしを豊かにするプロダクトや空間デザイン、ブランディングを手掛けています。
                            </p>
                        </div>
                        <div class="front-about-txt__btn-area">
                            <a href="" class="btn btn_internal front-about-txt__btn">
                                会社概要
                            </a>
                        </div>
                    </div>
                    <div class="front-about-img" data-aos="custom-fadeInRight">
                        <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-about-img__img.jpg")); ?>"
                            alt="ABOUT US画像" class="front-about-img__img">
                    </div>
                </div>
            </div>
        </section>
        <section class="front-services sec-bg_primary" id="services">
            <div class="sec-spacing container front-services__inner">
                <div class="sec-tit-box sec-tit-box_contrast sec-tit-box_large" data-aos="custom-fadeIn">
                    <div class="sec-tit-box__en-tit front-services-tit-box__en-tit">
                        OUR SERVICES
                    </div>
                    <h2 class="sec-tit-box__jp-tit front-services-tit-box__jp-tit">
                        私たちの事業
                    </h2>
                </div>
                <div class="front-services-main">
                    <ul class="front-services-main__list">
                        <li class="front-services-box" data-aos="custom-fadeIn">
                            <div class="front-services-txt">
                                <div class="front-services-txt__tit-area">
                                    <div class="front-services-txt__en-tit">
                                        INTERIOR DESIGN
                                    </div>
                                    <h3 class="front-services-txt__jp-tit">
                                        インテリア・空間デザイン
                                    </h3>
                                </div>
                                <p class="front-services-txt__txt">
                                    環境との調和を大切にした店舗・オフィス・住宅のデザインおよび施工を手がけています。自然素材の活用や省エネルギー設計、サステナブルな空間づくりを意識し、美しさと機能性を兼ね備えた持続可能な建築を実現します。
                                </p>
                            </div>
                            <div class="front-services-img">
                                <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-services-img__img01.jpg")); ?>"
                                    class="front-services-img__img">
                            </div>
                        </li>
                        <li class="front-services-box" data-aos="custom-fadeIn">
                            <div class="front-services-txt">
                                <div class="front-services-txt__tit-area">
                                    <div class="front-services-txt__en-tit">
                                        GRAPHIC DESIGN
                                    </div>
                                    <h3 class="front-services-txt__jp-tit">
                                        グラフィックデザイン
                                    </h3>
                                </div>
                                <p class="front-services-txt__txt">
                                    ナチュラルなテイストを活かしたブランドロゴ・パッケージ・広告デザインを手がけています。自然素材や柔らかな色彩、手書き風のフォントなど、温かみのあるデザイン要素を取り入れ、ブランドの世界観を表現。シンプルで洗練されたビジュアルとともに、持続可能な素材や環境に配慮したパッケージデザインにも対応し、ブランドの価値を最大限に引き出します。
                                </p>
                            </div>
                            <div class="front-services-img">
                                <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-services-img__img02.jpg")); ?>"
                                    class="front-services-img__img">
                            </div>
                        </li>
                        <li class="front-services-box" data-aos="custom-fadeIn">
                            <div class="front-services-txt">
                                <div class="front-services-txt__tit-area">
                                    <div class="front-services-txt__en-tit">
                                        SUSTAINABLE BRANDING
                                    </div>
                                    <h3 class="front-services-txt__jp-tit">
                                        サスティナブルブランディング
                                    </h3>
                                </div>
                                <p class="front-services-txt__txt">
                                    環境に配慮した企業活動やブランドプロジェクトの立ち上げ・運営を支援するコンサルティングサービスを提供しています。気候変動対策、サステナブルな製品開発、リサイクルシステムの構築など、環境に優しいビジネスモデルの推進に向け、企画立案から運営、実行支援までをトータルでサポート。
                                </p>
                            </div>
                            <div class="front-services-img">
                                <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-services-img__img03.jpg")); ?>"
                                    class="front-services-img__img">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="common-parallax">
            <div class="common-parallax__inner">
                <div class="common-parallax-main">
                    <div class="common-parallax-main__img-wrapper">
                        <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-img-main__img.jpg")); ?>"
                            alt="" class="common-parallax-main__img">
                    </div>
                </div>
            </div>
        </section>
        <?php
        $news_query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 5,
            'post_status' => 'publish',
        ]);
        if ($news_query->have_posts()):
            ?>
            <section class="sec-bg_secondary front-news" id="news">
                <div class="container960 sec-spacing front-news__inner">
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

        <section class="front-company" id="company">
            <div class="front-company__inner">
                <div class="common-parallax">
                    <div class="common-parallax__inner">
                        <div class="common-parallax-main">
                            <div class="common-parallax-main__img-wrapper">
                                <img src="<?php echo esc_url(get_hash_image_uri("assets/img/front-img-main__img.jpg")); ?>"
                                    alt="" class="common-parallax-main__img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container960">
                    <div class="front-company-main" data-aos="custom-fadeIn">
                        <div class="sec-tit-box">
                            <div class="sec-tit-box__en-tit">COMPANY</div>
                            <h2 class="sec-tit-box__jp-tit">会社概要</h2>
                        </div>
                        <div class="front-company-detail">
                            <div class="front-company-table">
                                <table>
                                    <tbody>
                                        <?php if ($company_name = CustomSettingsPlugin::get_setting('company_name')): ?>
                                            <tr>
                                                <th>社名</th>
                                                <td><?php echo esc_html($company_name); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($company_tel = CustomSettingsPlugin::get_setting('company_tel')): ?>
                                            <tr>
                                                <th>電話番号</th>
                                                <td><?php echo esc_html($company_tel); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($company_zip = CustomSettingsPlugin::get_setting('company_zip')): ?>
                                            <?php if ($company_address = CustomSettingsPlugin::get_setting('company_address')): ?>
                                                <tr>
                                                    <th>本社</th>
                                                    <td>
                                                        〒<?php echo esc_html($company_zip); ?><br>
                                                        <?php echo esc_html($company_address); ?>
                                                        <?php if ($company_building = CustomSettingsPlugin::get_setting('company_building')): ?>
                                                            <?php echo esc_html($company_building); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($company_opening = CustomSettingsPlugin::get_setting('company_opening')): ?>
                                            <tr>
                                                <th>設立</th>
                                                <td><?php echo esc_html($company_opening); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($company_closed = CustomSettingsPlugin::get_setting('company_closed')): ?>
                                            <tr>
                                                <th>定休日</th>
                                                <td><?php echo esc_html($company_closed); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php
                                        $company_repeater = CustomSettingsPlugin::get_setting('company_repeater');
                                        if (is_array($company_repeater) && !empty($company_repeater)):
                                            foreach ($company_repeater as $item):
                                                if (!empty($item['title']) && !empty($item['text'])):
                                                    ?>
                                                    <tr>
                                                        <th><?php echo esc_html($item['title']); ?></th>
                                                        <td><?php echo wp_kses_post($item['text']); ?></td>
                                                    </tr>
                                                    <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="front-company-map">
                                <?php
                                $company_map = CustomSettingsPlugin::get_setting('company_map');
                                if (!empty($company_map)):
                                    echo $company_map; // 既にサニタイズ済み
                                else:
                                    ?>
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25929.466128904834!2d139.51436968658138!3d35.672489186932054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018eff86f573381%3A0x3e1c206d0033dd2b!2z6Kq_5biD6aOb6KGM5aC0!5e0!3m2!1sja!2sjp!4v1750141292848!5m2!1sja!2sjp"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div>
<?php
get_footer();
?>