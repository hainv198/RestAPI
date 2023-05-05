<?php

add_action( 'admin_menu','wp2023_admin_menu' );

function wp2023_admin_menu() {
    // thêm menu cha
    add_menu_page( 
        'Wordpress 2023', // page_title
        'Wordpress 2023', // menu_title
        'manage_options',  // capability (quyền)
        'wp2023',
        'wp2023_admin_page_dasboard', // function render html
        'dashicons-admin-page', // icon
        25//vị trí của menu
    );

    add_submenu_page(
        'wp2023', //$parent_slug:string
        'Đơn hàng', //$page_title:string
        'Đơn hàng',//$menu_title:string
        'manage_options',//$capability:string,
        'wordpress-2023-orders',//$menu_slug:string,
        'wp2023_admin_page_orders',
        26
    );
    add_submenu_page(
        'wp2023', //$parent_slug:string
        'Cấu hình', //$page_title:string
        'Cấu hình',//$menu_title:string
        'manage_options',//$capability:string,
        'wordpress-2023-setting',//$menu_slug:string,
        'wp2023_admin_page_setting',
        26
    );
}

function wp2023_admin_page_dasboard() {
    include_once WP2023_PATH.'includes/admin_pages/dashboard.php';
}

function wp2023_admin_page_orders() {
    include_once WP2023_PATH.'includes/admin_pages/orders.php';
}

function wp2023_admin_page_setting() {
    include_once WP2023_PATH.'includes/admin_pages/setting.php';
}

?>