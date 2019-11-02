<?php
ob_start ();
/*
Template Name: İletişim Sayfası
*/
?>
<?php get_header();
if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Lütfen adınızı giriniz.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		if(trim($_POST['contactSubject']) === '') {
			$subjectError = 'Lütfen konu giriniz.';
			$hasError = true;
		} else {
			$subject = trim($_POST['contactSubject']);
		}
		if(trim($_POST['email']) === '')  {
			$emailError = 'Lütfen e-posta adresinizi giriniz.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'Geçersiz E-Posta Adresi.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$commentError = 'Lütfen mesajınızı giriniz.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = get_option('othemes_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}

			$subject = '[Film Teması İletişim Formu] Gönderen '.$name;
			$body = "Ad: $name \n\nE-Posta: $email \n\nMesaj: $comments";
			$headers = 'Gönderen: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			//mail('othemes@gmail.com', $subject, $body, $headers);
			$emailSent = true;
		}
	
} ?>
<div id="content"><div class="solbolum"><div class="anacerceve"><div class="anaicerik">
<h1 class="yazitipprofil"><?php the_title(); ?></h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="filmicerik2">
<?php if(isset($emailSent) && $emailSent == true) { ?>
<p style="background:#111;border-radius:3px;color:#FF9900  ;padding:5px;font-weight:500;font-family:Roboto Slab;font-size:14px;line-height:22px;">Teşekkürler, e-postanız başarıyla gönderildi. Anasayfaya yönlendiriliyorsunuz...</p>
<?php $anadres = get_bloginfo('url'); ?>
<?php header ( "Refresh:3; url=$anadres" );?>
<?php } else { ?>
<?php if(isset($hasError) || isset($captchaError)) { ?>
<p style="background:#111;border-radius:3px;color:#FF9900  ;padding:5px;font-weight:500;font-family:Roboto Slab;font-size:14px;line-height:22px;">Üzgünüz, bir hata ile karşılaştık. Formu eksiksiz doldurduğunuzdan emin olun.</p>
<?php } ?>
<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
<div class="contactform">
<p>
<label for="contactName" id="user">İsminiz: </label>
<input type="text" name="contactName" id="user_login" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
<?php if($nameError != '') { ?>
<span class="error"><?=$nameError;?></span><?php } ?></p>
<p>
<label for="email" id="user">E-posta adresi:</label>
<input type="text" name="email" id="user_email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
<?php if($emailError != '') { ?><span class="error"><?=$emailError;?></span><?php } ?></p>
<p>
<label for="contactName" id="user">Konu:</label>
<input type="text" name="contactSubject" id="contactSubject" value="<?php if(isset($_POST['contactSubject'])) echo $_POST['contactSubject'];?>" class="required requiredField" />
<?php if($subjectError != '') { ?><span class="error"><?=$subjectError;?></span><?php } ?></p></div>
<div class="clear"></div><div class="textarea">	<label for="contactName" id="user">Mesajınız</label><div class="clear"></div>
<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
<p class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" id="btn-send">E-posta Gönder</button></p><?php if($commentError != '') { ?><br /><span class="error"><?=$commentError;?></span><?php } ?></div><?php } ?> </div>			
<?php endwhile; endif; ?></div></div></div><?php get_sidebar('diger'); ?></div></div><div style="clear:both;"></div>
<div class="footborder"></div><?php get_footer(); ?>