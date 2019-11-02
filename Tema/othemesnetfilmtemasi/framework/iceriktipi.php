<?php



// taksonomi ekleme

add_action( 'init', 'create_post_taxonomies', 0 );



// toplu kod baslangici

function create_post_taxonomies() {

	

	

	//otel turleri



	$labels = array(

		'name'              => _x( 'Yönetmen', 'taxonomy general name' ),

		'singular_name'     => _x( 'Yönetmen', 'taxonomy singular name' ),

		'search_items'      => __( 'Yönetmenlerde Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'Yönetmenler' ),

		'parent_item_colon' => __( 'Yönetmen:' ),

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni Yönetmen Ekle' ),

		'new_item_name'     => __( 'Yeni Yönetmen' ),

		'menu_name'         => __( 'Yönetmenler' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,

		'show_ui'           => true,
		'show_in_rest' => true,

		'show_admin_column' => true,

		'query_var'         => false,

		'rewrite'           => array( 'slug' => 'yonetmen' ),

	);



	register_taxonomy( 'yonetmen', array( 'post' ), $args );

	
//baş harfi



	$labels = array(

		'name'              => _x( 'Baş Harfine Göre: ', 'taxonomy general name' ),

		'singular_name'     => _x( 'Baş Harfine Göre:', 'taxonomy singular name' ),

		'search_items'      => __( 'Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'Baş Harfine Göre:' ),

		'parent_item_colon' => __( 'Baş Harfine Göre:' ),

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni Ekle' ),

		'new_item_name'     => __( 'Yeni ' ),

		'menu_name'         => __( 'Baş Harfine Göre:' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,

		'show_ui'           => true,
		'show_in_rest' => true,

		'show_admin_column' => true,

		'query_var'         => false,
'has_archive' => true,
		'rewrite'           => array( 'slug' => 'alfabetikliste' ),

	);



	register_taxonomy( 'basharfi', array( 'post' ), $args );
	
	
	//odaözellikleri



	$labels = array(

		'name'              => _x( 'Oyuncu', 'taxonomy general name' ),

		'singular_name'     => _x( 'Oyuncu', 'taxonomy singular name' ),

		'search_items'      => __( 'Oyuncularda Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'Oyuncular' ),

		'parent_item_colon' => __( 'Oyuncular:' ),

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni Oyuncu Ekle' ),

		'new_item_name'     => __( 'Yeni Oyuncu' ),

		'menu_name'         => __( 'Oyuncular' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,
		'show_in_rest' => true,

		'show_ui'           => true,

		'show_admin_column' => true,

		'query_var'         => false,

		'rewrite'           => array( 'slug' => 'oyuncular' ),

	);



	register_taxonomy( 'oyuncular', array( 'post' ), $args );
//sehir



	$labels = array(

		'name'              => _x( 'Yapım', 'taxonomy general name' ),

		'singular_name'     => _x( 'Yapım', 'taxonomy singular name' ),

		'search_items'      => __( 'Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'Yapım' ),

		'parent_item_colon' => __( 'Yapım:' ),
		

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni Ekle' ),

		'new_item_name'     => __( 'Yeni Yapım' ),

		'menu_name'         => __( 'Yapım' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,

		'show_ui'           => true,
		'show_in_rest' => true,

		'show_admin_column' => true,

		'query_var'         => false,

		'rewrite'           => array( 'slug' => 'yapim' ),

	);



	register_taxonomy( 'yapim', array( 'post' ), $args );

	//odaözellikleri



	$labels = array(

		'name'              => _x( 'Yapım Yılı', 'taxonomy general name' ),

		'singular_name'     => _x( 'Yapım Yılı', 'taxonomy singular name' ),

		'search_items'      => __( 'Yapım Yıllarında Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'Yapım Yılı' ),

		'parent_item_colon' => __( 'Yapım Yılı:' ),

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni Yapım Yılı Ekle' ),

		'new_item_name'     => __( 'Yeni Yapım Yılı' ),

		'menu_name'         => __( 'Yapım Yılı' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,

		'show_ui'           => true,

		'show_admin_column' => true,
		'show_in_rest' => true,

		'query_var'         => false,

		'rewrite'           => array( 'slug' => 'yapimyili' ),

	);



	register_taxonomy( 'yapimyili', array( 'post' ), $args );

	
	//odaözellikleri



	$labels = array(

		'name'              => _x( 'IMDB Puanı', 'taxonomy general name' ),

		'singular_name'     => _x( 'IMDB Puanı', 'taxonomy singular name' ),

		'search_items'      => __( 'IMDB Puanlarında Ara' ),

		'all_items'         => __( 'Tümüne Bak' ),

		'parent_item'       => __( 'IMDB Puanı' ),

		'parent_item_colon' => __( 'IMDB Puanı:' ),

		'edit_item'         => __( 'Düzenle' ),

		'update_item'       => __( 'Güncelle' ),

		'add_new_item'      => __( 'Yeni IMDB Puanı Ekle' ),

		'new_item_name'     => __( 'Yeni IMDB Puanı' ),

		'menu_name'         => __( 'IMDB Puanı' ),

	);



	$args = array(

		'hierarchical'      => true,

		'labels'            => $labels,

		'show_ui'           => true,

		'show_admin_column' => true,
		'show_in_rest' => true,

		'query_var'         => false,

		'rewrite'           => array( 'slug' => 'imdbpuani' ),

	);



	register_taxonomy( 'imdbpuani', array( 'post' ), $args );
	
	

	

}





function add_custom_types_to_tax( $query ) {

if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {



// Get all your post types

$post_types = get_post_types();



$query->set( 'post_type', $post_types );

return $query;

}

}

add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

?>