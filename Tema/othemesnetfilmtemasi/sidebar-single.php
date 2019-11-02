<div id="sidebar"><?php if(get_option('othemes_filmbilgi_var') == 'On'): ?>
<div class="sidebarborderb"><div class="sidebar-rightb"><div class="filmaltiimg">

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="108" height="153"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'single-resim' ); ?>
 <?php } ?>





	</div><div class="clear"></div></div><div id="filmozellikler">
<?php if(get_option('othemes_tur') == 'On'): ?><dt>TÜR:</dt><dd class="12312"><?php the_category(' &bull; ') ?></dd><?php endif; ?>
<?php if(get_option('othemes_yapim') == 'On'): ?><dt>YAPIM:</dt><dd><?php $eskiyapim = get_option('othemes_yapimmetaeski');
$product_terms = wp_get_object_terms($post->ID, 'yapim');
$eskiyapim = get_option('othemes_yapimmetaeski');
if(!empty($product_terms)){
if(!is_wp_error( $product_terms )){
foreach($product_terms as $term){
 echo '<a href="'.get_term_link($term->slug, 'yapim').'" style="margin-right:3px;" title="'.$term->name.' yapımı tüm filmler için tıkla">'.$term->name.'</a>'; echo " /";
}
}
}
else { 

if(get_post_meta($post->ID, $eskiyapim, true)):
	
		echo get_post_meta($post->ID, $eskiyapim, true); echo " /";
	
	endif;



}

?>  <?php
$eskiyapimyili = get_option('othemes_yapimyilimetaeski');
$product_terms = wp_get_object_terms($post->ID, 'yapimyili');
if(!empty($product_terms)){
if(!is_wp_error( $product_terms )){
foreach($product_terms as $term){
echo '<a href="'.get_term_link($term->slug, 'yapimyili').'" style="margin-right:3px;" title="'.$term->name.' yılında yapılmış tüm filmler için tıkla">'.$term->name.'</a>'; 
}
}
}
else { 

if(get_post_meta($post->ID, $eskiyapimyili, true)):
	
		echo get_post_meta($post->ID, $eskiyapimyili, true); 
	
	endif;



}

?></dd><?php endif; ?>
<?php if(get_option('othemes_imdb') == 'On'): ?><dt>IMDB PUANI:</dt><dd><?php $eskiimdb = get_option('othemes_imdbpuanimetaeski');
$eskiimdb = get_option('othemes_imdbpuanimetaeski');
$product_terms = wp_get_object_terms($post->ID, 'imdbpuani');
if(!empty($product_terms)){
if(!is_wp_error( $product_terms )){
foreach($product_terms as $term){
 echo '<a href="'.get_term_link($term->slug, 'imdbpuani').'" style="margin-right:3px;" title="'.$term->name.' IMDB puanlı filmler için tıkla">'.$term->name.'</a>'; 
}
}
}
else { 

if(get_post_meta($post->ID, $eskiimdb, true)):
	
		echo get_post_meta($post->ID, $eskiimdb, true); 
	
	endif;



}
?></dd><?php endif; ?>
<?php if(get_option('othemes_yonetmen') == 'On'): ?><dt>YÖNETMEN:</dt><dd><?php	$eskiyonetmen = get_option('othemes_yonetmenmetaeski');
$eskiyonetmen = get_option('othemes_yonetmenmetaeski');
$product_terms = wp_get_object_terms($post->ID, 'yonetmen');
if(!empty($product_terms)){
if(!is_wp_error( $product_terms )){
foreach($product_terms as $term){
echo '<a href="'.get_term_link($term->slug, 'yonetmen').'" style="margin-right:3px;" title="'.$term->name.' yönettiği tüm filmler için tıkla.">'.$term->name.'</a>'; 
}
}
}
else { 
if(get_post_meta($post->ID, $eskiyonetmen, true)):
	
		echo get_post_meta($post->ID, $eskiyonetmen, true); 
	
	endif;
}
?></dd><?php endif; ?><?php if(get_option('othemes_oyuncular') == 'On'): ?><dt>OYUNCULAR:</dt><dd><?php	$eskioyuncular = get_option('othemes_oyuncularmetaeski');
$eskiyoyuncular = get_option('othemes_oyuncularmetaeski');
$product_terms = wp_get_object_terms($post->ID, 'oyuncular');
if(!empty($product_terms)){
if(!is_wp_error( $product_terms )){
foreach($product_terms as $term){
 echo '<a href="'.get_term_link($term->slug, 'oyuncular').'" style="margin-right:3px;" title="'.$term->name.' oynadığı tüm filmler için tıkla.">&bull; '.$term->name.' </a>'; 
}
}
}
else { 
if(get_post_meta($post->ID, $eskiyoyuncular, true)):
	
		echo get_post_meta($post->ID, $eskiyoyuncular, true); 
	
	endif;
}
?></dd><?php endif; ?><?php if(get_option('othemes_etiketler') == 'On'): ?><dt>ETİKETLER:</dt><dd><?php if ( the_tags('', ', ' , '') ) ?></dd>
<?php endif; ?></div></div><?php endif; ?><div class="clear"></div><div style="margin-bottom:15px;"></div>
<?php if(is_active_sidebar('sidebar')) { dynamic_sidebar('single'); ?><?php } ?></div>	