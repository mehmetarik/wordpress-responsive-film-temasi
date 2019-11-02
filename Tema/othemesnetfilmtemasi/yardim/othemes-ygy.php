<?php

ob_start();
function register_ie_option() {
	add_menu_page('Othemes.net Tema Ayarları Yedekleme ve Geri Yükleme ', 'Yükle / Yedekle', 'activate_plugins', 'ie-option', 'ie_option_page', 'dashicons-backup');	
	add_submenu_page('ie-option', 'Ayarları Geri Yükle', 'Ayarları Geri Yükle', 'activate_plugins', 'ie-import-option', 'ie_import_option_page');
	add_submenu_page('ie-option', 'Ayarları Yedekle', 'Ayarları Yedekle', 'activate_plugins', 'ie-export-option', 'ie_export_option_page');	
	
}

/*	
 *	Main page
 */
function ie_option_page() {
?>
	<div class="wrap">
		<div id="icon-tools" class="icon32"><br /></div>
        <h2>Othemes.net Tema Ayarları Yedekleme ve Geri Yükleme </h2>
		 <p><b>Temamı satın aldığınız için teşekkür ederim.</b></p>
        <p>Öncelikle şunu belirtmek isterim ki Othemes Wordpress Film Teması'nın; <b>İsteğe Bağlı Kayıt-Tescil</b> işlemi yapılmış olup eser sahibi olarak <b>Mehmet ARIK</b> tebliğ edilmiştir. Eser üzerindeki mali haklar, yalnızca yazılı sözleşme çerçevesinde mali hakları devralan kişi/kişiler tarafından kullanılabilir. </p>
       <p>Bunu yapmaktaki tek amacım emeğimi koruma altına almaktır. Kullandığınız bu temanın görünen yüzü size basit gelebilir, fakat temeldeki kod yapısı son derece meşakatli bir sürecin sonucudur. Daha kullanışlı, gelişmiş, hızlı ve uyumlu bir tema yapmak için günler boyunca hayatımdaki çoğu standartlardan ödün verdim, kabul görmüş en son kod yapılarını kullandım, uzun süre uğraşıp belalı bir şekilde gelen Wordpress 4.0 standartlarına uydurdum. </p>
	   <p>Bu kadar emeğin üzerine sizden tek ricam, temanın warez dağıtıldığını veya satıldığını gördüğünüz vakit bana bildirmenizdir. Bu husus kendi hakkınızı korumak adına da önemlidir ki ücretini ödeyerek kullandığınız bir ürünün ücretsiz dağıtılması sizin de hakkınıza yapılmış bir müdahaledir.</p>
	   <p>Bol ziyaretçili, bol kazançlı bir siteniz olması dileğiyle.</p>
	   <p><b>Mehmet ARIK</b></p>
        <p>Aklınıza takılan herhangi bir konuda benimle iletişime geçebilirsiniz:</p>
        <ul>
		    
        	<li>E-posta : wpturizm@gmail.com</li>
			<li>Telefon :  +90 544 675 8199 (Telefon etmeden önce lütfen SMS gönderin. Yoğunluk sebebiyle çoğu zaman telefonlara bakamıyorum.)</li>
        	<li>Twitter : <a href="http://twitter.com/othemesnet">@othemesnet</a></li>
        	<li>Facebook : <a href="http://facebook.com/othemes.net">Othemes Tasarım Stüdyosu</a></li>
        </ul>
    </div>
<?php	
}


function ie_import_option_page() {
?>
	<div class="wrap">
		<div id="icon-tools" class="icon32"><br /></div>
        <h2>Ayarları Geri Yükle</h2>
        <?php
			if (isset($_FILES['import']) && check_admin_referer('ie-import')) {
				if ($_FILES['import']['error'] > 0) 
					wp_die("Bir hata meydana geldi");		
				else {
					$file_name = $_FILES['import']['name'];
					$file_ext = strtolower(end(explode(".", $file_name)));
					$file_size = $_FILES['import']['size'];
					if (($file_ext == "json") && ($file_size < 500000)) {
						$encode_options = file_get_contents($_FILES['import']['tmp_name']);
						$options = json_decode($encode_options, true);
						foreach ($options as $key => $value) {
							update_option($key, $value);	
						}
						echo "<div class='updated'><p>Tüm ayarlar başarıyla yüklendi.</p></div>";
					}	
					else 
						echo "<div class='error'><p>Geçersiz dosya biçimi veya desteklenmeyen dosya boyutu.</p></div>";
				}
			}
		?>
        <p><b>"Gözat"</b> butonuna tıklayarak önceden bilgisayarınıza kaydettiğiniz yedek dosyasını (JSON formatında) seçiniz .</p>
        <p>Ardından <b>"Yükle"</b> butonuna tıklayarak, tema ayarlarınızın en son yedeklediğiniz duruma dönmesini sağlayabilirsiniz.</p>
        <form method='post' enctype='multipart/form-data'>
	        <p class="submit">
              	<?php wp_nonce_field('ie-import'); ?>
            	<input type='file' name='import' />
	        	<input type='submit' name='submit' value='Yükle'/>
	        </p>
        </form>
    </div>
<?php
}


function ie_export_option_page() {
	if (!isset($_POST['export'])) { 
?>
		<div class="wrap">
			<div id="icon-tools" class="icon32"><br /></div>
	        <h2>Ayarları Yedekle</h2>
	        <p><b>Tema ayarlarını yedekle</b> butonuna tıklayarak, oluşturulacak JSON kayıt dosyasını bilgisayarınıza indirebilirsiniz.</p>
	        <p>Temanızda yaptığınız bütün ayarlamalar bu kayıt dosyasında mevcut olacaktır. </br> <b>NOT:</b> Tema yedek dosyası yazılarınız, menüleriniz vb gibi içerikleri barındırmaz. Sadece tema ayarlarını barındırır. İçerik kayıtlarını yedeklemek için <b>Araçlar --> Dışa Aktar</b> yolunu izlemelisiniz.</p>
	        <p>Tema ayarlarını yedekledikten sonra menüden istediğiniz zaman <b>Ayarları Geri Yükle</b> sekmesine ulaşarak yedekten geri yükleme işleminizi yapabilirsiniz.</b>.</p>
            <form method='post'>
	        <p class="submit">
            	<?php wp_nonce_field('ie-export'); ?>
	        	<input type='submit' name='export' value='Tema ayarlarını yedekle'/>
	        </p>
            </form>
	    </div>
<?php 
  	} elseif (check_admin_referer('ie-export')) {
		
		$blogname = str_replace(" ", "", get_option('blogname'));
		$date = date("m-d-Y");
		$json_name = $blogname."-".$date; // Namming the filename will be generated.
		
		$options = get_alloptions(); // Get all options data, return array
		
		foreach ($options as $key => $value) {
			$value = maybe_unserialize($value);
			$need_options[$key] = $value;
		}
		
		$json_file = json_encode($need_options); // Encode data into json data
		
		ob_clean();
		echo $json_file;
		header("Content-Type: text/json; charset=" . get_option( 'blog_charset'));
		header("Content-Disposition: attachment; filename=$json_name.json");
		exit();
	}
}
add_action('admin_menu', 'register_ie_option');


?>