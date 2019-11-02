<?php
/* responsive video */
add_filter( 'embed_oembed_html', 'dmk_add_responsive_video_container', 999, 3 );
function dmk_add_responsive_video_container( $html, $url, $attr ) {
$extra_classes = '';
// width
preg_match( "/width=\"[0-9]*\"/", $html, $matches );
$width = str_replace( 'width=', '', str_replace( '"', '', $matches[0] ) ) . '<br>';
// height
preg_match( "/height=\"[0-9]*\"/", $html, $matches );
$height = str_replace( 'height=', '', str_replace( '"', '', $matches[0] ) ) . '<br>';
// preload width height sil
$html = preg_replace( "/ (width|height)=\"[0-9]*\"/", "", $html );
// 16:9 boyutta, oran 1.5den fazlaysa hd oluyor
if ( $width / $height > 1.5 )
$extra_classes .= ' hd';
// Vimeo
if ( strpos( $html, "http://player.vimeo.com" ) )
$extra_classes .= ' vimeo';
// Blip
if ( strpos( $html, "http://blip.tv" ) )
$extra_classes .= ' blip';
// Flickr
if ( strpos( $html, "http://www.flickr.com" ) )
$extra_classes .= ' flickr';
// img
if ( strpos( $html, "<img" ) )
$extra_classes .= ' img';
// Return
return '<div class="responsive-video' . $extra_classes . '">' . $html . '</div>';
}
 
// walker menü
class responsive_nav_walker extends Walker_Nav_Menu {
function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
$id_field = $this->db_fields['id'];
if ( !empty( $children_elements[ $element->$id_field ] ) ) {
$element->classes[] = 'menu-item-parent';
}
Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
}
}
 
/* günün filmi */ 
function prfx_featured_meta() {
add_meta_box( 'prfx_meta', __( 'Günün Filmi Bölümü', 'prfx-textdomain' ), 'prfx_meta_callback', 'filmler', 'normal', 'high' );
add_meta_box( 'prfx_meta', __( 'Günün Filmi Bölümü', 'prfx-textdomain' ), 'prfx_meta_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_featured_meta' );
 
function prfx_meta_callback( $post ) {
wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
$prfx_stored_meta = get_post_meta( $post->ID );
?>
<p>
<div class="prfx-row-content">
 <label for="featured-checkbox">
<input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured-checkbox'] ) ) checked( $prfx_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
<?php _e( 'Günün Filmi Olarak Ayarla', 'prfx-textdomain' )?>
</label></br></br>
<span class="prfx-row-title"><?php _e( 'İşaretlerseniz film anasayfa Sidebarda günün filmi bölümünde görünecektir. ', 'prfx-textdomain' )?></span></div></p>  
<?php
}
/* kaydet */
function prfx_meta_save( $post_id ) {
// kayıt kontrol et
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );
$is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// kaydederken bitti, koddan çıkabiliyor, denendi
if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
return;
}
// checkbox değerlerini burada kontrol ettiriyorum, işaretlimi diye
if( isset( $_POST[ 'featured-checkbox' ] ) ) {
update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
update_post_meta( $post_id, 'featured-checkbox', 'no' );
}
}
add_action( 'save_post', 'prfx_meta_save' );



include_once( "framework/iceriktipi.php" );

 

/* mnüler */
function register_my_menus( )
{
register_nav_menus( array( "header-menu" => __( "Othemes Ana Menü" ) ) );
register_nav_menus( array( "ust-nav" => __( "Othemes Üst Menü" ) ) );
register_nav_menus( array( "footer-menu" => __( "Othemes Footer Menü" ) ) );
register_nav_menus( array( "mobil-menu" => __( "Othemes Mobil Menü" ) ) );
}

/* afişler */
function othemes_afis_sistemi( $meta )
{
global $post;
if ( get_option( "othemes_yeni" ) == "On" )
{
$dil = get_post_meta( $post->ID, "".$meta."", true );
if ( $dil == "Girilmedi" )
{
echo "";
}
if ( $dil == "Turkce Dublaj" )
{
echo "<span class=\"tr-dublaj\">TR Dublaj</span>";
}
if ( $dil == "Turkce Altyazi" )
{
echo "<span class=\"tr-altyazi\">TR Altyazı</span>";
}
if ( $dil == "Yetiskin" )
{
echo "<span class=\"tr-yetiskin\">Yetişkin</span>";
}
if ( $dil == "Yerli Yapim" )
{
echo "<span class=\"tr-yerli-yapim\">Yerli Film</span>";
}
if ( $dil == "Yerli Dizi" )
{
echo "<span class=\"tr-yerli-dizi\">TR Dizi</span>";
}
if ( $dil == "Yabanci Dizi" )
{
echo "<span class=\"tr-yabanci-dizi\">Yabancı Dizi</span>";
}
if ( $dil == "3D Film" )
{
echo "<span class=\"tr-3d\">3D Film</span>";
}
}
}



