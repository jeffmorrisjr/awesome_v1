<li class="<?php echo esc_attr(implode( ' ', $classes )); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <?php if( !empty( $icon ) ) : ?>
        <div class="features-list-icon box-animate" data-animation="<?php echo esc_attr($animation); ?>"<?php echo esc_attr($background_color); ?>>
            <i class="<?php echo $icon; ?>"<?php echo $icon_color; ?>></i>
        </div>
    <?php endif; ?>
    <h3>
        <?php echo $title; ?>
    </h3>
    <p>
        <?php echo $content; ?>
    </p>
</li>