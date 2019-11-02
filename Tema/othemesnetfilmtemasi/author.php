<?php get_header(); ?>
<?php
if(isset($_GET['author_name'])) :
$profil = get_userdatabylogin($author_name);
get_userdatabylogin(get_the_author_login());
(get_the_author_login());
else :
$profil = get_userdata(intval($author));
endif;
?>
<div id="content">

<div class="solbolum">
	
	<div class="anacerceve">
	
		<div class="anaicerik">
		<h1 class="yazitipprofil"><?php global $current_user; get_currentuserinfo(); echo $profil->display_name; ?></h1>
		<div class="user-options-message">
			
		</div>
		<div class="user-left">
			<div class="profile-avatar">
				<?php echo get_avatar($profil->ID, 130); ?>
			</div>
			<?php if($profil->ID == $user_ID) { ?>
				<ul>
				<li><a href="<?php bloginfo('url') ?>/wp-admin/">YÖNETİM</a></li>
				<?php if ( $user_level >= 1 ) { ?><li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=filmler">YENİ FİLM EKLE</a></li><?php } ?>
				<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">PROFİLİ DÜZENLE</a></li>
				<li><span><strong>Kayıt Tarihi:</strong> <?php echo $profil->user_registered; ?></span></li>
			<?php } ?>
		</div>
		<div class="user-right">
			<div class="profile-options">
			<div class="user-bas">Hakkımda</div>
			

				<ul>
				<?php if($profil->user_description) { ?><li><?php echo $profil->user_description; ?></a></li><?php }else { ?>Henüz kendisini bizlere anlatmamış!<?php } ?>
				</br>
				
				</ul>
				<ul id="favoriler">

				<?php 
global $current_user;
$current_user = wp_get_current_user();

?>
			
				


<span>Sevdiği film türü:</span><strong><?php echo get_the_author_meta( 'fav',$profil->ID ); ?></strong></br>
<span>Favori oyuncusu:</span><strong><?php echo get_the_author_meta( 'oy',$profil->ID ); ?></strong></br>
<span>En sevdiği yönetmen:</span><strong><?php echo get_the_author_meta( 'yon',$profil->ID ); ?></strong>
				</ul>
			
			</div>
		</div>
		<div class="clear"></div>
		<div class="user-comment">
		
		<div class="user-bas">Son Yaptığı Yorumlar</div>
		<?php
		$thisauthor = get_userdata(intval($author));
		$querystr = "SELECT comment_ID, comment_post_ID, post_title, comment_content
		FROM $wpdb->comments, $wpdb->posts
		WHERE user_id = $thisauthor->ID
		AND comment_post_id = ID
		AND comment_approved = 1
		ORDER BY comment_ID DESC
		LIMIT 3";
		$comments_array = $wpdb->get_results($querystr, OBJECT); if ($comments_array): ?>
		<ul>
		<?php foreach ($comments_array as $comment):setup_postdata($comment); ?>
		<li>
		<div class="user-basl"><a href="<?php echo get_permalink($comment->comment_post_ID); ?>" title="<?php echo($comment->post_title) ?>"><strong><?php echo($comment->post_title) ?></strong></a></div>
		<p><?php comment_excerpt($comment->comment_ID); ?></p>
		</li>
		<?php endforeach; ?>
		</ul>
		<?php else : ?>
		<ul>
		<li>
	
		<div class="user-basl">  Hiç film izlenmemiş gibi görünüyor :)</div>
		<p>Bu zaman kadar bize hiç bir görüş bildirmedi.</p>
		</li>
		</ul>
		<?php endif; ?>
		</div>
		</div>
	</div>
</div>
<?php get_sidebar('diger'); ?>
</div>
</div>
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer();?>