/* part bilgi*/
function bilgi_part( $args = "" )
{
global $post;
$bilgi = get_post_meta( $post->ID, "partbilgi", true );
if ( $bilgi != "" )
{
echo "<span style=\"margin-right:2px;text-transform:none;\">( ".$bilgi." )</span>";
}
else
{
echo "<span style=\"margin-right:2px;text-transform:none;\">( Yüksek Kalite )</span>";
}
}
/* part sistemi */
function othemes_part_sistemi( $args = "" )
{
$defaults = array( "before" => "".__( "".$bilgi."" ), "after" => "<span class=\"bgnm\"><a href=\"#respond\">Yorum yap</a></span>", "link_before" => "<span>", "link_after" => "</span>", "echo" => 1 );
$r = wp_parse_args( $args, $defaults );
extract( $r, EXTR_SKIP );
global $page;
global $numpages;
global $multipage;
global $more;
global $pagenow;
global $pages;
$bilgi_bir = get_option( "othemes_part_bir" );
$output = "";
if ( $multipage )
{
$output .= $before;
$i = 1;
while ( $i < $numpages + 1 )
{
$part_content = $pages[$i - 1];
$has_part_title = strpos( $part_content, "<!--baslik:" );
if ( 0 === $has_part_title )
{
$end = strpos( $part_content, "-->" );
$title = trim( str_replace( "<!--baslik:", "", substr( $part_content, 0, $end ) ) );
}
$output .= " ";
if ( $i != $page || !$more && $page == 1 )
{
$output .= _wp_link_page( $i );
}
$output .= $link_before.$title.$link_after;
if ( $i != $page || !$more && $page == 1 )
{
$output .= "</a>";
}
$i = $i + 1;
}
$output .= $after;
}
if ( $echo )
{
echo $output;
}
return $output;
}

/* yorumlar */
function othemes_comment( $comment, $args, $depth )
{
$GLOBALS['comment'] = $comment;
echo "   <li ";
comment_class( );
echo " id=\"li-comment-";
comment_id( );
echo "\">\r\n     <div id=\"comment-";
comment_id( );
echo "\">\r\n      <div class=\"comment-author vcard\">\r\n         ";
echo get_avatar( $comment->comment_author_email, "30", $default = get_template_directory_uri( )."/images/gravatar.gif" );
echo "\r\n         ";
printf( __( "<cite class=\"fn\">%s</cite> <span class=\"says\"> - </span>" ), get_comment_author_link( ) );
echo "<s";
echo "pan class=\"comment-zaman\">";
printf( __( "%1\$s" ), get_comment_date( __( "F j, Y" ) ) );
echo " </span>\r\n      </div>\r\n      ";
if ( $comment->comment_approved == "0" )
{
echo "         <em>";
_e( "Yorumunuz onaylandıktan sonra yayınlanacaktır." );
echo "</em>\r\n         <br />\r\n      ";
}
comment_text( );
echo "     </div>\r\n";
}


function do_my_custom_dashboard() {

   echo "<h1>put here anything...</h1>";

}





include_once( "yardim/othemes-ygy.php" ); 
include_once( "framework/othemes.php" ); 
include_once( "framework/likethis.php" );
include_once( "framework/widgets/facebook-like-widget.php" );
include_once( "framework/widgets/populerfilmler.php" );
include_once( "framework/widgets/yorumlar.php" );
include_once( "framework/widgets/benzerfilmler.php" );
include_once( "framework/widgets/gununfilmi.php" );
include_once( "framework/widgets/sonyazilar.php" );
include_once( "framework/widgets/feedburner.php" );
include_once( "framework/widgets/kategoriler.php" );
include_once( "framework/widgets/kategoriler.php" );
require('framework/notifier.php');

add_filter( "show_admin_bar", "__return_false" );
remove_action( "personal_options", "_admin_bar_preferences" );
remove_action( "wp_head", "rel_canonical" );
global $wp_rewrite;
$wp_rewrite->author_base = "profil";
add_theme_support( "post-thumbnails", array('post', 'page') );
add_image_size( "anasayfa-resim", 205, 290, true );
add_image_size( "benzerleri-resim", 108, 153, true );
add_image_size( "single-resim", 208, 281, true );
add_image_size( "izlenen-resim", 70, 80, true );
add_image_size( "slide-resim", 147, 225, true );
add_action( "init", "register_my_menus" );
register_sidebar( array( "name" => "Sidebar (Anasayfa)", "id" => "sidebar","before_title" => "<h2>", "after_title" => "</h2>", "before_widget" => "<div class=\"sidebarborder\"><div class=\"sidebar-right\">", "after_widget" => "</div></div>") );
register_sidebar( array( "name" => "Sidebar (Film)", "id" => "single","before_title" => "<h2>", "after_title" => "</h2>", "before_widget" => "<div class=\"sidebarborder\"><div class=\"sidebar-right\">", "after_widget" => "</div></div>") );
register_sidebar( array( "name" => "Sidebar (Diğer)", "id" => "diger","before_title" => "<h2>", "after_title" => "</h2>", "before_widget" => "<div class=\"sidebarborder\"><div class=\"sidebar-right\">", "after_widget" => "</div></div>") );








