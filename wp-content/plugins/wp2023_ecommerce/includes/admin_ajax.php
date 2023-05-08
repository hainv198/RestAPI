<?php
// Khi đã đăng nhập
add_action( 'wp_ajax_wp2023_order_change_status', 'wp2023_order_change_status' );

// Khi chưa đăng nhập
add_action( 'wp_ajax_nopri_wp2023_order_change_status', 'wp2023_order_change_status' );


function wp2023_order_change_status() {
	/*echo'<pre>';
	print_r($_REQUEST);
	echo '</pre>';*/
	$data_wp2023_order = new wp2023_order();

	$order_id = $_REQUEST['order_id'];
	$status = $_REQUEST['status'];

	$data_wp2023_order->change_status($order_id,$status);
	$res = [
		'success'=>true
	];
	echo json_encode($res);
	die();
}