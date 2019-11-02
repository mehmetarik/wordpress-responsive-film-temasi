<?php include_once('header.php'); ?>
<?php

$args = array( 'hide_empty' => 0 );
 $pages_array = get_pages($args);
$cats_array = get_categories($args);



$site_cats = array();
$site_pages = array();

array_unshift($site_pages, "Bir sayfa seçin");
array_unshift($site_cats, "Bir kategori seçin");

foreach ($pages_array as $pagg) {

	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);

	$pages_ids[] = $pagg->ID;

}

foreach ($cats_array as $categs) {

	$site_cats[$categs->cat_ID] = $categs->cat_name;

	$cats_ids[] = $categs->cat_ID;

} 

?>
<form action='' enctype='multipart/form-data'>
	<div class='top_button'>
		<img class='save_tip' style='display: none;' src='<?php bloginfo('template_directory'); ?>/framework/othemes/theme_options/images/save_tip.png' alt='' />
		<input name="save" class="save_changes" type="submit" value="" />
		<input type="hidden" name="action" value="save" />
	</div>
	<div style='clear: both;'></div>
	
	
	<div id='general_settings' class='mainTab'><!-- GENEL AYARLAR -->
		<div id='genel1'>
		
			<?php $this->select('renk_sema', array(
				'style' => 'Orjinal',
				'toprak' => 'Toprak',
				
			),
			'Site Renk Şablonu', 'Hazır renk şablonlarından birini seçebilirsiniz.'); ?>
		<?php $this->colorpicker('arkaplan', 'Site Arkaplan Rengi', 'Yandaki renk seçiciden sitenin arkaplan rengini seçebilirsiniz.'); ?>
			<?php $this->upload('logo', 'Site Logosu', 'Site logosunu değiştirmek için, Yükle butonuna tıklayarak yeni logo eklemelisiniz. </br>Logo boyutu <code>352px x 60px</code> olmalıdır'); ?>
			<?php $this->upload('favicon', 'Favicon', 'Sitenizin Favicon simgesini Yükle butonuna tıklayarak değiştirebilirsiniz . </br>Favicon boyutu <code>16px x 16px</code> olmalıdır'); ?>
			
		
			<?php $this->text('email', 'E-posta Adresi', 'İletişim formundan gelen mesajlar yönetici e-posta adresine gitsin istemiyorsanız buraya bir e-posta adresi girin.'); ?>
			<?php $this->checkbox('giris_cikis', 'Üye Giriş / Kayıt Formunu Göster.', 'Üst menüdeki giriş ve kayıt formunu buradan açabilirsiniz.'); ?>
			<?php $this->checkbox('ustmenu_statik', 'Üst Menüyü Statik Yap.', 'Üst menüyü sayfa ile hareket eder, statik hale getirebilirsiniz.'); ?>
			</div>
	</div><!-- GENEL AYARLAR BİTİŞ -->
	
	<div id='sliderana_settings' style='display: none;' class='mainTab'><!-- SLİDER AYARLARI -->
		
			<?php $this->checkbox('manset_slider', 'Slider bölümü etkinleştirilsin.', 'Anasayfadaki slider bölümünü kapatıp açabilirsiniz.'); ?>
			<?php $this->text('manset_posts', 'Slider Film Sayısı', 'Slider bölümünde kaç adet film gösterilmesini istiyorsanız RAKAMLA bu alana girin.'); ?>
			<?php $this->select('manset_kategori',$site_cats, 'Slider Kategorisi', 'Slider bölümünde hangi kategoriye ait filmleri göstermek istiyorsanız buradan seçebilirsiniz.</br> Boş bırakırsanız en son eklenen filmler gösterilecektir.'); ?>
			<?php $this->select('slider_effect', array(
				'' => 'Yeni Eklenenleri Göster',
				'rand' => 'Rastgele Göster',
			),
			'Gösterim Şekli', 'Filmleri eklenme sırasına göre veya rasgele gösterebilirsiniz.'); ?>
			
			<?php $this->select('slider_auto', array(
				'true' => 'Aktif',
				'false' => 'Devre Dışı Bırak',
			),
			'Sayfa Geçişi', 'Slider bölümünde tek film yerine her seferinde bir sayfa ileri geçer.'); ?>
			<?php $this->select('slider_step', array(
				'0' => 'Devre Dışı',
				'1000' => '1 Saniye',
				'2000' => '2 Saniye',
				'3000' => '3 Saniye',
				'4000' => '4 Saniye',
				'5000' => '5 Saniye',
				'6000' => '6 Saniye',
				'7000' => '7 Saniye',
				'8000' => '8 Saniye',
				'9000' => '9 Saniye',
				'10000' => '10 Saniye',
				'15000' => '15 Saniye',
				'20000' => '20 Saniye',
			),
			'Geçiş Süresi', 'Otomatik modda sliderın kaç saniyede bir hareket edeceğini buradan seçebilirsiniz.'); ?>
		
	
	</div><!-- SLİDER AYARLARI BİTİŞ -->
	
	
	<div id='homepage_settings' style='display: none;' class='mainTab'><!-- ANASAYFA AYARLARI -->
	<?php $this->checkbox('headerliste', 'Alfabetik film listesini etkinleştir ', 'Bu seçeneği aktif ederseniz header bölümünde alfabetik film listesi görünür.'); ?>
		<?php $this->checkbox('yeni', 'Film türü bilgileri etkinleştirilsin ', 'Bu seçeneği aktif ederseniz anasayfa ve kategori film listelerinde film türü gösterilir.'); ?>
		
		<?php $this->text('sayfa_basi', 'Anasayfada Gösterilecek Film Sayısı', 'Anasayfada, en çok izlenenler, yorumlananlar ve beğenilenler sayfasında kaç adet film görünmesini istiyorsanız bu alana RAKAMLA girin. '); ?>
		<?php $this->select('ex_kategori',$site_cats, 'Gizlenecek Kategori', 'Bu bölümden seçtiğiniz kategoriye ait filmler anasayfada gösterilmez.'); ?> 
	 <?php $this->select('encokyorumlananlar_page_id',$site_pages, 'En çok yorumlananlar sayfası', 'En çok yorumlananlar sayfa şablonu ile oluşturduğunuz sayfayı seçin. '); ?>
	
	  <?php $this->select('encokbegenilenler_page_id',$site_pages, 'En çok beğenilenler sayfası', 'En çok beğenilenler sayfa şablonu ile oluşturduğunuz sayfayı seçin.'); ?>
	  
			<?php $this->select('encokizlenenler_page_id',$site_pages, 'En çok izlenenler sayfası', 'En çok izlenenler sayfa şablonu ile oluşturduğunuz sayfayı seçin.'); ?>
				<?php $this->select('uyeol_page_id2',$site_pages, 'Üyelik Sayfası', 'Üyelik Sayfası sayfa şablonu ile oluşturduğunuz sayfayı seçin. '); ?>
			<?php $this->select('uyegirisi_page_id2',$site_pages, 'Üye Girişi Sayfası', 'Üye Girişi Sayfası sayfa şablonu ile oluşturduğunuz sayfayı seçin. '); ?>
		
		
	</div><!-- ANASAYFA AYARLARI BİTİŞ -->
	
	
	
	<div id='posts_settings' style='display: none;' class='mainTab'><!-- İÇERİK AYARLARI -->
	
			<?php $this->checkbox('faceyorum', 'Facebook Yorumlarını Etkinleştir', 'Bu seçeneği işaretlerseniz,sitenizde normal yorumlar yerine Facebook yorumları aktif olur.'); ?>
		<?php $this->text('part_iki', 'Film Part Otomatik İsmi', 'Film eklerken oluşturduğunuz sayfalamada buraya girdiğiniz isim otomatik eklenir. </br><code>Ör: Bölüm 1, Bölüm 2, Bölüm 3</code>'); ?>
		<?php $this->text('part_bir', 'İlk Part İsmi', 'İlk Part ismi <code>Fragman</code> olarak ayarlanmıştır. Buraya bir isim girerek değiştirbilirsiniz.'); ?>
		
		
		
		
	
		<?php $this->checkbox('filmbilgi_var', 'Film Bilgileri Bölümü Etkinleştir', 'Film sayfasında film bilgileri bölümünü gösterip gizleyebilirsiniz.'); ?>
		<?php $this->checkboxes(array(
			
			'konu' => 'Filmin Konusu',
			
			'tur' => 'Filmin Tür',
			'yapim' => 'Yapım',
			'imdb' => 'Filmin IMDB Puanı',
			'yonetmen' => 'Filmin Yönetmeni',
			'oyuncular' => 'Filmin Oyuncuları',
			'etiketler' => 'Etiketler',
		),
		'Film Bilgileri Bölümünde Neler Gösterilsin?'); ?>
	

	</div><!-- İÇERİK AYARLARI BİTİŞ -->
	
	
	
	
	<div id='sosyalmedya_settings' style='display: none;' class='mainTab'><!-- SOSYAL MEDYA AYARLARI -->
		<?php $this->checkbox('sosyal', 'Sosyal Medya Bölümünü Etkinleştir.', 'Bu seçeneği işaretlerseniz header bölümünde sosyal medya linkleri görünür.'); ?>
			<?php $this->text('twitter_id', 'Twitter', 'Twitter sayfanızın adresini bu alana girin. </br> Adresin önünde mutlaka <code>http://</code> bulunmalıdır.</br><code>http://www.twitter.com/othemesnet</code>'); ?>
			<?php $this->text('facebook_id', 'Facebook', 'Facebook sayfanızın adresini bu alana girin.</br><code>http://www.facebook.com/othemes.net</code>'); ?>
			<?php $this->text('gplus_id', 'Google+', 'Google+ sayfanızın adresini bu alana girin.</br><code>http://www.google.com/+othemesnetweb</code>'); ?>
	</div><!-- SOSYAL MEDYA AYARLARI BİTİŞ -->
	
	
	
	
	
	
	<div id='seo_settings' style='display: none;' class='mainTab'><!-- SEO AYARLARI -->
		<div id='seohome'>
		<?php $this->checkbox('seo_home_title', 'Anasayfa Başlığını Etkinleştir', 'Bu seçeneği işaretlerseniz aşağıya girdiğiniz bilgiler, seçenekler aktif olur.'); ?>
		<?php $this->textfield('seo_home_titletext', 'Anasayfa Başlığı', 'Bu bölüm ile anasayfanıza yeni bir başlık verebilirsiniz. Boş bırakırsanız wordpress kurulumu yaparken verdiğiniz başlık aktif olur.'); ?>
		<?php $this->textfield('seo_home_description', 'Anasayfa Açıklaması', 'Anasayfa için bir açıklama girebilirsiniz. Bu bölümü boş bırakırsanız wordpress tarafından otomatik belirlenmiş açıklamanız aktif hale gelir.'); ?>
		<?php $this->textfield('seo_home_keywords', 'Anasayfa Anahtar Kelimeleri', 'Anahtar kelimeleri girerken virgül ile ayırmayı unutmayın. Örneğin; <br /><code>othemes, wordpress, temaları</code>'); ?>
		<?php $this->select('seo_home_type', array(
			'blogisim' => 'Blog ismi | Blog açıklaması',
			'blogaciklama' => 'Blog açıklaması | Blog ismi',
			'sadeceblog' => 'Sadece Blog ismi',
		),
		'Başlık Kalıpları', 'Yukarıda anasayfa başlığı aktif halde değilse buradan bir kalıp aktif olacaktır. Size uygun olanı seçmelisiniz.'); ?>
		<?php $this->text('seo_home_separate', 'Ayırma İşareti', 'Ayırma işaretinin başına ve sonuna mutlaka <strong><span style="color:#DD4B39">boşluk</span></strong> bırakın. Varsayılan ayraç: <code> | </code>'); ?>
		</div>
		<div id='seosingle' style='display: none;'>
		<?php $this->checkbox('seo_field', 'SEO Özel Alanlarını Etkinleştir', 'Bu seçeneği işaretlerseniz aşağıya girdiğiniz bilgiler, seçenekler aktif olur.'); ?>
		<?php $this->text('seo_single_field_title', 'Yazı Başlığı Özel Alan Adı', 'Buraya gireceğiniz özel alan ismi ile yazı başlığını yeniden isimlendirebilirsiniz.'); ?>
		<?php $this->text('seo_single_field_description', 'Yazı Açıklaması Özel Alan Adı', 'Ekleyeceğiniz yazılara <strong>meta description</strong> girmenizi sağlayan özel alan ismidir.'); ?>
		<?php $this->text('seo_single_field_keywords', 'Yazı Anahtar Kelimeleri Özel Alan Adı', 'Ekleyeceğiniz yazılara <strong>meta keywords</strong> girmenizi sağlayan özel alan ismidir.'); ?>
		<?php $this->select('seo_single_type', array(
			'yazibaslik' => 'Yazı Başlığı | Blog ismi',
			'yaziblog' => 'Blog ismi | Yazı Başlığı',
			'sadeceyazi' => 'Sadece Yazı Başlığı',
		),
		'Başlık Kalıpları', 'Yukarıda anasayfa başlığı aktif halde değilse buradan bir kalıp aktif olacaktır. Size uygun olanı seçmelisiniz.'); ?>
		<?php $this->text('seo_single_separate', 'Ayırma İşareti', 'Ayırma işaretinin başına ve sonuna mutlaka <strong><span style="color:#DD4B39">boşluk</span></strong> bırakın. Varsayılan ayraç: <code> | </code>'); ?>
		</div>
		<div id='seokategori' style='display: none;'>
		<?php $this->checkbox('seo_index_description', 'Kategori Açıklamalarını Etkinleştir', 'Bu seçeneği işaretlerseniz aşağıya girdiğiniz bilgiler, seçenekler aktif olur.'); ?>
		<?php $this->select('seo_index_type', array(
			'kategoribaslik' => 'Kategori Başlığı | Blog ismi',
			'kategoriblog' => 'Blog ismi | Kategori Başlığı',
			'sadecekategori' => 'Sadece Kategori Başlığı',
		),
		'Başlık Kalıpları', 'Yukarıda anasayfa başlığı aktif halde değilse buradan bir kalıp aktif olacaktır. Size uygun olanı seçmelisiniz.'); ?>
		<?php $this->text('seo_index_separate', 'Ayırma İşareti', 'Ayırma işaretinin başına ve sonuna mutlaka <strong><span style="color:#DD4B39">boşluk</span></strong> bırakın. Varsayılan ayraç: <code> | </code>'); ?>
		</div>
		<div id='seogenel' style='display: none;'>
		<?php $this->checkbox('seo_facebook', 'Facebook Meta Bilgileri Etkinleştir', ''); ?>
		<?php $this->checkbox('seo_canonical', 'Canonical (Standart Url) Etkinleştir', ''); ?>
		</div>
	</div><!-- SEO AYARLARI BİTİŞ -->
	
	
	
	
	
	
	
	<div id='appearence_settings' style='display: none;' class='mainTab'><!-- REKLAM AYARLARI -->
		<div id='reklam_a'>
		<?php $this->textarea('analytics', 'Google Analaytics Kodunuz', 'Bu alana Google Analytics takip kodunu giriniz.'); ?>
				<?php $this->textarea('body_kodu', 'Body Kod Alanı', 'Bu alana body etiketleri arasında çalışmasını istediğiniz kodu yazabilirsiniz. Örneğin arkaplan reklam kodları, sayaç kodları gibi.'); ?>
				
					<?php $this->textarea('footer_yazi', 'Footer Metni', 'Footer bölümü için hazırladığınız metni bu alana yapıştırınız.'); ?>
		<?php $this->checkbox('r_a', 'Film Önü Reklamları Etkinleştir', 'Bu seçeneği işaretlerseniz film öncesi reklam gösterilir.'); ?>
		<?php $this->textarea('r_a_a', 'Reklam Kodunuz', 'Reklam kodunuzu bu alana giriniz. </br> <code>336x250, 300x250, 250x250</code>'); ?>
		<?php $this->select('r_a_s', array(
			'5000' => '5 Saniye',
			'10000' => '10 Saniye',
			'15000' => '15 Saniye',
			'20000' => '20 Saniye',
			'25000' => '25 Saniye',
			'30000' => '30 Saniye',
			'60000' => '60 Saniye',
			'120000' => '120 Saniye',
		),
		'Reklam Gösterim Süresi', 'Reklamın kaç saniye gösterileceğini bu bölümden seçebilirsiniz.'); ?>
		<?php $this->checkbox('r_a_g', 'Reklamı Geç Butonunu Etkinleştir.', 'Bu seçeneği işaretlerseniz reklamın altında Reklamı Geç linki gösterilir.'); ?>
		</div>
		<div id='reklam_b' style='display: none;'>
		<?php $this->checkbox('filmustureklam', 'Film Üzeri 728x90 Reklam Alanını Etkinleştir', 'Film başlığı ile içerik arasındaki reklam alanıdır'); ?>
		<?php $this->textarea('filmustureklamkodu', 'Film Üzeri Reklam Kodunuz', 'Filmin üzerinde gösterilmesini istediğiniz reklam kodunu bu alan girin. </br> <code>728x90</code>'); ?>
		
		<?php $this->checkbox('filmaltireklam', 'Film Altı 728x90 Reklam Alanını Etkinleştir', 'Film açıklamasının içinde bulunan reklam alanıdır.'); ?>
		<?php $this->textarea('filmaltireklamkodu', 'Film Altı Reklam Kodunuz', 'Bu alana girdiğiniz reklam kodları film açıklamasının içinde gösterilir. </br> <code>728x90</code>'); ?>
		<?php $this->checkbox('headerreklam', 'Header 728x90 Reklam Alanını Etkinleştir', 'Header, logonun sağ tarafındaki reklam alanı.'); ?>
		<?php $this->textarea('headerreklamkodu', 'Header 728x90 Reklam Kodu', 'Buraya gireceğiniz reklam kodu header bölümünde logonun sağ tarafında gösterilir. </br> <code>728x90</code>'); ?>
		
		<?php $this->checkbox('anasayfaustureklam', 'Anasayfa 728x90 Reklam Alanını Etkinleştir', 'Anasayfa alfabetik liste altındaki reklam bölümüdür.'); ?>
		<?php $this->textarea('anasayfaustureklamkodu', 'Anasayfa Reklam Kodu', 'Buraya gireceğiniz reklam kodu header bölümünde alfabetik listenin hemen altında gösterilir. </br> <code>728x90</code>'); ?>
		
		</div>
		<div id='reklam_c' style='display: none;'>
		<?php $this->checkbox('r_c', 'Sol Sabit Reklam Alanını Etkinleştir', 'Sitenin sol tarafında dikey reklam alanıdır.'); ?>
		<?php $this->textarea('r_c_c', 'Sol Sabit Reklam Kodunuz', ''); ?>
		<?php $this->checkbox('r_d', 'Sağ Sabit Reklam Alanını Etkinleştir', 'Sitenin sağ tarafında dikey reklam alanıdır.'); ?>
		<?php $this->textarea('r_d_d', 'Sağ Sabit Reklam Kodunuz', 'Footer sol bölüme eklemek istediğiniz linkleri veya yazıları bu bölüme girebilirsiniz. </br> <code>1024x768 çözünürlüklü ekranlarda  küçük bir kısmı görünür</code>'); ?>
		</div>
		
		<div id='reklam_e' style='display: none;'>
		<?php $this->checkbox('r_e', 'Splash Reklamları Etkinleştir', ''); ?>
		<?php $this->textarea('r_e_e', 'Reklam Kodu', 'Ekranın tam ortasında çıkan reklamlardır. </br> <code>336x250, 300x250, 250x250</code>'); ?>
		</div>
	</div><!-- REKLAM AYARLARI BİTİŞ -->
	
	<div id='yenitema_settings' style='display: none;' class='mainTab'>
	
	
	
	<?php $this->text('yapimmetaeski', 'Yapım', 'Eski temanızda yapım ülkesi için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('yapimyilimetaeski', 'Yapım Yılı', 'Eski temanızda yapım yılı için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('imdbpuanimetaeski', 'IMDB Puanı', 'Eski temanızda IMDB puanı için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('yonetmenmetaeski', 'Yönetmen', 'Eski temanızda film yönetmeni için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('oyuncularmetaeski', 'Oyuncular', 'Eski temanızda oyuncular için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('konumetaeski', 'Konu', 'Eski temanızda konu için kullandığınız özel alan ismini buraya girin.'); ?>
	<?php $this->text('resimmetaeski', 'Resim', 'Eski temanızda öne çıkarılmış görsel için kullandığınız özel alan ismini buraya girin.'); ?>
	</div>
	
	
	<div id="kayitalt">
	<div class='reset_save'>
		<div class='reset_button'>
			<INPUT onClick="return confirm('Ayarlayı sıfırlamak istediğinizden emin misiniz?')" type='submit' name='reset' value='' class='reset_btn' />
			<img class='reset_tip' style='display: none;' src='<?php bloginfo('template_directory'); ?>/framework/othemes/theme_options/images/reset_tip.png' alt='' />
		</div>
		<div class='bottom_button'>
			<img class='save_tip' style='display: none;' src='<?php bloginfo('template_directory'); ?>/framework/othemes/theme_options/images/save_tip.png' alt='' />
			<input type='submit' name='save_changes' value='' class='save_changes' />
		</div>
		<div style='clear: both;'></div>
	</div>
	<div style='clear: both;'></div>
</form>
</div>
<?php include_once('footer.php'); ?>