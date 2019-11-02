<?php
/*
Template Name: Üye Girişi Sayfası
*/
?>
<?php get_header(); ?><div id="content">
<?php global $user_ID, $user_identity, $user_level ?>
<?php if ( $user_ID ) : ?>
<div class="olmayansayfa"><span style="font-size:40px;">Giriş Yaptınız !</span><p>Yönlendiriliyorsunuz...</p>
<SCRIPT LANGUAGE="JavaScript">
window.location="<?php bloginfo('url') ?>/profil/<?php the_author_meta(user_nicename,$user_ID); ?>";
</script></div>	<?php else : ?>	<div class="solbolum"><div class="anacerceve"><div class="anaicerik">
<h1 class="yazitipprofil"><?php the_title(); ?></h1><div class="filmicerik2">
<form action="<?php bloginfo('url') ?>/wp-login.php" method="post">
<p><label for="log" id="user">Kullanıcı Adı</label>
<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" /></p>
<p><label for="pwd" id="pwd">Şifre</label>
<input type="password" name="pwd" id="pwd" size="22" /></p>
<p><input type="submit" name="submit" value="<?php esc_attr_e('Giriş Yap'); ?>" class="button" />
<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Beni Hatırla</label></p>
<input type="hidden" name="redirect_to" value="<?php bloginfo('url') ?>"/>
</form>
<p><a href="<?php bloginfo('url') ?>/uye-ol">Üye OL</a> | <a href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Şifremi Unuttum ?</a><p></div></div></div></div><?php get_sidebar('diger'); ?><?php endif; ?></div></div>
<div style="clear:both;"></div><div class="footborder"></div><?php get_footer();?>