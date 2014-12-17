<?php
global $post;
$post = $item;
setup_postdata( $post );
if( $tooltip == 'show'):
    $tooltip_attrs['data-original-title'] = $post->post_title;
    $tooltip_attrs['data-toggle'] = 'tooltip';
endif;
$link_target = get_post_meta( $post->ID, THEME_SHORT . '_target', true );
// get link
$link = oxy_get_slide_link( $post ); ?>
<?php if (!empty($link)): ?>
	<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
<?php endif; ?>
<figure>
    <?php echo get_the_post_thumbnail( $post->ID, 'full', $tooltip_attrs ); ?>

    <?php if ($captions == 'show') : ?>
        <figcaption>
            <h3><?php the_title(); ?></h3>
		    <p><?php the_content(); ?></p>
        </figcaption><?php
    endif; ?>

</figure>

<?php if (!empty($link)) : ?>
	</a>
<?php endif; ?>
<?php wp_reset_postdata(); ?>