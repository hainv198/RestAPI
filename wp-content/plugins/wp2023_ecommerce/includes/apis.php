<?php

add_action('rest_api_init','wp2023_apis');
function wp2023_apis() {

	//register path api & db_name

	$namespace  = 'wp2023/v1';
	$base       = 'orders';
	//http://yourdomain.com/wp-json/wp2023/v1/orders

	// register route

	register_rest_route($namespace,'/'.$base,[ //wp2023/v1/orders
		[
			'methods' => WP_REST_Server::READABLE, //GET
			'callback' => 'wp2023_apis_order_all'
		],
		[
			'methods' => WP_REST_Server::CREATABLE, //POST
			'callback' => 'wp2023_apis_order_store'
		],

	]);

	//http://yourdomain.com/wp-json/wp2023/v1/orders/5
	register_rest_route($namespace,'/'.$base.'/(?P<id>[\d]+)',[
		[
			'methods'             => WP_REST_Server::READABLE,//GET
			'callback'            => 'wp2023_apis_order_show'
		],
		[
			'methods'             => WP_REST_Server::EDITABLE,//PUT
			'callback'            => 'wp2023_apis_order_update'
		],
		[
			'methods'             => WP_REST_Server::DELETABLE,//DELETE
			'callback'            => 'wp2023_apis_order_destroy'
		]
	]);
}



// GET - /orders lấy toàn bộ orders

function wp2023_apis_order_all($request) {
	try {
//		echo 'wp2023_apis_order_all';
		$getAllData = new wp2023_order();
		$result = $getAllData->paginate();
		$data = [
			'success' => true,
			'data' => $result,
		];
		return new WP_REST_Response($data, 200);
	} catch (Exception $e) {
		return new WP_Error( 'error', $e->getMessage(), array( 'status' => 500 ) );
	}
/*	echo '<pre>';
	print_r($result);
	echo '</pre>';*/
}

function wp2023_apis_order_store($request) {

	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	die();*/
	try {
		$getAllData = new wp2023_order();
		$save = $getAllData->save($_POST);
		$data = [
			'success' => true,
			'data' => $save,
		];
		return new WP_REST_Response( $data, 201 );
	}catch (Exception $e) {
		return new WP_Error( 'error', $e->getMessage(), array( 'status' => 500 ) );
	}

}

//GET     - /orders/{id} - lấy chi tiết order theo tham số id
function wp2023_apis_order_show($request){

	$id = $request['id'];
	$getAllData = new wp2023_order();
	$item = $getAllData->find($id);
	$data = [
		'success' => true,
		'data' => $item,
	];
	return new WP_REST_Response( $data, 200 );
}

//PUT     - /orders/{id} - cập nhật order theo tham số id
function wp2023_apis_order_update($request){
	$id = $request['id'];
	$objWp2023Order = new wp2023_order();
	$saved = $objWp2023Order->update($id,$_POST);
	$data = [
		'success' => true,
		'data' => $saved,
	];
	return new WP_REST_Response( $data, 200 );
}
//DELETE  - /orders/{id} - xóa order theo tham số id
function wp2023_apis_order_destroy($request){
	$id = $request['id'];
	$objWp2023Order = new wp2023_order();
	$saved = $objWp2023Order->destroy($id);
	$data = [
		'success' => true
	];
	return new WP_REST_Response( $data, 200 );
}
