<?php
// Đăng kí cấu hình
/*
    $option_group: wp2023_settings_page
    $option_name: wp2023_settings_options
*/

add_action( 'admin_init', 'wp2023_setting_init' );

function wp2023_setting_init() {
	/*
		register_setting( 'wporg', 'wporg_options' );
        add_settings_section( string $id, string $title, callable $callback, string $page, array $args = array() )
        add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
	*/
	//b1
	register_setting('wp2023_settings_page', 'wp2023_settings_options');

	//b2
	add_settings_section(
		'wp2023_settings_section_shop_info', //id
		'Thông tin cửa hàng', //tiêu đề của section
		'wp2023_settings_section_shop_info_callback', //hàm callback hiển thị html
		'wp2023_settings_page' //page mà mình đã đăng kí ở b1
	);

	//b3 đăng kí các trường thông tin cửa hàng
	add_settings_field(
		'wp2023_settings_field_email',
		'Tên cửa hàng', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_shop_info', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_email', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'text',
		) // truyền array thì hàm callback sẽ nhận được
	);

}
function wp2023_settings_section_shop_info_callback() {
	echo '<p>Store Information</p>';
}

function wp2023_settings_field_render($args) {

}