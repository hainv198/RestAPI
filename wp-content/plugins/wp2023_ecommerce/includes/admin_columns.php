<?php

// Hiển thị các cột post_type sản phẩm 
add_filter( 'manage_product_posts_columns', 'wp2023_admin_columns_product_filter_columns');

function wp2023_admin_columns_product_filter_columns($columns) {
    // echo '<pre>';
    // print_r($columns);
    // echo '</pre>';
    $columns['product_price'] = 'Giá bán';
    $columns['product_price_sale'] = 'Giá khuyến mại';
    $columns['product_stock'] = 'Số lượng';

    return $columns;
}

// hiển thị giá trị các cột ra 

add_action('manage_product_posts_custom_column', 'wp2023_admin_columns_product_render_columns',10 ,2);

function wp2023_admin_columns_product_render_columns($columns, $post_id) {
    // echo '<pre>';
    // print_r($columns);
    // echo '</pre>';
    switch($columns) {
        case 'product_price':
            $product_price =  get_post_meta( $post_id, 'product_price', true ); 
            echo number_format($product_price);
            break;
        case 'product_price_sale';
            $product_price_sale = get_post_meta( $post_id, 'product_price_sale', true ); 
            echo number_format($product_price_sale);
            break;
        case 'product_stock';
            $prodcut_stock = get_post_meta( $post_id, 'product_stock', true ); 
            echo number_format($prodcut_stock);
            break;
    }
}

// Hiển thị các cột trong danh mục sản phẩm taxonomy product_cat
// hook : manage_edit-<taxonomy>_columns
add_filter('manage_edit-product_cat_columns', 'wp2023_admin_columns_taxonomy_filter_columns');

function wp2023_admin_columns_taxonomy_filter_columns($columns) {
    // echo '<pre>';
    // print_r($columns);
    // echo '</pre>';
    $columns['image'] = 'Ảnh';
    return $columns;
}

// Hiển thị giá trị cột image 
// Hook : manage_<taxolomy>_custom_column
add_action( 'manage_product_cat_custom_column', 'wp2023_admin_columns_taxonomy_render_columns',10,3 );
function wp2023_admin_columns_taxonomy_render_columns($out, $columns, $term_id) {
    // echo '<pre>';
    // print_r($columns);
    // echo '</pre>';
    switch ( $columns ) {
        case 'image' :
            echo esc_html( get_term_meta( $term_id, 'image', true ) );
        break;
    }
}




