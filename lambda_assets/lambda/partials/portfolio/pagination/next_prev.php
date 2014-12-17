<?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-navigation">
        <ul class="pager">
            <li class="previous">
                <?php previous_posts_link(__('<i class="fa fa-angle-left"></i>Previous', 'lambda-td')); ?>
            </li>
            <li class="next">
                <?php next_posts_link(__('Next<i class="fa fa-angle-right"></i>', 'lambda-td')); ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>
