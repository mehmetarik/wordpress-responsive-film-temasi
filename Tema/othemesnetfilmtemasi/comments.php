<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Bu satırları silmeyin
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Bu sayfa parola korumalı. Bu sayfayı görüntülemek için aşağıdaki şifreyi girin.</p>
	<?php
		return;
	}
?>

<!-- Düzenlemeye buradan başlayın. -->

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><b>Yorum yazmak için giriş yapmış olmanız gerekiyor.</b></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
<div style="margin-left:10px;float:right;background:none;border-radius:5px;width:240px;padding:5px;">
<div class="left" style="width:170px;">
<p style="font-size:14px;font-family:Roboto Slab;color:#333;">Merhaba <a href="<?php echo get_option('siteurl'); ?>/profil/<?php the_author_meta(user_nicename,$user_ID); ?>" style="color:#FF3333 ;font-family:Roboto Slab;margin-right:10px;"><?php echo $user_identity; ?></a><br /><small>Hemen bir yorum yazin.</small></p>
<p style="margin-top:20px;"><a href="<?php echo wp_logout_url(get_permalink()); ?>"> (Çıkış)</a></p></p>
</div>
<div style="float:right;border-radius:5px;height:60px;width:60px;padding:2px;border:2px solid #333;"><?php echo get_avatar( $comment->comment_author_email, 60 ); ?></div>
</div>
<?php else : ?>
<div style="margin-left:10px;float:right;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
    <td class="dikey" align="left" valign="top">
	<label for="name">isminiz:</label>
<input name="author" id="name" value="" size="50" tabgirx="1" type="text">
    </td>
  </tr>
    <tr>

    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>

    <td class="dikey"align="left" valign="top">
<label for="email">E-posta:</label>
<input name="email" id="email" value="" size="50" tabgirx="2" type="text">
    </td>

  </tr>
</tbody></table>
</div>
<?php endif; ?>
<div style="margin-left:10px;float:left;margin-bottom:5px;">

<p><textarea name="comment" id="comment" cols="40" rows="3" tabgirx="4"></textarea></p>
</div>
<div style="margin-left:10px;float:right;">
<input name="submit" type="submit" id="gonder" tabgirx="5" value="Yorumu Gönder" />
<?php comment_id_fields(); ?>
</div>

</form>


<?php endif; // Kayıt gerekli ve giriş yapılmaması halgir ?>

<div style="margin-left:10px;float:left;clear:both;">
	<?php if ( have_comments() ) : ?>
<div class="navigation">
	
	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments' )) : ?>
	<nav>
		<?php paginate_comments_links(); ?> 
	</nav>
	<?php endif; ?>
	
	
	</div>
	<ol class="commentlist">
	<?php wp_list_comments('type=comment&avatar_size=30&callback=othemes_comment'); ?>
	</ol>
	<div class="navigation">
	
	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments' )) : ?>
	<nav>
		<?php paginate_comments_links(); ?> 
	</nav>
	<?php endif; ?>
	
	
	</div>

 <?php else : ?>

	<?php if ('open' == $post->comment_status) : ?>

	 <?php else : // yorumlar kapalı ?>
		<p class="nocomments">Bu filme yorumlar kapalıdır.</p>
	<?php endif; ?>
<?php endif; ?>

</div>
</div>
<?php endif; // Bu silerseniz gözyüzü başınıza düşecek ?>












			
	 