<?php
/**
 * The footer
 *
 * @package Bathe
 */

?>
</main>

	<?php get_sidebar(); ?>
</div>

<footer class="
<?php
	cx(
		'relative overflow-hidden from-transparent ~mt-80/120',
		'[background-image:linear-gradient(to_bottom,transparent_4.35rem,#3E1F56_4.35rem,#0000_100%)]',
		'lg:[background-image:linear-gradient(to_bottom,transparent_30.2%,#3E1F56_30.2%,#0000_100%)]',
	)
?>
">
<div class="container relative z-10grid gap-50 pt-20 ~pb-72/244">
	<div class="grid items-center gap-16 *:col-span-full *:row-span-full">
		<div class="leading-[1.04] tracking-[-0.03em] ~text-50/132 stroke-text *:inline-block"><span>The Power </span> <span>of Language</span></div>
		<div class="font-bold leading-nomal text-10/28 ~px-1/4 ~pt6/14 gradient-text">ワクワクする未来を話そう</div>
	</div>
	<div class="flex w-[13rem] flex-col ~gap-40/80 lg:w-auto lg:flex-row lg:items-start">
		<div class="grid max-w-[18.625rem] place-items-start gap-[1.6875rem]">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>>
			<img class="~h-38/54 w-auto" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo.svg' )); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" width="178" height="32"></a>
			<div class="break-keep leading-normal">
				東京都近未来区1−2−3 ギャラクシービル102F
			</div>
		</div>
		<nav>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container' => 'null',
					'menu_id' => 'menu-footer',
					'fallback_cb' => false,
				)
			);
			?>
		</nav>
	</div>
</div>

<div class="js-staggered pointer-events-none absolute inset-0">
	<?php
	foreach ( array(
		array(
			'class'  => '-bottom-8 ~/lg:~left-200/264 ~/lg:~w-260/360 lg:left-[63vw] lg:top-0 lg:w-[28.875rem]',
			'src'    => '/assets/images/footer-1.webp',
			'width'  => 462,
			'height' => 653,
		),
		array(
			'class'  => '~/lg:~top-120/200 ~/lg:~left-480/680 ~/lg:~w-220/320 lg:-left-[4.1875rem] lg:bottom-0 lg:top-388 lg:w-280',
			'src'    => '/assets/images/footer-2.webp',
			'width'  => 280,
			'height' => 395,
		),
	) as $image ) :
		?>
		<img
			class="<?php cx( 'absolute rounded-t-full ~rounded-b-[2.5rem]/[6rem]', $image['class'] ); ?>"
			src="<?php echo esc_url( get_theme_file_uri( $image['src'] ) ); ?>"
			alt=""
			width="<?php echo esc_attr( $image['width'] ); ?>"
			height="<?php echo esc_attr( $image['height'] ); ?>"
		>
	<?php endforeach; ?>
</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
