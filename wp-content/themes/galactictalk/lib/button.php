<?php
/**
 * Button
 *
 * @package GalacticTalk
 */

/**
 * Renders a button with customizable attributes.
 *
 * @param string $label The text content of the button.
 * @param array  $args An array of button attributes. Default is an empty array.
 *    - href (string): The URL the button should link to.
 *    - type (string): The type of button. If provided, the button will be rendered as a button element.
 *    - target (string): The target attribute for the button. If provided, the button will be rendered with the target attribute.
 *    - text_class (string): Additional CSS classes to apply to the button.
 *
 * @return void
 */
function _button( $label, $args = array() ) {
	$defaults = array(
		'href'       => '',
		'type'       => '',
		'name'       => '',
		'disabled'   => '',
		'target'     => '',
		'class'      => '',
		'text_class' => '',
		'icon_class' => '',
	);

	$args = wp_parse_args( $args, $defaults );

	if ( $args['href'] ) {
		$html_tag = 'a';
	} elseif ( $args['type'] ) {
		$html_tag = 'button';
	} else {
		$html_tag = 'span';
	}

	// Attributes.
	$atts = '';
	if ( $args['href'] ) {
		$atts .= ' href="' . esc_url( $args['href'] ) . '"';
	}

	if ( $args['type'] ) {
		$atts .= ' type="' . $args['type'] . '"';
	}

	if ( $args['name'] ) {
		$atts .= ' name="' . $args['name'] . '"';
	}

	if ( $args['disabled'] ) {
		$atts .= ' disabled="' . $args['disabled'] . '"';
	}

	if ( $args['target'] ) {
		$atts .= ' target="' . esc_attr( $args['target'] ) . '"';
	}
	?>
	<<?php echo wp_kses_post( $html_tag . $atts ); ?> class="<?php cx( $args['class'] ); ?>">
		<?php if ( $label ) : ?>
			<span class="<?php cx( $args['text_class'] ); ?>">
				<?php
				// phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
				echo wp_kses_post( $label );
				?>
			</span>
		<?php endif; ?>
		<span class="<?php cx( $args['icon_class'] ); ?>"></span>
	</<?php echo wp_kses_post( $html_tag ); ?>>
	<?php
}

/**
 * Renders a button with customizable attributes.
 *
 * @param string $label The text content of the button.
 * @param array  $args An array of button attributes. Default is an empty array.
 *                     - text_class (string): Additional CSS classes to apply to the button.
 * @return void
 */
function button( $label, $args = array() ) {
	$args['class'] = clsx(
		'group/button',
		'relative overflow-hidden flex min-w-320 items-center justify-between gap-10 rounded-full border-px border-brand-400 bg-transparent font-bold text-brand-400 ~text-16/18 ~px-20/32 py-16 ~leading-20/24',
		'transition-[color,background] duration-[0.3s,0.5s]',
		'before:inset-0 before:absolute before:bg-brand-400 before:-z-10 before:!opacity-0 before:transition-all before:duration-300 before:-translate-x-full before:rounded-full',
		'hover:bg-brand-400 hover:text-white',
		'hover:before:!opacity-100 hover:before:translate-x-0',
		'before:opacity-100',
		$args['class'] ?? '',
	);

	$args['text_class'] = clsx(
		$args['text_class'] ?? '',
	);

	$args['icon_class'] = clsx(
		'grid place-items-center before:size-16',
		( $args['icon'] ?? false ) ? 'before:icon-' . $args['icon'] : 'before:icon-chevron-right',
		$args['icon_class'] ?? '',
	);

	_button( $label, $args );
}

/**
 * Renders an icon button with customizable attributes.
 *
 * @param string $icon The icon to be used in the button.
 * @param array  $args An array of button attributes. Default is an empty array.
 *                     - class (string): Additional CSS classes to apply to the button.
 *                     - label (string): The text content for screen readers.
 * @return void
 */
function icon_button( $icon, $args = array() ) {
	$args['class'] = clsx(
		'group/icon_button w-fit rounded-6 text-brand-500 flex items-center transition-all duration-300 ease-out',
		'hover:enabled:text-brand-300',
		$args['class'] ?? '',
	);

	$args['icon_class'] = clsx(
		'grid before:size-32 transition ease-out',
		'lg:before:size-24',
		'before:icon-' . $icon,
		$args['icon_class'] ?? '',
	);

	$args['text_class'] = clsx(
		'sr-only'
	);

	_button( $args['label'] ?? '', $args );
}
