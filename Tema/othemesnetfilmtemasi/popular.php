<?php
/*
Template Name: othemes En Çok izlenenler
*/
get_header();
?>
	   <div id="content">
	<?php if (get_option('othemes_manset_slider') == 'On'): ?>
	<div class="slidermobil">
	<?php include(TEMPLATEPATH . '/slide.php'); ?>
	</div>
	<?php endif; ?>
	
<?php // Gerekli Ayarlar
		$sayfa = get_option('othemes_sayfa');
		$posts_per_page = get_option('othemes_sayfa_basi');
		$izlenenler = get_option('othemes_encokizlenenler_page_id');
		$yorumlananlar = get_option('othemes_encokyorumlananlar_page_id');
		$begenilenler = get_option('othemes_encokbegenilenler_page_id');
		
		if($sayfa == "On") { $sayfala = get_query_var('paged'); } else { $sayfala = 10; }
		?>
		
		
		
		
		
		<div class="solbolum">
<?php if(get_option('othemes_anasayfaustureklam') == 'On'): ?>

	<div class="othemesreklam3">

		<?php echo get_option('othemes_anasayfaustureklamkodu'); ?>

	</div>

<?php endif; ?>
		<div class="anacerceve">		
		<div id="baslikanaicerik">
		
		
		
		
		
	<ul>
  <li class="first" >
    Filmleri Sırala &#x21C5;
    </li>    
	
  <li><a href="<?php echo get_option('home'); ?>/" title="" onmouseover="document.getElementById('tip1' ).style.display = 'block';" onmouseout="document.getElementById('tip1' ).style.display = 'none';">&#x21BB;</a></li>

<li><a href="<?php echo get_permalink($izlenenler) ?>" title="" onmouseover="document.getElementById('tip2' ).style.display = 'block';" onmouseout="document.getElementById('tip2' ).style.display = 'none';">&#x2605;</a></li>

<li><a href="<?php echo get_permalink($yorumlananlar) ?>" title="" onmouseover="document.getElementById('tip3' ).style.display = 'block';" onmouseout="document.getElementById('tip3' ).style.display = 'none';">&#x270E;</a></li>

<li><a href="<?php echo get_permalink($begenilenler) ?>" title="" onmouseover="document.getElementById('tip4' ).style.display = 'block';" onmouseout="document.getElementById('tip4' ).style.display = 'none';">&#x263A;</a></li>
  </ul>  
    
   


		
		
		<h1 class="ana_title23">En Çok İzlenen Filmler</h1>	
		</div><div class="clear"></div>
			<div class="anaicerik">
		<div id="tip1" style="display:none;font-size:14px;padding:9px;color:#fff;margin-top:-20px;background:#000;border-radius:5px;position:absolute;z-index:9999;">YENİ EKLENEN FİLMLERİ GÖSTER</div>
			<div id="tip2" style="display:none;font-size:14px;padding:9px;color:#fff;margin-top:-20px;background:#000;border-radius:5px;position:absolute;z-index:9999;">İZLENME SAYISINA GÖRE SIRALA</div>	
			<div id="tip3" style="display:none;font-size:14px;padding:9px;color:#fff;margin-top:-20px;background:#000;border-radius:5px;position:absolute;z-index:9999;">YORUM SAYISINA GÖRE SIRALA</div>
			<div id="tip4" style="display:none;font-size:14px;padding:9px;color:#fff;margin-top:-20px;background:#000;border-radius:5px;position:absolute;z-index:9999;">BEĞENME SAYISINA GÖRE SIRALA</div>
	<?php
	$sayfa_basi_film = get_option('othemes_sayfa_basi');
		if (get_query_var('paged')) {
	$paged = get_query_var('paged');
	} elseif (get_query_var('page')) {
	$paged = get_query_var('page');
	} else {
	$paged = 1;
	}
	
	query_posts( array(
	'post_type' => array('filmler', 'post'),
	'v_sortby' => 'views',
	'v_orderby' => 'desc',
	'paged' => $paged,
	'post_per_page' => $sayfa_basi_film,
		)
		); 
	if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	

	<div class="filmcerceve">



	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
<?php othemes_afis_sistemi('afisbilgi'); ?>

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="108" height="153"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'anasayfa-resim' ); ?>
 <?php } ?>
<span class="puan"><?php if(function_exists('the_views')) { echo "<small>"; the_views();  echo "</small>"; } ?></span>
</a>
	





<div class="filmgorunum"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>

</div>
	
	
	
	<?php
	endwhile; else:
	endif;
	if(function_exists('wp_pagenavi')) {

	wp_pagenavi();
	
	} else { 
	}
	echo '</div>';
	echo '</div>';
	
	
	wp_reset_query();

	echo '</div>';
	get_sidebar();
	echo '</div>';
	echo '</div>';
	echo '<div style="clear:both;"></div>';
	echo '<div class="footborder"></div>';
get_footer(); 
?>