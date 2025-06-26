<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('is-loading'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<div id="loading" class="loading">
			<div class="loading__spinner"></div>
		</div>

		<header id="header" class="header">
			<div class="header__inner">
				<div id="header-logo" class="header-logo">
					<a href="<?php echo home_url(); ?>" class="header-logo__link">
						<?php
						$header_logo_id = CustomSettingsPlugin::get_setting('header_logo_id');
						if (!empty($header_logo_id)):
							$header_logo_url = wp_get_attachment_image_url($header_logo_id, 'full');
							if ($header_logo_url):
						?>
							<img class="header-logo__logo" src="<?php echo esc_url($header_logo_url); ?>" alt="<?php bloginfo('name'); ?>">
						<?php
							endif;
						else:
						?>
							<img class="header-logo__logo"
								src="<?php echo esc_url(get_hash_image_uri("assets/img/logo.png")); ?>" alt="<?php bloginfo('name'); ?>">
						<?php endif; ?>
					</a>
				</div><!-- .header-branding -->

				<nav id="header-nav" class="header-nav">
					<button id="header-nav-btn" class="header-nav__btn" type="button">
						<span class="header-nav__line header-nav__line_top" id="header-nav-btn__top-bar"></span>
						<span class="header-nav__line header-nav__line_middle" id="header-nav-btn__middle-bar"></span>
						<span class="header-nav__line header-nav__line_bottom" id="header-nav-btn__bottom-bar"></span>
					</button>
					<div id="header-nav-sp" class="header-nav-sp">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'header-nav-sp',
							'menu_class' => 'header-nav-sp-list',
							'container' => false,
							'fallback_cb' => false,
							'walker' => new Custom_Walker_Nav_Menu(),
							'add_a_class' => 'header-nav-sp-list__link',
							'add_li_class' => 'header-nav-sp-list__item',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
						));
						?>
					</div>
					<div class="hidden lg:flex header-nav-pc__wrapper">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'header-nav-pc',
							'menu_class' => 'header-nav-pc__list',
							'menu_id' => 'header-nav-pc',
							'container' => false,
							'fallback_cb' => false,
							'walker' => new Custom_Walker_Nav_Menu(),
							'add_a_class' => 'header-nav-pc__link',
							'add_li_class' => 'header-nav-pc__item',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						));
						?>
					</div>
				</nav>
			</div>
		</header><!-- #header .header -->
	