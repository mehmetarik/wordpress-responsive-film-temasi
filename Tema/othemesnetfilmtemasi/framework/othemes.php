<?php
/**
 * Othemes Framework
 * http://www.othemes.net
 * http://twitter.com/othemesnet
 * iletisim@othemes.net
 */

class othemesFramework {
	var $theme_name;
	
	public function __construct($theme_name = 'Othemes Tema Ayarları')
	{
		// Temanın tamamı için gerekli olan bilgi vs. tür şeyler
		$this->theme_name = $theme_name;
		
		// Varsayılan seçenek ekle
		$this->default_options();
		
		add_action('init', array($this, 'init'));
		add_action('admin_menu', array($this, 'admin_menu'));
		
		add_action('wp_ajax_othemes_upload', array($this, 'upload'));
		add_action('wp_ajax_othemes_save_fields', array($this, 'save_fields'));
		add_action('wp_ajax_othemes_reset_fields', array($this, 'reset_fields'));
		
	}
	
	public function default_options()
	{
	
	//genel ayarlar
	add_option('othemes_logo', '');
	add_option('othemes_favicon', '');
	add_option('othemes_email', '');
	
	
	//slider
		add_option('othemes_manset_slider', 'On');
		add_option('othemes_slider_hopla', '2');
		add_option('othemes_manset_posts', '12');
		add_option('othemes_slider_auto', 'true');
		add_option('othemes_slider_step', '6000');
		
		
		//anasayfa
			add_option('othemes_headerliste', 'On');
		add_option('othemes_yeni', 'On');
		add_option('othemes_sayfa_basi', '25');
		add_option('othemes_ex_kategori', '');
		add_option('othemes_encokbegenilenler_page_id', '');
	    add_option('othemes_encokizlenenler_page_id', ''); 
        add_option('othemes_encokyorumlananlar_page_id', ''); 		
		add_option('othemes_uyeol_page_id2', '');
		add_option('othemes_uyegirisi_page_id2', '');
	
	
	//içerik
		add_option('othemes_faceyorum', 'Off');
		add_option('othemes_part_iki', 'Part');
		add_option('othemes_part_bir', 'Fragman');
		add_option('othemes_benzer_var', 'On');
		add_option('othemes_benzer_filmler', '4');
		add_option('othemes_filmbilgi_var', 'On');
		add_option('othemes_konu', 'On');
		add_option('othemes_tur', 'On');
		add_option('othemes_yapim', 'On');
		add_option('othemes_imdb', 'On');
		add_option('othemes_oyuncular', 'On');
		add_option('othemes_yonetmen', 'On');
		add_option('othemes_etiketler', 'On');
	
	
	//sidebar
	add_option('othemes_encok_varfilm', 'On');
		add_option('othemes_encokisimfilm', 'En Çok İzlenenler');
		add_option('othemes_encoksayifilm', '4');
		add_option('othemes_encok_var', 'On');
		add_option('othemes_encokisim', 'En Çok İzlenenler');
		add_option('othemes_encoksayi', '4');
	
	
	//sosyal
	add_option('othemes_sosyal', 'On');
		add_option('othemes_twitter_id', 'http://www.twitter.com/othemesnet');
		add_option('othemes_facebook_id', 'http://www.facebook.com/othemes.net');
		add_option('othemes_gplus_id', 'http://www.google.com/+othemesnetweb');
	
	
	//reklam
	add_option('othemes_analytics', '');
		add_option('othemes_r_a', 'Off');
		add_option('othemes_r_a_a', '');
		add_option('othemes_r_a_s', '');
		add_option('othemes_r_a_g', 'On');
		add_option('othemes_filmustureklam', 'Off');
		add_option('othemes_filmustureklamkodu', '');
		add_option('othemes_filmaltireklam', 'Off');
		add_option('othemes_filmaltireklamkodu', '');
		add_option('othemes_anasayfaustureklam', 'Off');
		add_option('othemes_anasayfaustureklamkodu', '');
		add_option('othemes_r_c', 'Off');
		add_option('othemes_r_c_c', '');
	    add_option('othemes_r_d', 'Off');
		add_option('othemes_r_d_d', '');
		add_option('othemes_r_e', 'Off');
		add_option('othemes_r_e_e', '');
	
	
		
		
		// Anasayfa SEO
		add_option('othemes_seo_home_type', 'sadeceblog');
		add_option('othemes_seo_home_separate', ' | ');
		add_option('othemes_seo_single_title', '');
		add_option('othemes_seo_single_type', 'yazibaslik');
		add_option('othemes_seo_single_separate', ' | ');
		add_option('othemes_seo_girx_separate', ' | ');
		add_option('othemes_seo_girx_type', 'kategoribaslik');
		add_option('othemes_seo_field', '');
		add_option('othemes_seo_canonical', 'On');
		add_option('othemes_seo_facebook', 'On');
		
		// Single SEO
		add_option('othemes_seo_single_field_title', 'othemes_seotitle');
		add_option('othemes_seo_single_field_description', 'othemes_seodescription');
		add_option('othemes_seo_single_field_keywords', 'othemes_seokeywords');
		
	

	}
	
