<!-- This file is used to markup the administration form of the widget. -->
<!-- Note that the use of the 'Title' field is purely for example purposes only. -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'widget-name-locale' ) ?></label>
	<input type="text" class="widefat" value="<?php esc_attr_e( $instance['title'] ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
</p>