<?php
/**
 * Blog list template
 *
 * @package Lambda
 * @subpackage Admin
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.2.0
 * @author Oxygenna.com
 */

$template_margin = oxy_get_option('template_margin'); ?>
<section class="section">
    <div class="container">
        <div class="row element-top-<?php echo esc_attr($template_margin); ?> element-bottom-<?php echo esc_attr($template_margin); ?>">
            <div class="col-md-12">
                <?php get_template_part( 'partials/blog/loops/standard' ); ?>
            </div>
        </div>
    </div>
</section>