<?php get_header();?>
<div id="content">
<div class="solbolum">
<?php // Gerekli Ayarlar
	global $post;
	$katego = get_category(get_query_var('cat'),true);
	$yazi = 10;
	$tip = 'desc';
	$sayfa = get_option('othemes_sayfa');
	$sayfa_basi_film = get_option('othemes_sayfa_basi');

	if($sayfa == "On") { $sayfala = get_query_var('paged'); } else { $sayfala = 10; }
	
?>
<?php if (is_category()) { ?>



<h2 style="margin-top:7px;" class="singleh1baslik"><?php wp_title("",true); ?></h2>	<div class="clear"></div>
	<div class="anacerceve">
		<div class="anaicerik">
		
		<?php
$termDiscription = term_description( '', get_query_var( 'taxonomy' ) );
if($termDiscription != '') : ?>
<div class="aciklama"><?php echo $termDiscription; ?></div>
<?php endif; ?>
		
		
			<div class="clear"></div>
		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include (TEMPLATEPATH . '/film.php'); ?>	
			<?php endwhile; else: ?>
			<?php endif; ?>
		</div>
		
	</div>
	

	<?php if(function_exists('wp_pagenavi')) { ?>
	<div class="anacerceve">
		<div class="anaicerik">
			<?php wp_pagenavi() ?>
		</div>
	</div>
	<?php } ?>
	<?php wp_reset_query(); ?>
	
<?php } else { ?>
<h2 style="margin-top:7px;" class="singleh1baslik"><?php wp_title("",true); ?></h2>	<div class="clear"></div>
	<div class="anacerceve">
		<div class="anaicerik">
			<?php
$termDiscription = term_description( '', get_query_var( 'taxonomy' ) );
if($termDiscription != '') : ?>
<div class="aciklama"><?php echo $termDiscription; ?></div>
<?php endif; ?>
			<div class="clear"></div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include (TEMPLATEPATH . '/film.php'); ?>	
			<?php endwhile; else: ?>
			<?php endif; ?>
		</div>
	</div>

	<?php if(function_exists('wp_pagenavi')) { ?>
	<div class="anacerceve">
		<div class="anaicerik">
			<?php wp_pagenavi() ?>
		</div>
	</div>
	<?php } ?>
	
<?php } ?>


</div>
<?php get_sidebar('diger'); ?>
</div>
</div>
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer();?>