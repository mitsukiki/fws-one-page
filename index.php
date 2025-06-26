<?php get_header();
?>

<div class="content-wrapper">
	<main id="primary" class="main-content main-content_full">
		<?php
		get_template_part('template-parts/breadcrumbs');
		get_template_part('template-parts/page-fv', null, $args);
		if (have_posts()) :
		?>
			<section>
				<div class="container sec-spacing">
					<div class="grid gap-10 grid-cols-4">
						<?php
						while (have_posts()) :

							the_post();

							get_template_part('template-parts/entry-card');

						endwhile;
						?>
					</div>
				<?php

				the_posts_navigation();

			endif;
				?>
				</div>
			</section>
	</main><!-- #main -->
</div>

<?php
get_footer();
