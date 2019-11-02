<?php get_header(); ?>
<div id="content">
	<div class="solbolum">
	
	<?php
	$args=array(
   'post_type'=> filmler
   
);
	?>
	<?php if ( $wp_query->have_posts() ) :?>
		<h2 class="singleh1baslik"><?php the_search_query(); ?>   için arama sonuçları</h2>
		<div class="anacerceve">
			<div class="anaicerik">
			
				<?php while ( have_posts() ) : the_post() ?>
				<?php include (TEMPLATEPATH . '/film.php'); ?>
				<?php endwhile ?>
			</div>
		</div>
				
		<?php if(function_exists('wp_pagenavi')) { ?>
			<div class="anacerceve">
				<div class="anaicerik">
				<?php wp_pagenavi() ?>
				</div>
			</div>
		<?php } else { ?>
		<?php } ?>
				
		<?php else : ?>
<h2 class="singleh1baslik"><?php the_search_query(); ?>   için arama sonuçları</h2>
		<div class="anacerceve">
			<div class="anaicerik">
			<center>
				<h2 class="yazitipyok"><strong style="color:#FFCC00;">Üzgünüz <strong style="color:#FFf;"><?php the_search_query(); ?></strong> kelimesi ile ilgili hiçbir sonuca ulaşamadık.
				</br>
				UMARIZ AŞAĞIDAKİ FİLMLER İLGİNİZİ ÇEKER
				</strong></h2>
				</center>
				
				<?php 
				
$args=array(
   'post_type'=>array('filmler', 'post'),
   'category__not_in' => get_option('othemes_ex_kategori'),
   'posts_per_page' => 20,
   'showposts' => 20
   
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
	
		<?php endif; ?>
	</div>
<?php get_sidebar('diger'); ?>
</div>
</div>
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer(); ?>