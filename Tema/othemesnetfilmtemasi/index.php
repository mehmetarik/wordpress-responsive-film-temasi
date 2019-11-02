<?php get_header(); ?>
<div id="content"><!-- CONTENT S -->
<?php if (get_option('othemes_manset_slider') == 'On'): ?>
<div class="slidermobil"><?php include(TEMPLATEPATH . '/slide.php'); ?></div>
<?php endif; ?>

<?php // Gerekli Ayarlar
$sayfa = get_option('othemes_sayfa');
$posts_per_page = get_option('othemes_sayfa_basi');
$izlenenler = get_option('othemes_encokizlenenler_page_id');
$yorumlananlar = get_option('othemes_encokyorumlananlar_page_id');
$begenilenler = get_option('othemes_encokbegenilenler_page_id');
if($sayfa == "On") { $sayfala = get_query_var('paged'); } else { $sayfala = 10; }
?>
<div class="solbolum"><!-- SOLBOLUM S -->
<?php if(get_option('othemes_anasayfaustureklam') == 'On'): ?>
<div class="othemesreklam3"><?php echo get_option('othemes_anasayfaustureklamkodu'); ?></div>
<?php endif; ?>
<div class="anacerceve"><!-- ANACERCEVE S -->		
<div id="baslikanaicerik"><!-- BASLİKANAİCERİK S -->
<ul>
<li class="first" >Filmleri Sırala &#x21C5;</li>  
  
<li><a href="<?php echo get_option('home'); ?>/" title="" onmouseover="document.getElementById('tip1' ).style.display = 'block';" onmouseout="document.getElementById('tip1' ).style.display = 'none';">&#x21BB;</a></li>

<li><a href="<?php echo get_permalink($izlenenler) ?>" title="" onmouseover="document.getElementById('tip2' ).style.display = 'block';" onmouseout="document.getElementById('tip2' ).style.display = 'none';">&#x2605;</a></li>

<li><a href="<?php echo get_permalink($yorumlananlar) ?>" title="" onmouseover="document.getElementById('tip3' ).style.display = 'block';" onmouseout="document.getElementById('tip3' ).style.display = 'none';">&#x270E;</a></li>

<li><a href="<?php echo get_permalink($begenilenler) ?>" title="" onmouseover="document.getElementById('tip4' ).style.display = 'block';" onmouseout="document.getElementById('tip4' ).style.display = 'none';">&#x263A;</a></li>

</ul>  
<h1 class="ana_title23">Yeni Eklenen Filmler</h1>	
</div><!-- BASLİKANAİCERİK F  -->
<div class="clear"></div>
<div class="anaicerik"><!--ANAİCERİK S -->
<div id="tip1" style="display:none;font-size:14px;padding:9px;margin-top:-20px;color:#fff;background:#000;border-radius:5px;position:absolute;z-index:9999;">YENİ EKLENEN FİLMLERİ GÖSTER</div>
<div id="tip2" style="display:none;font-size:14px;padding:9px;margin-top:-20px;color:#fff;background:#000;border-radius:5px;position:absolute;z-index:9999;">İZLENME SAYISINA GÖRE SIRALA</div>	
<div id="tip3" style="display:none;font-size:14px;padding:9px;margin-top:-20px;color:#fff;background:#000;border-radius:5px;position:absolute;z-index:9999;">YORUM SAYISINA GÖRE SIRALA</div>
<div id="tip4" style="display:none;font-size:14px;padding:9px;margin-top:-20px;color:#fff;background:#000;border-radius:5px;position:absolute;z-index:9999;">BEĞENME SAYISINA GÖRE SIRALA</div>

<?php 

$sayfa = get_option('othemes_sayfa');
$posts_per_page = get_option('othemes_sayfa_basi');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'post_type'=> 'post',
   'category__not_in' => get_option('othemes_ex_kategori'),
   'posts_per_page' => $posts_per_page,
   'paged'=>$paged
);
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query($args);
if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();   
include (TEMPLATEPATH . '/film.php');
endwhile; endif;
if (function_exists('wp_pagenavi')){wp_pagenavi();}
$wp_query = null;
$wp_query = $temp;
wp_reset_query(); ?>







</div><!--ANAİCERİK F -->
</div><!--ANACERCEVE F -->
</div><!--SOLBOLUM F -->
<?php get_sidebar(); ?>
</div><!--CONTENT F -->
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer(); ?>