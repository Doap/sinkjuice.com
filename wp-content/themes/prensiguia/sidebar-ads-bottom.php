<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Advertising Widget Template
 *
 *
 * @file           sidebar-ads-bottom.php
 * @package        Responsive
 * @author         Juan Carlos Alvarez
 * @filesource     wp-content/themes/noticias/sidebar-ads-bottom.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 */
?>
<?php
if( !is_active_sidebar( 'ads-bottom' )
) {
	return;
}
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="ads-bottom" class="advertising grid col-940">
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'ads-bottom' ) ) : ?>

			<?php dynamic_sidebar( 'ads-bottom' ); ?>

		<?php endif; //end of .advertisig ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of .advertising -->
<?php responsive_widgets_after(); // after widgets container hook ?>
