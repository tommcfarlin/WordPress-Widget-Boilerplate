<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */
?>
<div id="<?php echo $args['id']; ?>">
    <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
    <p><?php echo $instance['content']; ?></p>
    <pre><?php echo $instance['display-title']; ?></pre>
</div><!-- #<?php echo $args['id']; ?>-->
