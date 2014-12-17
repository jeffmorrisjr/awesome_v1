<a href="<?php echo esc_url($link); ?>" class="btn <?php echo esc_attr(implode(' ', $classes)); ?>" target= "<?php echo esc_attr($link_open); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay);?>s"<?php echo $override_bg; ?>>
	<?php if ($icon_position == 'left' && $icon != '') : ?>
        <i class="<?php echo esc_attr($icon); ?>" <?php echo $animation; ?>></i>
    <?php endif ?>
    <?php echo $label . ' '; ?>
    <?php if ( $icon_position == 'right' && $icon != '' ): ?>
	    <i class="<?php echo esc_attr($icon); ?>" <?php echo $animation; ?>></i>
	<?php endif ?>
</a>