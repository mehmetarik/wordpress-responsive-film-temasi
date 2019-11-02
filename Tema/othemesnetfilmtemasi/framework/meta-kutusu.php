<?php
add_action( 'admin_menu', 'tj_create_meta_box' );
add_action( 'save_post', 'tj_save_meta_data' );
function tj_create_meta_box() {
	add_meta_box( 'post-meta-boxes', __('Othemes FT Film Bilgileri Paneli', 'othemes'), 'post_meta_boxes', 'filmler',  'normal', 'high' );
	add_meta_box( 'page-meta-boxes', __('Othemes FT SEO Paneli', 'othemes'), 'page_meta_boxes', 'post', 'normal', 'high' );
}
function tj_post_meta_boxes() {
	$othemes_seotitle = get_option('othemes_seo_single_field_title');
	$othemes_seodescription = get_option('othemes_seo_single_field_description');
	$othemes_keywords = get_option('othemes_seo_single_field_keywords');
	if(get_option('othemes_seo_field') == 'On') {
	$meta_boxes = array(
		
		

		'partsistemi' => array( 'name' => 'partsistemi', 'title' => __('Part Sistemi:', 'othemes'), 'type' => 'select', 'options' => array('Otomatik', 'Manuel') ),
		'afisbilgi' => array( 'name' => 'afisbilgi', 'title' => __('Afiş:', 'othemes'), 'type' => 'select', 'options' => array('Girilmedi', 'Turkce Dublaj', 'Turkce Altyazi', 'Yerli Dizi', 'Yabanci Dizi', '3D Film', 'Yerli Yapim', 'Yetiskin') ),	
		'partbilgi' => array( 'name' => 'partbilgi', 'title' => __('Kalite:', 'othemes'), 'type' => 'select', 'options' => array('Yüksek Kalite', 'HD Kalite', 'Kota Dostu') ),	
		'seobaslik' => array( 'name' => 'seobaslik', 'title' => __('SEO AYARLARI', 'othemes'), 'type' => 'othemesselect'),
		$othemes_seotitle => array( 'name' => $othemes_seotitle, 'title' => __('Başlık:', 'othemes'), 'type' => 'text', 'desc' => 'Google da gözükmesini istediğiniz başlığı buraya giriniz.'),
		$othemes_seodescription => array( 'name' => $othemes_seodescription, 'title' => __('Açıklama:', 'othemes'), 'type' => 'textarea', 'desc' => 'Google için 160 Karakteri geçmeyecek bir açıklama girebilirsiniz.'),
		$othemes_keywords => array( 'name' => $othemes_keywords, 'title' => __('Anahtar Kelimeler:', 'othemes'), 'type' => 'text', 'desc' => 'Anahtar kelimeleri virgül (,) ile ayırmayı unutmayınız.'),
	);
	} else {
	$meta_boxes = array(
	
		

		'partsistemi' => array( 'name' => 'partsistemi', 'title' => __('Part Sistemi:', 'othemes'), 'type' => 'select', 'options' => array('Otomatik', 'Manuel') ),
		
		'afisbilgi' => array( 'name' => 'afisbilgi', 'title' => __('Afiş:', 'othemes'), 'type' => 'select', 'options' => array('Girilmedi', 'Turkce Dublaj', 'Turkce Altyazi', 'Yerli Dizi', 'Yabanci Dizi', '3D Film', 'Yerli Yapim', 'Yetiskin') ),	
		'partbilgi' => array( 'name' => 'partbilgi', 'title' => __('Kalite:', 'othemes'), 'type' => 'select', 'options' => array('Yüksek Kalite', 'HD Kalite', 'Kota Dostu') ),	
	);
	}
	return apply_filters( 'tj_post_meta_boxes', $meta_boxes );
}
function tj_page_meta_boxes() {
	$othemes_seotitle = get_option('othemes_seo_single_field_title');
	$othemes_seodescription = get_option('othemes_seo_single_field_description');
	$othemes_keywords = get_option('othemes_seo_single_field_keywords');
	if(get_option('othemes_seo_field') == 'On') {
	$meta_boxes = array(
		$othemes_seotitle => array( 'name' => $othemes_seotitle, 'title' => __('Başlık:', 'othemes'), 'type' => 'text', 'desc' => 'Google da gözükmesini istediğiniz başlığı buraya giriniz.'),
		$othemes_seodescription => array( 'name' => $othemes_seodescription, 'title' => __('Açıklama:', 'othemes'), 'type' => 'textarea', 'desc' => 'Google için 160 Karakteri geçmeyecek bir açıklama girebilirsiniz.'),
		$othemes_keywords => array( 'name' => $othemes_keywords, 'title' => __('Anahtar Kelimeler:', 'othemes'), 'type' => 'text', 'desc' => 'Anahtar kelimeleri virgül (,) ile ayırmayı unutmayınız.'),
	);
	} else {
	$meta_boxes = array(
		'partsistemi' => array( 'name' => 'partsistemi', 'title' => __('Part Sistemi:', 'othemes'), 'type' => 'select', 'options' => array('Otomatik', 'Manuel') ),
		
		'afisbilgi' => array( 'name' => 'afisbilgi', 'title' => __('Afiş:', 'othemes'), 'type' => 'select', 'options' => array('Girilmedi', 'Turkce Dublaj', 'Turkce Altyazi', 'Yerli Dizi', 'Yabanci Dizi', '3D Film', 'Yerli Yapim', 'Yetiskin') ),	
		'partbilgi' => array( 'name' => 'partbilgi', 'title' => __('Kalite:', 'othemes'), 'type' => 'select', 'options' => array('Yüksek Kalite', 'HD Kalite', 'Kota Dostu') ),	
	);
	}
	return apply_filters( 'tj_page_meta_boxes', $meta_boxes );
}
function post_meta_boxes() {
	global $post;
	$meta_boxes = tj_post_meta_boxes(); 
?>
	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
        elseif ( $meta['type'] == 'othemesselect' )
			get_meta_othemesselect( $meta, $value );
        elseif ( $meta['type'] == 'selectadmin' )
			get_meta_selectadmin( $meta, $value );
        elseif ( $meta['type'] == 'checkbox' )
			get_meta_checkbox( $meta, $value );
        elseif ( $meta['type'] == 'selectdate' )
			get_meta_selectgrup( $meta, $value );

	endforeach; ?>
	</table>
<?php
}
function page_meta_boxes() {
	global $post;
	$meta_boxes = tj_page_meta_boxes(); ?>
	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :
		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );
		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
	endforeach; ?>
	</table>
<?php
}
function get_meta_text_input( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;margin-top:-3px;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<br />
			<p class="description"><?php echo $desc; ?></p>
		</td>
	</tr>
	<?php
}
function get_meta_select( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select style="width:372px;" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	
	
		
	
	
	
	
	<?php
}
function get_meta_textarea( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;margin-top:-3px;"><?php echo wp_specialchars( $value, 1 ); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<p class="description"><?php echo $desc; ?></p>
		</td>
	</tr>
	

	
	
	
	
	
	
	<?php
}
function get_meta_othemesselect( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>" style="font-weight:bold;"><?php echo $title; ?></label>
		</th>
		<td>
			<span class="description">----------------------------------------------------------------------------------------------</span>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}
function tj_save_meta_data( $post_id ) {
	global $post;
	if ( 'page' == $_POST['post_type'] )
		$meta_boxes = array_merge( tj_page_meta_boxes() );
	else
		$meta_boxes = array_merge( tj_post_meta_boxes() );
	foreach ( $meta_boxes as $meta_box ) :
		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;
		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
		$data = stripslashes( $_POST[$meta_box['name']] );
		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );
		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );
		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );
	endforeach;
}
?>