add_action( 'admin_bar_menu', 'social_media_links', 900 );
function social_media_links($wp_admin_bar)
{

	$args = array(
		'id'     => 'social_media',
		'title'	=>	' *** OTHEMESNET MENÜ ***',
		'meta'   => array( 'class' => 'first-toolbar-group' ),
	);
	$wp_admin_bar->add_node( $args );	

	
			$args = array();
	
			array_push($args,array(
				'id'		=>	'2temalarimiz',
				'title'		=>	'Diğer Temalarımıza Bakın',
				'href'		=>	'http://www.othemes.net/demo',
				'parent'	=>	'social_media',
			));
			

			array_push($args,array(
				'id'     	=> '1kilavuz',
				'title'		=>	'Kullanım Kılavuzunu Görüntüleyin',
				'href'		=>	'http://othemes.net/destek/othemes-wordpress-film-temasi-dokumantasyon',
				'parent' 	=> 'social_media',
				
			));

			array_push($args,array(
				'id'		=>	'3tema',
				'title'		=>	'Tema Satış Sayfasını Ziyaret Edin',
				'href'		=>	'http://othemes.net/temalar/wordpress-responsive-film-temasi',
				'parent'	=>	'social_media',
			));
			
			array_push($args,array(
				'id'		=>	'4destek',
				'title'		=>	'Teknik Destek Talebinde Bulunun',
				'href'		=>	'http://othemes.net/destek',
				'parent'	=>	'social_media',
			));
			
			array_push($args,array(
				'id'		=>	'5wordpress',
				'title'		=>	'Temel Wordpress Derslerini İnceleyin',
				'href'		=>	'http://othemes.net/temel-wordpress-dersleri',
				'parent'	=>	'social_media',
			));
			
			array_push($args,array(
				'id'		=>	'6facebook',
				'title'		=>	'Facebook',
				'href'		=>	'https://facebook.com/othemes.net',
				'parent'	=>	'social_media',
			));
			
			array_push($args,array(
				'id'		=>	'7twitter',
				'title'		=>	'Twitter',
				'href'		=>	'https://twitter.com/othemesnet',
				'parent'	=>	'social_media',
			));
			
			array_push($args,array(
				'id'		=>	'8google',
				'title'		=>	'Google+',
				'href'		=>	'https://business.google.com/b/109374882105217458295',
				'parent'	=>	'social_media',
			));
			
			sort($args);
			for($a=0;$a<sizeOf($args);$a++)
			{
				$wp_admin_bar->add_node($args[$a]);
			}

			
	
} 


// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	// Entering the text between the quotes
	echo "<ul>
	
	<li>Son Düzenleme Tarihi: 19 Ocak 2016</li>
	<li>Yapımcı: <a href=\"http://othemes.net\" target=\"_blank\">OthemesNET</a></li>
		<li>Facebook: <a href=\"http://facebook.com/othemes.net\" target=\"_blank\">Othemes Profesyonel Wordpress Temaları</a></li>
		<li>İletişim: <a href=\"mailto:info@othemes.net\" target=\"_top\">info@othemes.net</a></li>
		<li>İletişim: <a href=\"mailto:wpturizm@gmail.com\" target=\"_top\">wpturizm@gmail.com</a></li>
	
	<li><center><b>Othemes Wordpress Film Teması'nı Satın Aldığınız İçin Teşekkür Ederiz</b></center></li>
	<li><b>Mehmet ARIK</b></li>
	<li>Yeni güncellemeler için e-posta adresinizi düzenli olarak kontrol edin.</li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Othemes Wordpress Film Teması Detayları', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );





function dashboard_widget_function() {
     $rss = fetch_feed( "http://www.othemes.net/feed" );
  
     if ( is_wp_error($rss) ) {
          if ( is_admin() || current_user_can('manage_options') ) {
               echo '<p>';
               printf(__('<strong>RSS Hatası</strong>: %s'), $rss->get_error_message());
               echo '</p>';
          }
     return;
}
  
if ( !$rss->get_item_quantity() ) {
     echo '<p>Şuan için yeni birşeyler eklenmişe benzemiyor!</p>';
     $rss->__destruct();
     unset($rss);
     return;
}
  
echo "<ul>\n";
  
if ( !isset($items) )
     $items = 5;
  
     foreach ( $rss->get_items(0, $items) as $item ) {
          $publisher = '';
          $site_link = '';
          $link = '';
          $content = '';
          $date = '';
          $link = esc_url( strip_tags( $item->get_link() ) );
          $title = esc_html( $item->get_title() );
          $content = $item->get_content();
          $content = wp_html_excerpt($content, 250) . ' ...';
  
         echo "<li><a class='rsswidget' href='$link'>$title</a>\n<div class='rssSummary'>$content</div>\n";
}
  
echo "</ul>\n";
$rss->__destruct();
unset($rss);
}
 
function add_dashboard_widget() {
     wp_add_dashboard_widget('lawyerist_dashboard_widget', 'OthemesNET\'den Yeni Haberler', 'dashboard_widget_function');
}
 
add_action('wp_dashboard_setup', 'add_dashboard_widget');




function remove_dashboard_meta() {
        
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        
}
add_action( 'admin_init', 'remove_dashboard_meta' );






















?>