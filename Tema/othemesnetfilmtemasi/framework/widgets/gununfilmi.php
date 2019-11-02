<?php
add_action('widgets_init', 'gunun_filmi_widgets');

function gunun_filmi_widgets()
{
	register_widget('Gunun_Filmi_Widget');
}

class Gunun_Filmi_Widget extends WP_Widget {
	
	function Gunun_Filmi_Widget()
	{
		$widget_ops = array('classname' => 'gunun_filmi', 'description' => 'Yan menüde günün filmni gösterir.');

		$control_ops = array('id_base' => 'gunun_filmi-widget');

		$this->WP_Widget('gunun_filmi-widget', 'Othemes Günün Filmi', $widget_ops, $control_ops);
	}
	
	function widget($args,  $instance) {
		extract($args);
		$adres = $instance['adres'];
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		
		
		if($title):	
				$temp_title = explode(' ',$title);
				$first_letter = $temp_title[0];
						unset($temp_title[0]);
				$title_new = implode(' ', $temp_title);
				$title = $first_letter.'  '.$title_new.' ';
				
		endif;
		echo $before_widget;
		 ?>
		 
		 
		
		 
		 
		<div class="sidebarborderyx" >
		
	    <div class="sidebar-rightyx" >
		  <div id="benzertitle4x" style="margin-bottom:5px;"><?php echo $title; ?></div>
		  
		  
		  <?php
$args = array(
'post_type' => 'post',
'orderby' => 'othemes_featured-checkbox',
'order' => 'ASC',
'showposts' => 1,
'meta_query' => array(
                            array(
                            'key' => 'featured-checkbox',
                            'value' => 'yes'
                    )
                )
);
 
$featured_query = new WP_Query($args);?>
		
		<?php while ($featured_query->have_posts()) : $featured_query->the_post();?> 
		
		
	
	
			<div class="filmcerceve3">
		
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="205" height="290"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'anasayfa-resim' ); ?>
 <?php } ?>
 
</a>
			
				<div class="filmgorunum3x"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
				</div>
				<?php endwhile;?>


		
		

	<?php wp_reset_query(); ?>	
	
</div>
</div>		  
		<?php 
		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	   
			
			
			
	        return $instance;
	}

	function form($instance)
	{
		$title= esc_attr($instance['title']);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
		
		
	<?php
	}
}
?>