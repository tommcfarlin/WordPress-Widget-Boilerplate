<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */
?>

<?php if (empty($instance['title']) && empty($instance['content'])) :
    return;
endif; ?>

<div id="<?php echo $args['id']; ?>">
    <?php if (isset($instance['display-title']) && 'on' === $instance['display-title']) : ?>
        <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
    <?php endif; ?>
    <p><?php echo $instance['content']; ?></p>
</div><!-- #<?php echo $args['id']; ?>-->
