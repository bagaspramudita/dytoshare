<?php
/*************************************************************************************
	Plugin Name: Social Network Icons Widget
	Description: It will display Social Nw Icons.
	Author: ThemePacific
	Author URI: http://themepacific.com					
***************************************************************************/
/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'silvermag_social_widget_box' );
/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 * 
 * @since 0.1
 */
function silvermag_social_widget_box() {
	register_widget( 'silvermag_social_widget' );
}
/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class silvermag_social_widget extends WP_Widget {

	function silvermag_social_widget() {
		$widget_ops = array( 'classname' => 'tpcrn-social-icons-widget', 'description' => 'Display Social Icons' );
		$control_ops = array($control_ops = array('id_base' => 'silvermag_social_icons-widget'));
		$this->WP_Widget( 'social','ThemePacific: Social Icons', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );		 		
		$fb = $instance['fb'];		 		
		$gp = $instance['gp'];		 		
		$rss = $instance['rss'];		 		
		$tw = $instance['tw'];		
		$in = $instance['in'];		
		$yt = $instance['yt'];		
		$fr = $instance['fr'];		
/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */ 		
  ?>
  
			<div class="widget">
	<div class="social-icons">
		<?php
		$icons_path =  get_stylesheet_directory_uri().'/images/social-icons';
		 $rss = get_bloginfo('rss2_url'); 
			?>
			
		<?php if($rss){ ?>	
		<a   title="RSS Feed" href="<?php echo esc_url($rss) ; ?>" ><img src="<?php echo $icons_path; ?>/rss.png" alt="RSS Feed"  /></a> 
		 <?php } 
		 if($gp){ ?>
		 <a  title="Google+" href="<?php echo esc_url($gp); ?>" ><img src="<?php echo $icons_path; ?>/gp.png" alt="Google+"  /></a> 
		 <?php } if($fb){ ?>
		 <a  title="Facebook" href="<?php echo esc_url($fb); ?>" ><img src="<?php echo $icons_path; ?>/fb.png" alt="Facebook"  /></a> 
		 <?php } if($tw){ ?>
		 <a  title="Twitter" href="<?php echo esc_url($tw); ?>" ><img src="<?php echo $icons_path; ?>/tw.png" alt="Twitter"  /></a> 
		 <?php } if($yt){ ?>
		<a  title="YouTube" href="<?php echo esc_url($yt); ?>" ><img src="<?php echo $icons_path; ?>/yt.png" alt="YouTube"  /></a> 
		<?php } if($in){ ?>
		<a  title="LinkdeIn" href="<?php echo esc_url($in); ?>" ><img src="<?php echo $icons_path; ?>/in.png" alt="LinkedIn"  /></a> 
		<?php } if($fr){ ?>
		<a  title="Flickr" href="<?php echo esc_url($fr); ?>" ><img src="<?php echo $icons_path; ?>/fr.png" alt="Flickr"  /></a> 
		<?php } ?>
	</div>
			</div>
		 		<?php	
	/* After widget (defined by themes). */
		echo $after_widget;		
	
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags(esc_url_raw( $new_instance['rss'] )) : '';
		$instance['fb'] = ( ! empty( $new_instance['fb'] ) ) ? strip_tags( esc_url_raw($new_instance['fb'] )) : '';
		$instance['gp'] = ( ! empty( $new_instance['gp'] ) ) ? strip_tags(esc_url_raw( $new_instance['gp'] )) : '';
		$instance['tw'] = ( ! empty( $new_instance['tw'] ) ) ? strip_tags(esc_url_raw( $new_instance['tw'] )) : '';
		$instance['in'] = ( ! empty( $new_instance['in'] ) ) ? strip_tags(esc_url_raw( $new_instance['in'] )) : '';
		$instance['yt'] = ( ! empty( $new_instance['yt'] ) ) ? strip_tags(esc_url_raw( $new_instance['yt'] )) : '';
		$instance['fr'] = ( ! empty( $new_instance['fr'] ) ) ? strip_tags(esc_url_raw( $new_instance['fr'] )) : '';
 		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Social' , 'silvermag') , 'rss URL' =>__('Feed URL' , 'silvermag') , 'fb' =>__('Facebook URL' , 'silvermag') , 'gp' =>__('Google+ URL' , 'silvermag') , 'tw' =>__('Twitter URL' , 'silvermag') , 'in' =>__('LinkedIn URL' , 'silvermag') , 'yt' =>__('YouTube URL' , 'silvermag') , 'fr' =>__('Flickr URL' , 'silvermag')   );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'silvermag'); ?> </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS:', 'silvermag'); ?> </label>
			<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fb' ); ?>"><?php _e('Facebook:', 'silvermag'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fb' ); ?>" name="<?php echo $this->get_field_name( 'fb' ); ?>" value="<?php echo $instance['fb']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gp' ); ?>"><?php _e('Google+:', 'silvermag'); ?></label>
			<input id="<?php echo $this->get_field_id( 'gp' ); ?>" name="<?php echo $this->get_field_name( 'gp' ); ?>" value="<?php echo $instance['gp']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tw' ); ?>"><?php _e('Twitter:', 'silvermag'); ?> </label>
			<input id="<?php echo $this->get_field_id( 'tw' ); ?>" name="<?php echo $this->get_field_name( 'tw' ); ?>" value="<?php echo $instance['tw']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'in' ); ?>"> <?php _e('LinkedIn:', 'silvermag'); ?>  </label>
			<input id="<?php echo $this->get_field_id( 'in' ); ?>" name="<?php echo $this->get_field_name( 'in' ); ?>" value="<?php echo $instance['in']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'yt' ); ?>"><?php _e('YouTube:', 'silvermag'); ?></label>
			<input id="<?php echo $this->get_field_id( 'yt' ); ?>" name="<?php echo $this->get_field_name( 'yt' ); ?>" value="<?php echo $instance['yt']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'fr' ); ?>"><?php _e('Flickr:', 'silvermag'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fr' ); ?>" name="<?php echo $this->get_field_name('fr'); ?>" value="<?php echo $instance['fr']; ?>" class="widefat" type="text" />
		</p>

 
 
		


	<?php
	}
}
?>
