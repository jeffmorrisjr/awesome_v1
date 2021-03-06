<?php
/**
 * Shows a posts featured image
 *
 * @package Lambda
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.2.0
 */

global $post;

$image = get_post_thumbnail_id( $post->ID );
$src   = wp_get_attachment_image_src( $image, 'full' )[0];
$image_link = is_single() ? $src : get_permalink( $post->ID );
$open_magnific = is_single() ? 'magnific' : '';
$icon = is_single() ? 'plus' : 'link'; ?>
<div class="figure fade-in text-center figcaption-middle">
    <a href="<?php echo esc_url($image_link); ?>" class="figure-image <?php echo esc_attr($open_magnific); ?>">
        <img src="<?php echo esc_url($src); ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
        <div class="figure-overlay">
            <div class="figure-overlay-container">
                <div class="figure-caption">
                    <span class="figure-overlay-icons">
                        <i class="icon-<?php echo esc_attr($icon); ?>"></i>
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>