<?php get_header();?>

<div id="content">
	<div class="hatasayfasi">
		404</br>
		<p>Aradığınız sayfa bulunamadı. Doğru adresi girdiğinizden emin olun.</br>
		
		Veya aşağıdaki filmlerden birine tıklayarak izlemeye devam edebilirsiniz.</p>
				
			<div style="margin-left:56px;">	<?php 
				
$args=array(
   'post_type'=>array('post'),
   'category__not_in' => get_option('othemes_ex_kategori'),
   'posts_per_page' => 10,
   'showposts' => 6
    
);
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query($args);

/* PageNavi at Top */

if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();   
include (TEMPLATEPATH . '/film.php');
/* DO STUFF IN THE LOOP */

endwhile; endif;
/* PageNavi at Bottom */

$wp_query = null;
$wp_query = $temp;
wp_reset_query(); ?>
</div>
	
</div>
</div>
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer();?>