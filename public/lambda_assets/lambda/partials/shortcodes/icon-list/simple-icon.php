<?php
/**
 * Simple Icon shortcode partial
 *
 * @package Lambda
 * @subpackage Frontend
 * @since 1.01
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.2.0
 */
?>
<li>
    <?php if( !empty( $icon ) ) : ?>
        <i class="fa-li <?php echo esc_attr($icon); ?>"<?php echo $icon_color; ?>>
        </i>
    <?php endif; ?>
    <?php echo $title; ?>
</li>