	public function init()
	{
	}
	
	// Admin paneline yeni seçenekler ekle
	public function admin_menu()
	{
		$object = add_object_page('Othemes WFT Tema Ayarları', $this->theme_name, 'manage_options', 'othemes_framework', array($this, 'options_panel'), 'dashicons-admin-generic');
		
		add_action('admin_print_styles-'.$object, array($this, 'admin_scripts'));
	}
	
	public function admin_scripts()
	{
		wp_enqueue_style($this->theme_name, get_bloginfo('template_url').'/framework/othemes/theme_options/style.css', '', '1');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('ajaxupload', get_bloginfo('template_url').'/framework/othemes/theme_options/js/ajaxupload.js');
		wp_enqueue_script('color-picker', get_bloginfo('template_url').'/framework/othemes/theme_options/js/colorpicker.js');
	}
	
	// Geri arama fonksiyonu panel desteği
	public function options_panel()
	{
		$options = new othemesFrameworkOptions;
	}
	
	public function upload()
	{
		$clickedID = $_POST['data'];
		$filename = $_FILES[$clickedID];
       	$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 
		
		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';    
		$uploaded_file = wp_handle_upload($filename,$override);
		
		$upload_tracking[] = $clickedID;
		update_option($clickedID, $uploaded_file['url']);
		
		if(!empty($uploaded_file['error'])) {
			echo 'Dosya yüklenemedi: ' . $uploaded_file['error'];
		}	
		else {
			echo $uploaded_file['url'];
		}
		
		die();
	}
	
	public function save_fields()
	{
		unset($_POST['action']);
		
		foreach($_POST as $key => $value) {
			update_option($key, stripslashes($value));
		}
		
		die();
	}
	
