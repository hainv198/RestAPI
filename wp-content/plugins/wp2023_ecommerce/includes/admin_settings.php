<?php
// Đăng kí cấu hình
/*
    $option_group: wp2023_settings_page
    $option_name: wp2023_settings_options
*/
//Đăng ký cấu hình
/*
    $option_group: wp2023_settings_page
    $option_name: wp2023_settings_options
    wp2023_settings_section_shop_info: Thông tin cửa hàng
        wp2023_settings_field_name: Tên cửa hàng
        wp2023_settings_field_phone: Số điện thoại
        wp2023_settings_field_email: Địa chỉ email



    wp2023_settings_section_payment: Thông tin cửa hàng
        wp2023_settings_field_bank_name: Tên ngân hàng
        wp2023_settings_field_bank_number: Số tài khoản
        wp2023_settings_field_bank_user: Chủ tài khoản
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

	add_settings_section(
		'wp2023_settings_section_payment',
		'Thông tin thanh toán',
		'wp2023_settings_section_payment_callback',
		'wp2023_settings_page'

	);

	//b3 đăng kí các trường thông tin cửa hàng
	add_settings_field(
		'wp2023_settings_field_name',
		'Tên cửa hàng', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_shop_info', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_name', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'text',
		) // truyền array thì hàm callback sẽ nhận được
	);
	add_settings_field(
		'wp2023_settings_field_phone',
		'Số điện thoại', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_shop_info', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_phone', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'number',
		) // truyền array thì hàm callback sẽ nhận được
	);

	add_settings_field(
		'wp2023_settings_field_email',
		'Địa chỉ email', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_shop_info', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_email', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'email',
		) // truyền array thì hàm callback sẽ nhận được
	);

	// add field vào section payment
	add_settings_field(
		'wp2023_settings_field_bank_name',
		'Tên ngân hàng', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_payment', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_bank_name', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'text',
		) // truyền array thì hàm callback sẽ nhận được
	);

	add_settings_field(
		'wp2023_settings_field_bank_number',
		'Số tài khoản', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_payment', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_bank_number', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'text',
		) // truyền array thì hàm callback sẽ nhận được
	);

	add_settings_field(
		'wp2023_settings_field_bank_user',
		'Chủ tài khoản', // tiêu đề
		'wp2023_settings_field_render', // hàm render ô input
		'wp2023_settings_page', // page mình đăng kí
		'wp2023_settings_section_payment', //section mình add
		array(
			'label_for'         => 'wp2023_settings_field_bank_user', //đặt theo name id
			'class'             => 'form-control',
			'type'              => 'text',
		) // truyền array thì hàm callback sẽ nhận được
	);


}
function wp2023_settings_section_shop_info_callback() {
	echo '<p>Store Information</p>';
}

function wp2023_settings_section_payment_callback() {
	echo '<p>Payment information</p>';
}

function wp2023_settings_field_render($args) {
	$type = isset($args['ty[e']) ? $args['type'] : 'text';
    $options = get_option('wp2023_settings_options');
//    print_r($options);
	switch ($type) {
		case 'text':
			?>
				<input type="text"
                       name="wp2023_settings_options[<?= $args['label_for'];?>]"
                       value="<?= $options[$args['label_for']]; ?>" >
			<?php
		break;
		case 'number':
			?>
			<input type="number"
                   name="wp2023_settings_options[<?= $args['label_for'];?>]"
                   value="<?= $options[$args['label_for']]; ?>"
            >
			<?php
		break;
		case 'email':
			?>
			<input type="email"
                   name="wp2023_settings_options[<?= $args['label_for'];?>]"
                   value="<?= $options[$args['label_for']]; ?>"
            >
			<?php
			break;
	}
}