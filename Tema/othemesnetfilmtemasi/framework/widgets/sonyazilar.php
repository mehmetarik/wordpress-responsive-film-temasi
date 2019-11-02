<?php



class Son_Yazilar_Widget extends WP_Widget {
	
	function Son_Yazilar_Widget(){
			$widget_ops = array( 'classname' => 'Son_Yazilar_Widget', 'description' => __('Yan menüde son eklenen yazıları listeler.', 'othemes'));
			$this->WP_Widget( 'son_yazilar_sidebar_widget', __('Othemes Son Yazılar', 'othemes'), $widget_ops );
	}
	
	


	function widget($args,  $instance) {
		extract($args);
		$cat = $instance['cat'];
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		$rrf_post_count =  $instance['post_per_page'];
		
		if($title):	
				$temp_title = explode(' ',$title);
				$first_letter = $temp_title[0];
						unset($temp_title[0]);
				$title_new = implode(' ', $temp_title);
				$title = $first_letter.'  '.$title_new.' ';
				
		endif;
		echo $before_widget;
		 ?>
		
		 <div class="sidebarbordery" >
		
	    <div class="sidebar-righty" >
		  <div id="benzertitle6" style="margin-bottom:15px;"><?php echo $title; ?></div>
						<?php
						
						
								$args = array( 
								'post_type' => 'post',
								'v_sortby' => 'date',
		                        'v_orderby' => 'desc',
								'posts_per_page'=>$rrf_post_count,
								'cat' => $cat
								);
								
								$rrf_posts_query = new WP_Query($args);
								
								if($rrf_posts_query->have_posts()): 
										while($rrf_posts_query->have_posts()): 
										$rrf_posts_query->the_post();
									global $post;
											?>
												
		

	<div style="width:205px;margin-bottom:4px;margin-left:6px;border-bottom:1px dotted #ddd;padding-bottom:3px;">
			<a style="font-size:13px;line-height:19px;" href="<?php the_permalink() ?>"><?php the_title(); ?></a></br></div>
		                         						
											<?php		
										endwhile; 
								endif;

		echo			'</div>';
		echo '</div>';
		
		echo $after_widget;
		
	}
	
	


	function form($instance) 
	{	
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Son Yazılar','post_per_page' => 4,'excerpt_length' => 50, 'cat' => '' ) );
			
	        $title= esc_attr($instance['title']);			
			$rrf_post_count =  $instance['post_per_page'];
			$cat = $instance['cat'];
			
			?>
					<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
		
		   <p>
				            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Gösterilecek Kategori', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo $cat; ?>" />
							<br/><small>Görünmesini istediğiniz kategorinin ID'sini giriniz. Kategori ID'lerini virgülle ayırabilirsiniz.</small>
			        </p>
		
		
		            <p>
				            <label for="<?php echo $this->get_field_id('post_per_page'); ?>"><?php _e('Yazı Sayısı', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('post_per_page'); ?>" name="<?php echo $this->get_field_name('post_per_page'); ?>" type="text" value="<?php echo $rrf_post_count; ?>" />
			        </p>
		         
			<?php
	}
	
	


	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['post_per_page'] = intval($new_instance['post_per_page']);
			
			$instance['cat'] = strip_tags( $new_instance['cat'] );
			
	        return $instance;

    }
	
}

register_widget( 'Son_Yazilar_Widget' );