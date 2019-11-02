<?php



class Feedburner_Widget extends WP_Widget {
	
	function Feedburner_Widget(){
			$widget_ops = array( 'classname' => 'Feedburner_Widget', 'description' => __('Yan menüde e-posta aboneliği formunu gösterir.', 'othemes'));
			$this->WP_Widget( 'feedburner_sidebar_widget', __('Othemes Feedburner', 'othemes'), $widget_ops );
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
		
		 <div class="sidebarbordery" >
		
	    <div class="sidebar-righty" >
		  <div id="benzertitle4" style="margin-bottom:15px;"><?php echo $title; ?></div>
						
						<div class="eposta" style="float:left;margin-left:4px;height:34px;margin-top:-1px;width:95%;display:block;position:relative;">
			<form style="float:left;" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $adres; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">

<input type="text" style="width:153px;line-height:22px;padding-left:5px;" placeholder="<?php _e('E-posta adresinizi yazın', 'turizmtatil'); ?>" name="email"/> 
<input type="hidden" value="<?php echo get_option('tatiltema_feedburner_url'); ?>" name="uri"/>
<input type="hidden" name="loc" value="en_US"/>
<input type="submit" style="width:47px;height:30px;line-height:16px;padding-bottom:2px;cursor:pointer;" value="Ekle" /> 
</form> 
			</div>
												
		

	
		                         						
											<?php		
										

		echo			'</div>';
		echo '</div>';
		
		echo $after_widget;
		
	}
	
	


	function form($instance) 
	{	
			
			
	        $title= esc_attr($instance['title']);			
			
			$adres = $instance['adres'];
			
			?>
					<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
		
		   <p>
				            <label for="<?php echo $this->get_field_id('adres'); ?>"><?php _e('Feedburner ID', 'othemes'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('adres'); ?>" name="<?php echo $this->get_field_name('adres'); ?>" type="text" value="<?php echo $adres; ?>" />
							<br/><small>Bu alana sadece Feedburner abonelik adresinizin sonundaki abonelik ID giriniz.</small>
			        </p>
		
		
		            
		         
			<?php
	}
	
	


	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	   
			
			$instance['adres'] = strip_tags( $new_instance['adres'] );
			
	        return $instance;

    }
	
}

register_widget( 'Feedburner_Widget' );