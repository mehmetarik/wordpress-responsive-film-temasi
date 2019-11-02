  <!-- jQuery 1.7+ -->
    <script src="<?php bloginfo('template_directory'); ?>/sl/jquery-1.9.1.min.js"></script>
     
    <!-- Include js plugin -->
    <script src="<?php bloginfo('template_directory'); ?>/sl/owl.carousel.js"></script>
<script>
  
    $(document).ready(function() {
 
    var owl = $("#owl-demo");
     
    owl.owlCarousel({
	
	
	
    items : 6, //10 items above 1000px browser width
    itemsDesktop : [1000,5], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,5], // betweem 900px and 601px
    itemsTablet: [800,5], //2 items between 600 and 0
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	itemsScaleUp : false,
	scrollPerPage : <?php echo get_option('othemes_slider_auto'); ?>, // tek resim değilde sayfa atlaması
	paginationSpeed : 1000,  // sayfalama hızı budur
	
	autoPlay: <?php echo get_option('othemes_slider_step'); ?>, //otomatik çalma süresi
	stopOnHover : true, //üzerine gelince durma
	touchDrag : true, //dokunmatik etkin
	responsiveRefreshRate :	200,
	 dragBeforeAnimFinish : true,
	
	
    });
    
	
   
    
    });





</script>
<h2 id="ana_basligim">SİZİN İÇİN SEÇTİKLERİMİZ</h2>	<div class="clear"></div>

	
	<div id="owl-demo" class="owl-carousel owl-theme">
		
		
		
			
				<?php // Gerekli Ayarlar
				if(get_option('othemes_manset_kategori')) { $katego = get_option('othemes_manset_kategori'); } else { };
			    $slidekategori = get_option('othemes_manset_kategori');
				$yazi = get_option('othemes_manset_posts');
				$tip = get_option('othemes_slider_effect');
				$othemes_slide = new WP_Query(
							
				array(
				'post_type' => 'post',
				'cat' => $slidekategori,
				'showposts' => $yazi,
				'orderby' => $tip,
				
				)
				);
				
				 
				
				
				
				?>
				<?php while ($othemes_slide->have_posts()) : $othemes_slide->the_post();?>
				<div class="item">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">


<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="147" height="225"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'slide-resim' ); ?>
 <?php } ?>

</a>
				
					</div>
				<?php endwhile; ?>
				
			</div>
		
				
	