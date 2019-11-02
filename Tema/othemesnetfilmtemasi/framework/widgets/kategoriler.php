<?php 
class tabCategoriesWidget extends WP_Widget {
    function tabCategoriesWidget() {
        $widget_ops = array( 'classname' => 'tab-categories-description', 'description' => 'Sekmeli kategori bileşeni.' );
        $this->WP_Widget( 'othemes-tab-categories', __('Othemes Kategori Bileşeni', 'othemes'), $widget_ops );
    }

    function widget( $args, $instance ) {
      global $taxonomy_release; 
      extract($args);
      $title = apply_filters('widget_title', $instance['title']);
      $cat_id_1 = $instance['cat_id_1'];
      $cat_id_2 = $instance['cat_id_2'];
      $cat_name_1 = get_cat_name( $cat_id_1 );
      $cat_name_2 = get_cat_name( $cat_id_2 );

      echo $before_widget;
      $wid = $this->id;
      if ($title) echo $before_title . $title . $after_title;
    ?>
		    <script type='text/javascript'>
                $(document).ready(function() {    

$('#tabs li a:not(:first)').addClass('inactive');
$('.container').hide();
$('.container:first').show();
    
$('#tabs li a').click(function(){
    var t = $(this).attr('id');
  if($(this).hasClass('inactive')){ //this is the start of our condition 
    $('#tabs li a').addClass('inactive');           
    $(this).removeClass('inactive');
    
    $('.container').hide();
    $('#'+ t + 'C').fadeIn('slow');
 }
});

});
                </script>
	
	<ul id="tabs" style="display:block;width:220px;position:relative;height:32px;padding:4px;margin-left:1px;margin-bottom:-2px;margin-top:0px;">

      <li style="width:108px;float:left;cursor:pointer;padding-left:1px;padding-right:5px;background:#555;"><a id="tab1" style="color:#FF3300;font-weight:bold;font-size:13px;"><?php echo $cat_name_1 ?></a></li>
      <li style="width:108px;float:left;cursor:pointer;padding-left:1px;padding-right:5px;background:#333;"><a id="tab2" style="color:#FF3300;font-weight:bold;font-size:13px;"><?php echo $cat_name_2 ?></a></li>
      
</ul>
          <div class="container" id="tab1C"><?php
          $categories=get_categories('child_of='.$cat_id_1.'&hide_empty=0');
          $last_category = $categories[0];

            foreach ($categories as $category) {
                   if($category->parent == $last_category->cat_ID) {
                        $last_category = $category;
                       echo '<li style="float: left;text-align: left;margin-left:0px;width: 107px;color:#e0e0c8;padding-top:4px;padding-bottom:4px;"><a href="'. get_category_link($category) . '">' . $category->name . '</a></li>';
                    } else {     
                       echo '<li style="float: left;text-align: left;margin-left:0px;width: 107px;color:#e0e0c8;padding-top:4px;padding-bottom:4px;"><a href="'. get_category_link($category) . '">' . $category->name . '</a></li>';
                    }
            }
            ?></div>
          <div class="container" id="tab2C"><?php
          $categories=get_categories('child_of='.$cat_id_2.'&hide_empty=0');
          $last_category = $categories[0];

            foreach ($categories as $category) {
                   if($category->parent == $last_category->cat_ID) {
                        $last_category = $category;
                       echo '<li style="float: left;text-align: left;margin-left:0px;width: 107px;color:#e0e0c8;padding-top:4px;padding-bottom:4px;"><a href="'. get_category_link($category) . '">' . $category->name . '</a></li>';
                    } else {     
                       echo '<li style="float: left;text-align: left;margin-left:0px;width: 107px;color:#e0e0c8;padding-top:4px;padding-bottom:4px;"><a href="'. get_category_link($category) . '">' . $category->name . '</a></li>';
                    }
            }
            ?>  </div>
	
	
    <?php
    echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title']    = strip_tags($new_instance['title']);
        $instance['cat_id_1'] = strip_tags($new_instance['cat_id_1']);
        $instance['cat_id_2'] = strip_tags($new_instance['cat_id_2']);
        return $instance;
    }

    function form( $instance ) {
        $defaults = array('title' => 'Kategoriler'); $instance = wp_parse_args((array) $instance, $defaults );
    ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Başlık:'); ?></label>
            <br/><input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat_id_1'); ?>">1. Kategori ID: </label>
            <input type="text" id="<?php echo $this->get_field_id('cat_id_1'); ?>" name="<?php echo $this->get_field_name('cat_id_1'); ?>" size="3" value="<?php echo $instance['cat_id_1']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat_id_2'); ?>">2. Kategori ID: </label>
            <input type="text" id="<?php echo $this->get_field_id('cat_id_2'); ?>" name="<?php echo $this->get_field_name('cat_id_2'); ?>" size="3" value="<?php echo $instance['cat_id_2']; ?>" />
        </p>

        <?php
    } 
}

add_action( 'widgets_init', create_function( '', "register_widget( 'tabCategoriesWidget' );" ) );
?>