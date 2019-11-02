<div class="filmcerceve">


<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
<?php othemes_afis_sistemi('afisbilgi'); ?>

<?php $eskiresim = get_option('othemes_resimmetaeski'); ?>
<?php if ( get_post_meta( get_the_ID(), 'resim', true ) ) { ?>
 
<img src="<?php echo get_post_meta( get_the_ID(), $eskiresim, true ) ?>" alt="<?php the_title(); ?>" width="108" height="153"/>
   
<?php } else { ?>
 <?php echo get_the_post_thumbnail( $post->ID, 'anasayfa-resim' ); ?>
 <?php } ?>
 
</a>


<div class="filmgorunum"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>

</div>