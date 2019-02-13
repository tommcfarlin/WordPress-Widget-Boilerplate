<?php
/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */
?>

<div class="widget-content">
    <p>
        <input
            type="text"
            id="<?php echo esc_attr($this->get_field_id('title')); ?>"
            name="<?php echo esc_attr($this->get_field_name('title')); ?>"
            value="<?php echo $this->get('title', $instance); ?>"
            placeholder="Widget Title"
            class="widefat"
        />
    </p>

    <p>
        <textarea
            id="<?php echo esc_attr($this->get_field_id('content')); ?>"
            name="<?php echo esc_attr($this->get_field_name('content')); ?>"
            placeholder="Widget Content"
            style="width:100%;"><?php echo $this->get('content', $instance); ?></textarea>
    </p>

    <p>
        <input
            type="checkbox"
            value="on"
            name="<?php echo esc_attr($this->get_field_name('display-title')); ?>"
            id="<?php echo esc_attr($this->get_field_id('display-title')); ?>"
            <?php checked('on', $this->get('display-title', $instance), true); ?>
            class="checkbox"
        />
        <label for="<?php echo esc_attr($this->get_field_id('display-title')); ?>">Display Title?</label>
    </p>
</div><!-- .widget-content -->
