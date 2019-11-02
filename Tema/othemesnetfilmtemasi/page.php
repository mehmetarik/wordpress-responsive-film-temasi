<?php get_header(); ?>
<div id="content"><div class="solbolum"><div class="anacerceve"><div class="anaicerik">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h1 class="yazitipprofil"><?php the_title(); ?></h1><div class="filmicerik2"><?php the_content(); ?></div><?php endwhile; else: ?>
<?php endif; ?></br><div id="alt"> 
<div class="facebok"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=621" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></div>
<div class="twitter2"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
<div class="pinit"><a href="//tr.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></div>
<div class="googleplus2"><div class="g-plusone" data-size="medium"></div></div></div>
<div style="border-top:1px solid #ddd;width:96%;margin:0px auto;"></div>		
<?php if (get_option('othemes_faceyorum') == 'On'): {?>	<div id="faceyorum">
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="710" data-numposts="8" data-colorscheme="light"></div></div>	
<?php } else: ?><?php comments_template(); ?><?php endif; ?></div></div></div><?php get_sidebar('diger'); ?></div></div>
<div style="clear:both;"></div><div class="footborder"></div><?php get_footer(); ?>