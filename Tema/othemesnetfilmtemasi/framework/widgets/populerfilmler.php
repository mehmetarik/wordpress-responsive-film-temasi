<?php



class Popular_Filmler_Widget extends WP_Widget {
	
	function Popular_Filmler_Widget(){
			$widget_ops = array( 'classname' => 'Popular_Filmler_Widget', 'description' => __('Yan menüde popüler filmleri izlenme sayılarına göre gösterir.', 'othemes'));
			$this->WP_Widget( 'popular_filmler_sidebar_widget', __('Othemes Popüler Filmler', 'othemes'), $widget_ops );
	}
	
	


	function widget($args,  $instance) {
		extract($args);
		$cat = $instance['category__not_in'];
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
		 
		 <div class="sidebarborderb">
	    <div class="sidebar-rightb">
		<div id="benzertitle6"><?php echo $title; ?></div>
						<?php
						
						
								$args = array( 
								'post_type' => 'post',
								'v_sortby' => 'views',
		                        'v_orderby' => 'desc',
								'posts_per_page'=>$rrf_post_count,
								'category__not_in' => $cat
								);
								
								$rrf_posts_query = new WP_Query($args);
								
								if($rrf_posts_query->have_posts()): 
										while($rrf_posts_query->have_posts()): 
										$rrf_posts_query->the_post();
									global $post;
											?>
												<div class="filmcerceve2">
												
												
												
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="108" height="153"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'benzerleri-resim' ); ?>
 <?php } ?>
 
</a>
 
	
		
			
				<div class="filmgorunum2"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
				</div>	                         						
											<?php		
										endwhile; 
								endif;
		
		echo			'</div>';
		echo '</div>';
		
		echo $after_widget;
		
	}
	
	


	function form($instance) 
	{	
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Popüler Filmler','post_per_page' => 4,'excerpt_length' => 50, 'category__not_in' => '' ) );
			
	        $title= esc_attr($instance['title']);			
			$rrf_post_count =  $instance['post_per_page'];
			$cat = $instance['category__not_in'];
			
			?>
					<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
		
		   <p>
				            <label for="<?php echo $this->get_field_id('category__not_in'); ?>"><?php _e('Gösterilmeyecek Kategori', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('category__not_in'); ?>" name="<?php echo $this->get_field_name('category__not_in'); ?>" type="text" value="<?php echo $cat; ?>" />
							<br/><small>Görünmesini istemediğiniz kategorinin ID'sini giriniz. Kategori ID'lerini virgülle ayırabilirsiniz.</small>
			        </p>
		
		
		            <p>
				            <label for="<?php echo $this->get_field_id('post_per_page'); ?>"><?php _e('Film Sayısı', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('post_per_page'); ?>" name="<?php echo $this->get_field_name('post_per_page'); ?>" type="text" value="<?php echo $rrf_post_count; ?>" />
			        </p>
		         
			<?php
	}
	
	


	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['post_per_page'] = intval($new_instance['post_per_page']);
			
			$instance['category__not_in'] = strip_tags( $new_instance['category__not_in'] );
			
	        return $instance;

    }
	
}

register_widget( 'Popular_Filmler_Widget' );