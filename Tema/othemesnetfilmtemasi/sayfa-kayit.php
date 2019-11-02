<?php
/*
Template Name: Üye Ol Sayfası
*/
?>
<?php get_header(); ?><div id="content"><?php global $user_ID, $user_identity, $user_level ?><?php if ( $user_ID ) : ?>
<div class="olmayansayfa"><span style="font-size:40px;">Giriş Yaptınız !</span><p>Yönlendiriliyorsunuz...</p>
<SCRIPT LANGUAGE="JavaScript">
window.location="<?php echo get_option('siteurl'); ?>/profil/<?php the_author_meta(user_nicename,$user_ID); ?>";
</script>
			</div>
		<?php else : ?>
			<div class="solbolum">
			<div class="anacerceve">
			<div class="anaicerik">
			<?php $register = $_GET['register']; if ($register == true) { ?>

			<h1 class="yazitipprofil">Tebrikler !</h1>
			<div class="filmicerik2">
			<p style="color:#FF9900  ;padding:5px;font-weight:500;font-size:16px;font-family:Roboto Slab;">+ Sitemize başarıyla üye oldunuz. Üyelik bilgileriniz e-posta adresinize gönderildi.</p>
			<form action="<?php bloginfo('url') ?>/wp-login.php" method="post">
				<p><label for="log" id="user">Kullanıcı Adı</label>
			<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" /></p>
				
				<p><label for="pwd" id="pwd">Şifre</label>
				<input type="password" name="pwd" id="pwd" size="22" /></p>
				
				<p><input type="submit" name="submit" value="<?php esc_attr_e('Giriş Yap'); ?>" class="button" />
				<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Beni Hatırla</label></p>
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
			</form>
			</div>
		<?php } else { ?>
			<div class="clear"></div>
			<h1 class="yazitipprofil"><?php the_title(); ?></h1>
			
			<div class="filmicerik2">
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
				<p><label for="user_login" id="user">Kullanıcı Adı:</label>
				<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="22" /></p>
				
				<p><label for="user_email" id="mail">E-posta Adresi:</label>
				<input type="text" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="22" /></p>
				
				<?php do_action('register_form'); ?>
				<p>E-posta adresinize şifreniz gönderilecektir.</p>
				<?php do_action('register_form'); ?>
				<input type="submit" name="user-submit" value="<?php _e('Kayıt Ol'); ?>" class="button" style="margin-bottom:10px;" tabgirx="103" />
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
				<input type="hidden" name="user-cookie" value="1" />
			</form>
			</div>
		<?php } ?>
			</div>
			</div>
			</div>
	<?php get_sidebar('diger'); ?>
		<?php endif; ?>
</div>
</div>
<div style="clear:both;"></div>
<div class="footborder"></div>
<?php get_footer(); ?>