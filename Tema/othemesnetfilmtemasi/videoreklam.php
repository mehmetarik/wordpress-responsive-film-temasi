<script type="text/javascript">
setTimeout('gizle()',<?php echo get_option('othemes_r_a_s'); ?>);
function gizle() {
var x=document.getElementById('filmoncereklam').style;
var y=document.getElementById('film').style;
if(x.display=='block') { x.display='none'; y.display='block'; }
else { x.display='block'; y.display='none'; }
}
</script>
		<div id="filmoncereklam" align="center">
		
		<?php echo get_option('othemes_r_a_a'); ?></br>
		
		<img src="<?php bloginfo('template_directory'); ?>/images/progressbar.gif" alt="Yükleniyor"/> </br>
		<?php if(get_option('othemes_r_a_g') == 'On'): ?><a onclick="gizle();return false;" class="reklamgec" href="#">Reklamı Geç</a><?php endif; ?>
<br><font style="font-size:20px; font-weight:500; color:#fff;font-family:Roboto Slab;">iyi seyirler dileriz</font><br>

		</div>
		 
		<div id="film" style="display:none">
		<div class="filmicerik">
		<?php the_content(); ?>
		</div>
		</div>
		
		
		
		
	