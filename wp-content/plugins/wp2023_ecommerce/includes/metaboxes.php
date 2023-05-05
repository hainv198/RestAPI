<?php

//product: màn hình chỉnh sửa / thêm mới sản phẩm
// đăng kí thẻ meta box cho sản phẩm 

add_action( 'add_meta_boxes', 'wp2023_meta_box_product' );

// Can thiệp vào hành động lưu bài viết 
add_action( 'save_post', 'wp2023_save_post_product' );

function wp2023_save_post_product( $post_id ) {
    // echo '<pre>';
    // print_r($_REQUEST);
    // die();

    if($_REQUEST['post_type'] == 'product') {
        // var_dump($post_id); die();
        $product_price = $_REQUEST['product_price'];
        $product_price_sale = $_REQUEST['product_price_sale'];
        $product_stock = $_REQUEST['product_stock'];
        // Lưu vào cơ sở dữ liệu: post_meta
        update_post_meta($post_id, 'product_price',$product_price);
        update_post_meta($post_id, 'product_price_sale',$product_price_sale);
        update_post_meta($post_id, 'product_stock',$product_stock);
    }
}


function wp2023_meta_box_product() {
    add_meta_box(
        'wp2023_product_info',     // Unique ID
        'Thông tin sản phẩm',      // Box title
        'wp2023_meta_box_product_html',  // Content callback, must be of type callable
        'product'                       // Post type
    );
}

function wp2023_meta_box_product_html() {
    include_once WP2023_PATH.'includes/templates/meta_box_product.php';
}


// Category screen
// Đăng kí thêm trường (add form) cho toxonomy
add_action( 'product_cat_add_form_fields', 'wp2023_meta_boxse_product_cat_add');

// đăng kí thêm form edit cho taxonomy
add_action( 'product_cat_edit_form_fields', 'wp2023_meta_boxse_product_cat_edit',10,2);


function wp2023_meta_boxse_product_cat_add() {
    include_once WP2023_PATH.'includes/templates/meta_box_product_cat_add.php';
}

function wp2023_meta_boxse_product_cat_edit($tag, $taxonomy) {
    include_once WP2023_PATH.'includes/templates/meta_box_product_cat_edit.php';
}

/* 
Xử lý khi lưu term

- do_active('create_<taxonomy_name>');
- do_active('edit_<taxonomy_name>');

*/

add_action( 'create_product_cat','wp2023_meta_box_product_cat_save',10, 1);
add_action( 'edit_product_cat','wp2023_meta_box_product_cat_save',10,1);

function wp2023_meta_box_product_cat_save($term_id) {
    // echo '<pre>';
    // print_r($_POST);
    // die();
    $image = $_POST['image'];
    update_term_meta($term_id, 'image', $image);
}

// function wp2023_meta_box_product_cat_edit() {
//     echo '<pre>';
//     print_r($_POST);
//     die();
// }