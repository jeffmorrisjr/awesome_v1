<figure>
	<img src="<?php echo esc_url($item->guid); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
<?php if ($captions == 'show') : ?>
	<figcaption>
		<h3><?php echo $item->post_title; ?></h3>
		<p><?php echo $item->post_excerpt; ?></p>
	</figcaption>
<?php endif; ?>
</figure>