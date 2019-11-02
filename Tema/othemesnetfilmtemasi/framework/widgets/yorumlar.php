<?php



class GK_Comments_Widget extends WP_Widget {
	
	function GK_Comments_Widget() {
		$this->WP_Widget(
			'widget_gk_comments', 
			__( 'Othemes Son Yorumlar', 'othemes' ), 
			array( 
				'classname' => 'widget_gk_comments', 
				'description' => __( 'Yapılan son yorumları listeler', 'othemes') 
			)
		);
		
		$this->alt_option_name = 'widget_gk_comments';
		// Comments actions
		add_action( 'comment_post', array(&$this, 'refresh_cache' ) );
		add_action( 'comment_unapproved_to_approved', array(&$this, 'refresh_cache' ) );
		add_action( 'comment_approved_to_unapproved', array(&$this, 'refresh_cache' ) );
		add_action( 'trashed_comment', array(&$this, 'refresh_cache' ));
		// Post actions
		add_action('delete_post', array(&$this, 'refresh_cache'));
		add_action('trashed_post', array(&$this, 'refresh_cache'));
	}

	/**
	 *
	 * Outputs the HTML code of this widget.
	 *
	 * @param array An array of standard parameters for widgets in this theme
	 * @param array An array of settings for this widget instance
	 * @return void
	 *
	 **/
	function widget($args, $instance) {
		
		
		// the part with the title and widget wrappers cannot be cached! 
		// in order to avoid problems with the calculating columns
		//
		extract($args, EXTR_SKIP);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __( 'Son Yorumlar', othemes ) : $instance['title'], $instance, $this->id_base);
		
		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;
		
		

		ob_start();
		//
		
		$word_count = empty($instance['word_count']) ? 7 : $instance['word_count'];
		$number = empty($instance['number']) ? 5 : $instance['number'];

		$comments_args = array(
			'status' => 'approve',
			'order' => 'DESC',
			'number' => $number
		);
		$comments = get_comments($comments_args);
		//
		if (count($comments)) {			
			if(count($comments) > 0) {		
echo ' <div class="sidebarbordery">';
	echo '    <div class="sidebar-righty">';			
				
				
				for($i = 0; $i < count($comments); $i++) {
			
					echo '<li>';
					echo '<strong>' . $comments[$i]->comment_author . '</strong>';
						echo '<a  href="'.get_comment_link($comments[$i]->comment_ID).'">' . $this->comment_text($comments[$i]->comment_content, $word_count) . '</a>';
						
						
						
										
					echo '</li>';
				
				}
				
				
				echo '</div>';
				echo '</div>';
			}
		}
		// save the cache results
		
		
		// 
		echo $after_widget;
	}

	/**
	 *
	 * Used in the back-end to update the module options
	 *
	 * @param array new instance of the widget settings
	 * @param array old instance of the widget settings
	 * @return updated instance of the widget settings
	 *
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$instance['word_count'] = strip_tags( $new_instance['word_count'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		

		$alloptions = wp_cache_get('alloptions', 'options');
		if(isset($alloptions['widget_gk_comments'])) {
			delete_option( 'widget_gk_comments' );
		}

		return $instance;
	}

	/**
	 *
	 * Refreshes the widget cache data
	 *
	 * @return void
	 *
	 **/

	
	
	/**
	 *
	 * Limits the comment text to specified words amount
	 *
	 * @param string input text
	 * @param int amount of words
	 * @return string the cutted text
	 *
	 **/
	
	function comment_text($input, $amount = 20) {
		$output = '';
		$input = strip_tags($input);
		$input = explode(' ', $input);
		
		for($i = 0; $i < $amount; $i++) {
			if(isset($input[$i])) {
				$output .= $input[$i] . ' ';
			}
		}
	
		if(count($input) > $amount) {
			$output .= '&hellip;';
		}
	
		return $output;
	}

	
	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		
		$word_count = isset($instance['word_count']) ? esc_attr($instance['word_count']) : 7;
		$number = isset($instance['number']) ? esc_attr($instance['number']) : 5;
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Başlık:', othemes ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'word_count' ) ); ?>"><?php _e( 'Kelime sayısı:', othemes ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'word_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'word_count' ) ); ?>" type="text" value="<?php echo esc_attr( $word_count ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Yorum sayısı:', othemes ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
		</p>
	<?php
	}
}
register_widget( 'GK_Comments_Widget' );
