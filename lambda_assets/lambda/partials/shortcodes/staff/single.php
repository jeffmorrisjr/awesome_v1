<div class="figure <?php echo esc_attr(implode( ' ', $classes )); ?>" data-os-animation="<?php echo esc_attr($scroll_animation); ?>" data-os-animation-delay="<?php echo esc_attr($scroll_animation_delay); ?>s">
    <div class="figure-image">
        <img src="<?php echo esc_url($src); ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
        <?php if( $show_social === 'show' ): ?>
            <div class="figure-overlay <?php echo esc_attr(implode( ' ', $overlay_classes )); ?>">
                <div class="figure-overlay-container">
                    <div class="figure-caption text-center">
                        <ul class="figure-overlay-icons social-icons social-simple">
                        <?php for( $i = 0; $i < 5; $i++):
                                $icon = (isset($custom_fields[THEME_SHORT . '_icon'.$i]))? $custom_fields[THEME_SHORT . '_icon'.$i][0]:'';
                                $url  = (isset($custom_fields[THEME_SHORT . '_link'.$i]))? $custom_fields[THEME_SHORT . '_link'.$i][0]:''; ?>
                            <?php if($url !== ''): ?>
                                <li>
                                    <a href="<?php echo esc_url($url); ?>" target="_self">
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="figure-caption text-<?php echo esc_attr($text_align); ?>">
        <h3 class="figure-caption-title">
        <?php if( $link_title === 'on' ): ?>
            <a href="<?php echo esc_url(oxy_get_slide_link( $post )); ?>">
        <?php endif; ?>
            <strong><?php echo get_the_title( $post->ID ); ?></strong>
        <?php if( $link_title === 'on' ): ?>
            </a>
        <?php endif; ?>
        <?php if( $show_position === 'show' ): ?>
            <span><?php echo $position ?></span>
        <?php endif; ?>
        </h3>
        <?php if( $show_description === 'show' ): ?>
            <p class="figure-caption-description"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</div>