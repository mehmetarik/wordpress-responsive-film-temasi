<div id="footer"><!-- FOOTER -->
<?php 
		if(get_option('othemes_r_c') == 'On') { echo'<div id="header_sol">'; echo get_option('othemes_r_c_c'); echo '</div>'; }
		if(get_option('othemes_r_d') == 'On') { echo'<div id="header_sag">'; echo get_option('othemes_r_d_d'); echo '</div>'; }
		 if(get_option('othemes_r_e') == 'On') { include(TEMPLATEPATH . '/splash.php'); } 
		?>
			<?php  if(get_option('othemes_analytics')) { echo get_option('othemes_analytics'); } ?>
	<div class="footerilk clearfix"><!-- footerilk -->
		
<ul class="sosyalfooter clearfix">
<li><?php if(get_option('othemes_facebook_id')) { ?>
<a class="ffacebook" rel="nofollow" href="<?php echo get_option('othemes_facebook_id'); ?>" target="_blank">
<img src="<?php bloginfo('template_directory'); ?>/images/feysbuk.png" width="35" height="36" alt="facebook" title="facebook" />
</a><?php } else { ?><a class="ffacebook" rel="nofollow" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/feysbuk.png" width="35" height="36" alt="facebook" title="facebook" /></a><?php } ?>
</li>


<li><?php if(get_option('othemes_twitter_id')) { ?><a class="ftwitter" rel="nofollow" href="<?php echo get_option('othemes_twitter_id'); ?>" target="_blank">
<img src="<?php bloginfo('template_directory'); ?>/images/tweet.png" width="35" height="36" alt="twitter" title="twitter" />
</a><?php } else { ?><a class="ftwitter" rel="nofollow" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/tweet.png" width="35" height="36" alt="twitter" title="twitter" /></a><?php } ?></li>

<li><?php if(get_option('othemes_gplus_id')) { ?><a class="fgplus" rel="nofollow" href="<?php echo get_option('othemes_gplus_id'); ?>" target="_blank">
<img src="<?php bloginfo('template_directory'); ?>/images/gplus.png" width="35" height="36" alt="googleplus" title="googleplus" />
</a><?php } else { ?><a class="fgplus" rel="nofollow" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/gplus.png" width="35" height="36" alt="googleplus" title="googleplus" /></a><?php } ?></li>

<li><a class="frss" href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/besleme.png" width="35" height="36" alt="rss" title="rss" /></a></li>
</ul>
		<div class="clear"></div>
		
			 <nav class="nav4">
		
			<ul id="nav4">
			
			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => 0 ) ); ?>
 
			</ul><?php endif; ?>
		  </nav>
	
		</div>


</div>
	
<div class="footeralt">
			<div class="footeralt2">
		<p style="line-height:22px;">
		<?php echo get_option('othemes_footer_yazi'); ?>
			</p>
			</div>
			</div>
			
			<div class="clear"></div>
</body>
</html>
