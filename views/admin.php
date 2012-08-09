<!-- This file is used to markup the administration form of the widget. -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'widget-name-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
</p>