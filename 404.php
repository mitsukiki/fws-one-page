<?php
get_header();
?>
<div class="content-wrapper">
	<main id="primary" class="main-content main-content_full">
		<?php
		$args = array(
			"display" => "pc",
		);
		get_template_part('template-parts/breadcrumbs', null, $args);
		$args = array(
			'title' => '<span class="text-[32px] md:text-[56px] tracking-[var(--base-letter-spacing)] font-black">404 Not Found</span>'
		);
		get_template_part('template-parts/page-fv', null, $args);
		?>
		<section class="page-404">
			<div class="container800 sec-spacing_small text-center">
				<p>
					申し訳ありません。<br>
					お探しのページが見つかりませんでした。<br>
					お探しのページは、移動や削除されたか、一時的にご利用できない可能性があります。<br>
					TOPページから再度アクセスしてください。
				</p>
				<div class="back-btn">
					<a href="<?php echo esc_url(home_url()); ?>" class="back-btn__link">
						<span class="back-btn__link_txt">
							TOPへ戻る
						</span>
					</a>
				</div>
			</div>
		</section><!-- .page-404 -->
		<?php
		$args = array(
			"display" => "sp",
		);
		get_template_part('template-parts/breadcrumbs', null, $args);
		?>
	</main><!-- #main -->
</div><!-- .content-wrapper -->

<?php
get_footer();
