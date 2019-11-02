<?php
/*
Template Name: Sayfa
*/
?>
<?php get_header(); ?><div id="content"><div class="solbolum"><div class="anacerceve"><div class="anaicerik">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><h1 class="yazitipprofil"><?php the_title(); ?></h1>
<div class="filmicerik2"><?php the_content(); ?></div><?php endwhile; else: ?><?php endif; ?></div></div>
<?php if (get_option('othemes_faceyorum') == 'On'): {?><div class="anacercevef"><div class="anaicerikf">
<div class="yazitipfilmf">Yorum Yapmak İster misiniz ?</div><div id="faceyorum">
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="710" data-numposts="8" data-colorscheme="light"></div>
</div></div></div><?php } else: ?><div class="anacerceve"><div class="anaicerik">
<div class="yazitipfilm">Yorum Yapmak İster misiniz ?</div><?php comments_template(); ?> </div>
</div><?php endif; ?></div><?php get_sidebar('diger'); ?></div></div><div style="clear:both;"></div><div class="footborder"></div>
<?php get_footer(); ?>