<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php othemes_titles(); ?></title>
<?php othemes_description(); // Meta Açıklama ?>
<?php othemes_keywords(); // Anahtar Kelimeler ?>
<?php othemes_canonical(); // Url Canonical ?>
<meta name="language" content="Turkish" />
<meta name="viewport" content="width=device-width">
<meta property="fb:app_id" content="306675346196073"/>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Beslemesi" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Yorum Beslemesi" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- CSS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" />
<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/toprak.css" title="toprak" />
<!-- JS -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/othemes.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/sl/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/sl/isikmin.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/sl/isik.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<!-- MOBİL STİL BAŞLA-->
<style type="text/css">@media screen and (-webkit-min-device-pixel-ratio:0) {#searchbox {float:left;margin-top:10px;padding: 1px 0px 3px 5px;}#searchbutton {margin: 4px 0px 0px 8px;}#subbox {float:left;margin: 8px 0px 0px 15px;}#subbutton {margin:5px 0px 0px 15px;}}}</style>
<?php if(get_option('othemes_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('othemes_favicon'); ?>" /><?php } else { ?><link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/fav.ico" /><?php } ?>
<!-- MOBİL STİL BİTİR-->

<!-- ARKAPLAN RENK SEÇİMİ-->
<style type="text/css">	body { background:#<?php echo get_option('othemes_arkaplan'); ?>}</style>											<?php wp_head(); ?>
</head>
<body>
<!-- Facebook JavaScript SDK -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '306675346196073', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
<!-- End Facebook JavaScript SDK -->
<!-- BODY KODU -->
<?php echo get_option('othemes_body_kodu'); ?>
<!-- MOBİL MENÜ -->
<script>
  	$(document).ready(function(){
		  $(function() {  
		    var pull      = $('#pull');  
		      menu        = $('#mobil');  
		      menuHeight  = menu.height();
		    $(pull).on('click', function(e) {  
		      e.preventDefault(); 
			  
		      menu.slideToggle();  
		    });  
		  });
		  $(window).resize(function(){  
		    var w = $(window).width();  
		    if(w > 480 && menu.is(':hidden')) {  
		      menu.removeAttr('style');  
		    }  
		  });
		  
		});
  </script>
<script>
	$(document).ready(function () {
    $('#secgoster').on('click', function () {
        if ($('div.secenek').is(':visible')) {
            $('div.secenek').fadeIn(500, function () {
                $('div.secenek').animate({
                    'width': 'hide'
                }, 500);
            });
        } else {
            $('div.secenek').animate({
                'width': 'show'
            }, 500, function () {
                $('div.secenek').fadeIn(500);
            });
        };
    });
});
</script>
  <div id="secgoster"><img src="<?php bloginfo('template_directory'); ?>/images/secenek.png" width="48" height="67" alt="Rengi değiştir" title="Tema Rengini Değiştir" /></div>
    <div class="secenek">
  <a class="gri" href="#" onclick="setActiveStyleSheet('default'); return false;"></a> 
  <a class="toprak" href="#" onclick="setActiveStyleSheet('toprak'); return false;"></a>
  </div>
  <!-- FİXED MENÜ KODU -->
 <?php if (get_option('othemes_ustmenu_statik') == 'On'): ?>	
 <?php include(TEMPLATEPATH. '/menufx.php'); ?>
 <?php endif; ?>
  <!-- MOBİL İÇİN MENÜ BAŞLANGIÇ-->
<div id="mobil" style="display:none;">
<a href="<?php echo get_option('home'); ?>" style="margin:0px auto;width:98%;display:block;"><?php if(get_option('othemes_logo')) { ?><img src="<?php echo get_option('othemes_logo'); ?>" alt="<?php bloginfo('name'); ?>" width="250" height="90" /><?php } else { ?><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="250" height="90"  /><?php } ?></a>
<div class="clear"></div></br>
<div class="arama2"><?php define(othemes_arama, "Filmin adını yaz ve ara."); ?>
<form id="searchform"  method="get" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="<?php echo othemes_arama; ?>" name="s" id="searchbox" onfocus="if (this.value == '<?php echo othemes_arama; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo othemes_arama; ?>';}" />
<input type="submit" id="searchbutton" value="" />
</form></div>
<div class="clear"></div>
<ul class="nav">
<?php if ( has_nav_menu( 'mobil-menu' ) ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'mobil-menu', 'depth' => 0 ) ); ?>
</ul><?php endif; ?>
<div class="clear"></div>
</div>
<a href="#" id="pull" >MENÜ &#9776 </a>
<div class="clear"></div>
<!-- MOBİL MENÜ BİTİŞ -->
<div class="ustnav"></div>
<div id="wrap">
<div id="topnavbar"><!-- TOPNAVBAR S -->
<div class="topnavbarleft"><!-- TOPNAVBARLEFT S -->
<ul id="nav2"><!-- NAV2 S -->
<?php if ( has_nav_menu( 'ust-nav' ) ) : ?><?php wp_nav_menu(array('theme_location' => 'ust-nav', 'depth' => 0, 'container' => false)); ?><?php endif; ?>
</ul><!-- NAV2 F -->
</div><!-- TOPNAVBARLEFT F -->
<script>
	$(document).ready(function () {
    $('#aramaozel').on('click', function () {
        if ($('div.arama').is(':visible')) {
            $('div.arama').fadeIn(500, function () {
                $('div.arama').animate({
                    'width': 'hide'
                }, 1000);
            });
        } else {
            $('div.arama').animate({
                'width': 'show'
            }, 1000, function () {
                $('div.arama').fadeIn(500);
            });
        };
    });
});
</script>
<div id="aramaozel"><!-- ARAMAOZEL S -->
<img src="<?php bloginfo('template_directory'); ?>/images/arama.png" alt="Aramak için tıkla" title="Aramak için tıkla" width="25" height="25" />
</div><!-- ARAMAOZEL F -->
<div class="arama" ><!-- ARAMA S -->
<?php define(othemes_arama, "Filmin adını yaz ve enterla."); ?>
<form id="searchform"  method="get" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="<?php echo othemes_arama; ?>" name="s" id="searchbox" onfocus="if (this.value == '<?php echo othemes_arama; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo othemes_arama; ?>';}" />
<input type="submit" id="searchbutton" value="" />
</form>
</div><!-- ARAMA F -->	
<?php if (get_option('othemes_giris_cikis') == 'On'): ?>		
<div id="abonelik"><!-- ABONELİK S -->
<?php if(is_user_logged_in()) { ?>
<a href="<?php bloginfo('url') ?>/profil/<?php the_author_meta(user_nicename,$user_ID); ?>" class="memo" >Profilim</a>
<a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" class="cikgit">Çıkış</a>
<?php } else { ?>
<?php $uyeolmak = get_option('othemes_uyeol_page_id2');
	$uyegirmek = get_option('othemes_uyegirisi_page_id2');
?>
<a href="<?php echo get_permalink($uyeolmak) ?>" class="memo">Üye Ol</a>
<a href="<?php echo get_permalink($uyegirmek) ?>" class="gir">Üye Girişi</a>
<?php } ?>
</div><!-- ABONELİK F -->
<?php endif; ?>
<?php if(get_option('othemes_sosyal') == 'On'): ?>
<div class="topnavbarright"><!-- TOPNAVBARRİGHT S -->
<ul>
<li><?php if(get_option('othemes_facebook_id')) { ?><a class="fb-icon" rel="nofollow" href="<?php echo get_option('othemes_facebook_id'); ?>" target="_blank"></a><?php } else { ?><a class="fb-icon" rel="nofollow" href="#"></a><?php } ?></li>
<li><?php if(get_option('othemes_twitter_id')) { ?><a class="tw-icon" rel="nofollow" href="<?php echo get_option('othemes_twitter_id'); ?>" target="_blank"></a><?php } else { ?><a class="tw-icon" rel="nofollow" href="#"></a><?php } ?></li>
<li><?php if(get_option('othemes_gplus_id')) { ?><a class="gp-icon" rel="nofollow" href="<?php echo get_option('othemes_gplus_id'); ?>" target="_blank"></a><?php } else { ?><a class="gp-icon" rel="nofollow" href="#"></a><?php } ?></li>
<li><a class="rss-icon" href="<?php bloginfo('rss2_url'); ?>" target="_blank"></a></li>
</ul>
</div><!-- TOPNAVBARRİGHT F -->
<?php endif; ?>
</div><!-- TOPNAVBAR F -->
<div id="header"><!-- HEADER S -->
<div class="headerleft"><!-- HEADERLEFT S -->
<a href="<?php echo get_option('home'); ?>"><?php if(get_option('othemes_logo')) { ?><img src="<?php echo get_option('othemes_logo'); ?>" alt="<?php bloginfo('name'); ?>" width="352" height="60" /><?php } else { ?><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="352" height="60"  /><?php } ?></a>
</div><!-- HEADERLEFT F -->
<?php if(get_option('othemes_headerreklam') == 'On'): ?>
<div class="headerright"><!-- HEADERRİGHT S -->
<?php echo get_option('othemes_headerreklamkodu'); ?>
</div><!-- HEADERRİGHT F -->
<?php endif; ?>
</div><!-- HEADER F -->
<nav class="nav3">
<ul id="nav3">
<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav', 'depth' => 2 ) ); ?>
 </ul><?php endif; ?>
</nav>
<div class="clear"></div>
<?php if (get_option('othemes_headerliste') == 'On'): ?>
<div class="alfaliste"><!-- ALFALİSTE S -->
<?php 
$terms = get_terms( 'basharfi' );
echo '<ul>';
foreach ( $terms as $term ) {
$term_link = get_term_link( $term );
if ( is_wp_error( $term_link ) ) {
continue;
}
echo '<li><a href="' . esc_url( $term_link ) . '" title="' . $term->name . ' harfiyle başlayan filmler">' . $term->name . '</a></li>';
echo  $term->description; 
}
echo '</ul>';
?>
</div><!-- ALFALİSTE F -->
<?php endif; ?>
<div class="clear"></div>
</div>
<div class="clear"></div>