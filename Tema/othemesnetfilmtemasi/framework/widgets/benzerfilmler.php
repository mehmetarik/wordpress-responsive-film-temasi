<?php
add_action('widgets_init', 'benzer_filmi_widgets');

function benzer_filmi_widgets()
{
	register_widget('Benzer_Filmi_Widget');
}

class Benzer_Filmi_Widget extends WP_Widget {
	
	function Benzer_Filmi_Widget()
	{
		$widget_ops = array('classname' => 'benzer_filmi', 'description' => 'Yan menüde benzer filmleri gösterir.');

		$control_ops = array('id_base' => 'benzer_filmi-widget');

		$this->WP_Widget('benzer_filmi-widget', 'Othemes Benzer Filmler', $widget_ops, $control_ops);
	}
	
	function widget($args,  $instance) {
		extract($args);
		$adres = $instance['adres'];
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		$rrf_post_countx =  $instance['showposts'];
		
		if($title):	
				$temp_title = explode(' ',$title);
				$first_letter = $temp_title[0];
						unset($temp_title[0]);
				$title_new = implode(' ', $temp_title);
				$title = $first_letter.'  '.$title_new.' ';
				
		endif;
		echo $before_widget;
		 ?>
		
		 <div class="sidebarborderb" >
		
	<div class="sidebar-rightb">
		
<div id="benzertitle"><?php echo $title; ?></div>
	<?php $categories = get_the_category($post->ID);

			

			if ($categories) { $category_ids = array();

			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args=array(

				  'category__in' => $category_ids,

				  'post__not_in' => array($post->ID),
				  'post_type' => 'post',

				  'showposts'=> $rrf_post_countx, // Göterilecek benzer yazı sayısı
'orderby'        => 'rand',
				  'caller_get_posts'=>1,
				  

			   );

			$my_query = new wp_query($args); if( $my_query->have_posts() ) { while ($my_query->have_posts()) { $my_query->the_post();?>

			<div class="filmcerceve2">
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="108" height="153"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'benzerleri-resim' ); ?>
 <?php } ?>
 
</a>
<div class="filmgorunum2"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></div>

</div>

			<?php } } wp_reset_query(); } ?>
	
	</div>
	</div>
		<?php 
		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	   $instance['showposts'] = intval($new_instance['showposts']);
			
			
			
	        return $instance;
	}

	function form($instance)
	{
		$title= esc_attr($instance['title']);
			$rrf_post_countx =  $instance['showposts'];
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
					
					 <p>
				            <label for="<?php echo $this->get_field_id('showposts'); ?>"><?php _e('Gösterilecek Benzer Film Sayısı', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('showposts'); ?>" name="<?php echo $this->get_field_name('showposts'); ?>" type="text" value="<?php echo $rrf_post_countx; ?>" />
			        </p>
		
		
	<?php
	}
}
?>