	public function reset_fields()
	{
		//genel ayarlar
	update_option('othemes_logo', '');
	update_option('othemes_favicon', '');
	update_option('othemes_email', '');
	
	
	//slider
		update_option('othemes_manset_slider', 'On');
		update_option('othemes_slider_hopla', '2');
		update_option('othemes_manset_posts', '12');
		update_option('othemes_slider_auto', 'true');
		update_option('othemes_slider_step', '6000');
		
		
		//anasayfa
			update_option('othemes_headerliste', 'On');
		update_option('othemes_yeni', 'On');
		update_option('othemes_sayfa_basi', '25');
		update_option('othemes_ex_kategori', '');
		update_option('othemes_encokbegenilenler_page_id', '');
	update_option('othemes_encokizlenenler_page_id', '');
	    update_option('othemes_encokyorumlananlar_page_id', ''); 
		update_option('othemes_uyeol_page_id2', '');
		update_option('othemes_uyegirisi_page_id2', '');
	
	
	//içerik
		update_option('othemes_faceyorum', 'Off');
		update_option('othemes_part_iki', 'Part');
		update_option('othemes_part_bir', 'Fragman');
		update_option('othemes_benzer_var', 'On');
		update_option('othemes_benzer_filmler', '4');
		update_option('othemes_filmbilgi_var', 'On');
		update_option('othemes_konu', 'On');
		update_option('othemes_tur', 'On');
		update_option('othemes_yapim', 'On');
		update_option('othemes_imdb', 'On');
		update_option('othemes_oyuncular', 'On');
		update_option('othemes_yonetmen', 'On');
		update_option('othemes_etiketler', 'On');
	
	
	//sidebar
	    update_option('othemes_encok_varfilm', 'On');
		update_option('othemes_encokisimfilm', 'En Çok İzlenenler');
		update_option('othemes_encoksayifilm', '4');
		update_option('othemes_encok_var', 'On');
		update_option('othemes_encokisim', 'En Çok İzlenenler');
		update_option('othemes_encoksayi', '4');
	
	
	//sosyal
	    update_option('othemes_sosyal', 'On');
		update_option('othemes_twitter_id', 'http://www.twitter.com/othemesnet');
		update_option('othemes_facebook_id', 'http://www.facebook.com/othemes.net');
		update_option('othemes_gplus_id', 'http://www.google.com/+othemesnetweb');
	
	
	//reklam
	    update_option('othemes_analytics', '');
		update_option('othemes_r_a', 'Off');
		update_option('othemes_r_a_a', '');
		update_option('othemes_r_a_s', '');
		update_option('othemes_r_a_g', 'On');
		update_option('othemes_filmustureklam', 'Off');
		update_option('othemes_filmustureklamkodu', '');
		update_option('othemes_filmaltireklam', 'Off');
		update_option('othemes_filmaltireklamkodu', '');
		update_option('othemes_anasayfaustureklam', 'Off');
		update_option('othemes_anasayfaustureklamkodu', '');
		update_option('othemes_r_c', 'Off');
		update_option('othemes_r_c_c', '');
	    update_option('othemes_r_d', 'Off');
		update_option('othemes_r_d_d', '');
		update_option('othemes_r_e', 'Off');
		update_option('othemes_r_e_e', '');
	
	
		
		
		// Anasayfa SEO
		update_option('othemes_seo_home_type', 'sadeceblog');
		update_option('othemes_seo_home_separate', ' | ');
		update_option('othemes_seo_single_title', '');
		update_option('othemes_seo_single_type', 'yazibaslik');
		update_option('othemes_seo_single_separate', ' | ');
		update_option('othemes_seo_girx_separate', ' | ');
		update_option('othemes_seo_girx_type', 'kategoribaslik');
		update_option('othemes_seo_field', '');
		update_option('othemes_seo_canonical', 'On');
		update_option('othemes_seo_facebook', 'On');
		
		// Single SEO
		update_option('othemes_seo_single_field_title', 'othemes_seotitle');
		update_option('othemes_seo_single_field_description', 'othemes_seodescription');
		update_option('othemes_seo_single_field_keywords', 'othemes_seokeywords');
		
		die();
	}

}



// Sidebar Kayıt Silme
function unregister_default_wp_widgets(){
    unregister_widget( "WP_Widget_Calendar" );
    unregister_widget( "WP_Widget_Links" );
    unregister_widget( "WP_Widget_Meta" );
	 unregister_widget( "WP_Widget_Tag_Cloud" );
   
    unregister_widget( "WP_Widget_Recent_Comments" );
    unregister_widget( "WP_Widget_RSS" );
}

	add_action( "widgets_init", "unregister_default_wp_widgets", 1 );
	remove_action( "wp_head", "wlwmanifest_link" );
	remove_action( "wp_head", "wp_generator" );
	remove_action( "wp_head", "rsd_link" );
	remove_action( "wp_head", "start_post_rel_link" );
	remove_action( "wp_head", "girx_rel_link" );
	remove_action( "wp_head", "adjacent_posts_rel_link" );

