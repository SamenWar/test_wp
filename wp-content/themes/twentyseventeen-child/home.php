<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */
get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				do_action( 'woocommerce_before_shop_loop' );

//				woocommerce_product_loop_start();
//
//				if ( wc_get_loop_prop( 'total' ) ) {
//					while ( have_posts() ) {
//						the_post();
//
//						echo get_post_meta( $post->ID, '_select', true );
//						echo get_post_meta( $post->ID, 'data', true );
//						?><!-- <img src="--><?php //echo get_post_meta( $post->ID, 'produkts_image', true ); ?><!--" >-->
<!---->
<!--                        --><?php
//
//                        /**
//                         * Hook: woocommerce_shop_loop.
//                         */
//						do_action( 'woocommerce_shop_loop' );
//
//						wc_get_template_part( 'content', 'product' );
//					}
//				}
//
//				woocommerce_product_loop_end();
//
//                // form
				get_template_part( 'templates/temp-form');
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php
get_footer();

add_action( 'woocommerce_after_shop_loop_item', 'my_field_on_loop_show', 2 );
function my_field_on_loop_show() {
	global $product;
	echo $product->get_meta( '' );
}