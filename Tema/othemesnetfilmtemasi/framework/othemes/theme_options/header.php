<script type='text/javascript'>
jQuery(document).ready(function() {
	//AJAX Upload
	jQuery('.upload_button').each(function(){
		
		var clickedObject = jQuery(this);
		var clickedID = jQuery(this).attr('id');
		
		new AjaxUpload(clickedID, {
			  action: '<?php echo admin_url("admin-ajax.php"); ?>',
			  name: clickedID, // Dosya ismi
			  data: { // Ek veri gönder
					action: 'othemes_upload',
					type: 'upload',
					data: clickedID },
			  autoSubmit: true, // Seçimden sonra dosya gönder
			  responseType: false,
			  onChange: function(file, extension){},
			  onSubmit: function(file, extension){
				  this.disable(); // Sadece 1 dosya yükleme izin vermek istiyorsanız, düğmesine yükleme devre dışı bırakabilirsiniz.
			  },
			  onComplete: function(file, response) {
				  this.enable();

				  jQuery('[name="'+clickedID+'"]').val(response);

				  jQuery('.save_tip').fadeIn(400).delay(5000).fadeOut(400);
			  }
		});
	
	});

	// Save Changes
	jQuery('.save_changes').click(function(e) {
		e.preventDefault();

		var form = jQuery(this).parents('form');
		
		jQuery.ajax({
			url: '<?php echo admin_url("admin-ajax.php"); ?>',
			data: jQuery(form).serialize()+'&action=othemes_save_fields',
			type: 'POST',
			success: function() {
				jQuery('.save_tip').fadeIn(400).delay(5000).fadeOut(400);
			}
		});
	});

	// Reset Changes
	jQuery('.reset_btn').click(function(e) {
		e.preventDefault();

		var form = jQuery(this).parents('form');
		
		jQuery.ajax({
			url: '<?php echo admin_url("admin-ajax.php"); ?>',
			data: 'action=othemes_reset_fields',
			type: 'POST',
			success: function() {
				jQuery('.reset_tip').fadeIn(400).delay(5000).fadeOut(400);
				setTimeout('location.reload(true);', 1200)
			}
		});
	});

	// Main tabs
	jQuery('.main_tabs a').click(function(e) {
		e.preventDefault();

		var href = jQuery(this).attr('href')
		var parent = jQuery(href).parent();
		var name = href.replace('#', '');
		
		jQuery(this).parents('ul').find('li').removeClass('selected');
		jQuery(this).parent().addClass('selected');

		jQuery('.sub_tabs ul').fadeOut();
		jQuery('.sub_tabs').find('.'+name).fadeIn();

		jQuery(parent).find('> div.mainTab').slideUp();
		jQuery(href).slideDown();
	});
	
	// Sub tabs
	jQuery('.sub_tabs a').click(function(e) {
		e.preventDefault();

		var href = jQuery(this).attr('href')
		var parent = jQuery(href).parent();

		jQuery(this).parents('ul').find('li').removeClass('selected');
		jQuery(this).parent().addClass('selected');
		
		jQuery(parent).find('> div').slideUp();
		jQuery(href).slideDown();
	});

	// Skins
	jQuery('.skins img').live('click', function(e) {
		e.preventDefault();

		var id = jQuery(this).attr('id');
		var bg_color = jQuery(this).data('background');
		var pattern = jQuery(this).data('pattern');
		var link_color = jQuery(this).data('link');
		
		jQuery(this).parent().find('img').removeClass('selected');
		jQuery(this).addClass('selected');

		jQuery('[name=othemes_pattern]').parent().find('img').removeClass('selected');
		jQuery('#' + pattern).addClass('selected');
		
		jQuery(this).parent().find('input').val(id);

		jQuery('#othemes_bg_color').val(bg_color);
		jQuery('#colorpicker_bg_color .colorSelector').ColorPickerSetColor(bg_color);
		jQuery('#colorpicker_bg_color .colorSelector div').css('background-color', '#' + bg_color);
		
		jQuery('[name=othemes_pattern]').val(pattern);
		
		jQuery('#othemes_link_color').val(link_color);
		jQuery('#colorpicker_link_color .colorSelector').ColorPickerSetColor(link_color);
		jQuery('#colorpicker_link_color .colorSelector div').css('background-color', '#' + link_color);
	});
	
	// Images
	jQuery('.images img').live('click', function(e) {
		e.preventDefault();

		var id = jQuery(this).attr('id');

		jQuery(this).parent().find('img').removeClass('selected');
		jQuery(this).addClass('selected');
		
		jQuery(this).parent().find('input').val(id);
	});
	
	jQuery('.images img.selected').live('click', function(e) {
		e.preventDefault();

		jQuery(this).removeClass('selected');
		jQuery(this).parent().find('input').val('');
	});
});
</script>
<div class='othemes'>
	<div class='main_tabs'>
	<li class='othemes_header'>
		<a href='http://www.othemes.net' target='_blank'><img class='logo' src='<?php bloginfo('template_directory'); ?>/framework/othemes/theme_options/images/headerlogo.png' alt='' /></a>
	</li>
		<li class='selected'><a class='general' href='#general_settings'>Genel Ayarlar</a></li></br>
		<li ><a class='sliderana' href='#sliderana_settings'>Slide Ayarları</a></li></br>
		<li><a class='homepage' href='#homepage_settings'>Anasayfa Ayarları</a></li></br>
		<li><a class='posts' href='#posts_settings'>İçerik Ayarları</a></li></br>
		
			<li><a class='sosyalmedya' href='#sosyalmedya_settings'>Sosyal Medya</a></li></br>
		<li><a class='seo' href='#seo_settings'>SEO Ayarları</a></li></br>
		<li style="border:none;"><a class='appearence' href='#appearence_settings'>Reklam / Kod Yönetimi</a></li></br>
		<li style="border:none;"><a class='yenitema' href='#yenitema_settings'>Eski Tema Ayarları</a></li></br>
	</div>
	
	<div class='othemes_container'>
			<div class='sub_tabs'>
			<ul class='general_settings'>
			<li class='selected'><a href='#genel1'>Tema ile ilgili genel ayarları bu bölümde bulabilirsiniz.</a></li>
			</ul>
			<ul class='sliderana_settings'>
			<li class='selected'><a href='#slide1'>Anasayfa film slideshow ile ilgili düzenlemeleri buradan yapabilirsiniz.</a></li>
			</ul>
			<ul class='homepage_settings'>
			<li class='selected'><a href='#anasayfa1'>Anasayfa film listesi ile ilgili düzenlemeleri bu bölümden yapabilirsiniz.</a></li>
			</ul>
			<ul class='posts_settings'>
			<li class='selected'><a href='#icerik1'>Film sayfası, normal sayfalar ve yazı içeriğiyle ilgili ayarlamalara bu bölümden erişebilirsiniz.</a></li>
			</ul>
			
			<ul class='sosyalmedya_settings'>
			<li class='selected'><a href='#sosyalmedya1'>Sitenizin sosyal medya profillerini bu bölümden ayarlayabilirsiniz.</a></li>
			</ul>
			<ul class='yenitema_settings'>
			<li class='selected'><a href='#yenitema1'>Eski temanızda kullandığınız özel alanları bu bölümden ayarlayabilirsiniz.</a></li>
			</ul>
			
			<ul class='seo_settings selected'>
				<li class='selected'><a href='#seohome'>Anasayfa SEO</a></li>
				<li><a href='#seosingle'>İçerik SEO</a></li>
				<li><a href='#seokategori'>Kategori SEO</a></li>
				<li><a href='#seogenel'>Genel SEO Ayarları</a></li>
			</ul>
			<ul class='appearence_settings selected'>
				<li class='selected'><a href='#reklam_a'>Video Önü Reklam</a></li>
				<li><a href='#reklam_b'>728x90 Reklam</a></li>
				<li><a href='#reklam_c'>Dikey Reklamlar</a></li>
				
				<li><a href='#reklam_e'>Splash Reklam</a></li>
			</ul>
		</div>