// Site Meta Başlıkları
function othemes_titles() {
	$shortname = 'othemes';
	
	#Anasayfa Başlığı
	if (is_home() || is_front_page()) {
		if (get_option($shortname.'_seo_home_title') == 'On') echo get_option($shortname.'_seo_home_titletext');  
		else { 
			if (get_option($shortname.'_seo_home_type') == 'blogisim') echo get_bloginfo('name').get_option($shortname.'_seo_home_separate').get_bloginfo('description'); 
			if ( get_option($shortname.'_seo_home_type') == 'blogaciklama') echo get_bloginfo('description').get_option($shortname.'_seo_home_separate').get_bloginfo('name');
			if ( get_option($shortname.'_seo_home_type') == 'sadeceblog') echo get_bloginfo('name');
		}
	}
	#İçerik ve Sayfa Başlığı
	if (is_single() || is_page()) { 
		global $wp_query; 
		$postid = $wp_query->post->ID; 
		$key = get_option($shortname.'_seo_single_field_title');
		$exists3 = get_post_meta($postid, ''.$key.'', true);
				if (get_option($shortname.'_seo_field') == 'On' && $exists3 !== '' ) echo $exists3.get_option($shortname.'_seo_single_separate').get_bloginfo('name'); 
				else { 
					if (get_option($shortname.'_seo_single_type') == 'yazibaslik') echo trim(wp_title('',false,'')).get_option($shortname.'_seo_single_separate').get_bloginfo('name');
					if (get_option($shortname.'_seo_single_type') == 'yaziblog') echo get_bloginfo('name').get_option($shortname.'_seo_single_separate').trim(wp_title('',false,'')); 
					if (get_option($shortname.'_seo_single_type') == 'sadeceyazi') echo trim(wp_title('',false,''));
			    }
					
	}
	#Kategori, Arşiv ve Arama Başlıkları
	if (is_category() || is_archive() || is_search()) { 
		if (get_option($shortname.'_seo_girx_type') == 'kategoribaslik') echo trim(wp_title('',false,'')).get_option($shortname.'_seo_girx_separate').get_bloginfo('name');
		if (get_option($shortname.'_seo_girx_type') == 'kategoriblog') echo get_bloginfo('name').get_option($shortname.'_seo_girx_separate').trim(wp_title('',false,'')); 
		if (get_option($shortname.'_seo_girx_type') == 'sadecekategori') echo trim(wp_title('',false,''));
		}
} 

// Site Meta Açıklamaları
function othemes_description() {
	$shortname = 'othemes';
	
	#Anasayfa Açıklaması
	if (is_home() && get_option($shortname.'_seo_home_description')) { 
	echo '<meta name="description" content="'.get_option($shortname.'_seo_home_description').'" />'; echo "\n"; 
	}
	
	#İçerik ve Sayfa Açıklaması
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	$key2 = get_option($shortname.'_seo_single_field_description');
	if (isset($postid)) $exists = get_post_meta($postid, ''.$key2.'', true);
	if (get_option($shortname.'_seo_field') == 'On' && $exists !== '') {
		if (is_single() || is_page()) { echo '<meta name="description" content="'.$exists.'" />'; echo "\n"; }
	}
	
	#İndex Açıklaması
	remove_filter('term_description','wpautop');
	$cat = get_query_var('cat'); 
    $exists2 = category_description($cat);
	if ($exists2 !== '' && get_option($shortname.'_seo_girx_description') == 'On') {
		if (is_category()) { echo '<meta name="description" content="'. $exists2 .'" />'; echo "\n"; }
	}
	if (is_archive() && get_option($shortname.'_seo_girx_description') == 'On') { echo '<meta name="description" content="Şu anda '. wp_title('',false,'') .' isimli arşivi inceliyorsunuz." />'; echo "\n"; }
	if (is_search() && get_option($shortname.'_seo_girx_description') == 'On') { echo '<meta name="description" content="'. wp_title('',false,'') .'" />'; echo "\n"; }
}

// Anahtar Kelimeler
function othemes_keywords() {
	$shortname = 'othemes';
	#Anasayfa Anahtar Kelimeler
	if (is_home() && get_option($shortname.'_seo_home_keywords')) { echo '<meta name="keywords" content="'.get_option($shortname.'_seo_home_keywords').'" />'; echo "\n"; }
	
	#Sayfa Anahtar Kelimeler
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	$key3 = get_option($shortname.'_seo_single_field_keywords');
	if (isset($postid)) $exists4 = get_post_meta($postid, ''.$key3.'', true);
	if (isset($exists4) && $exists4 !== '' && get_option($shortname.'_seo_field') == 'On') {
		if (is_single() || is_page()) { echo '<meta name="keywords" content="'.$exists4.'" />'; echo "\n"; }
	}
}


// Cannonical URL
function othemes_canonical() {
	$shortname = 'othemes';
	#anasayfa url
	if (get_option($shortname.'_seo_canonical') == 'On') {
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
		$url = othemes_aiosp_get_url($wp_query);
		echo '<link rel="canonical" href="'.$url.'" />';	
	}
}

/** Diğer çağırılacak dosyalar **/

// SEO
if (get_option('othemes_seo_canonical') == 'On') {
include_once('canonical.php');
} 

// Tema seçenekleri sayfası
include_once('theme_options.php');



// Meta Kutuları
include_once('meta-kutusu.php');



$othemes = new othemesFramework('OFT Ayarlar');