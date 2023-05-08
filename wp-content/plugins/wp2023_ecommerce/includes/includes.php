<?php
// Đăng kí post_type và taxonomy
include_once WP2023_PATH.'includes/post_types.php';

// Đăng kí metaboxes
include_once WP2023_PATH.'includes/metaboxes.php';

// Thêm các cột vào custorm post_type và custorm taxonomy

include_once WP2023_PATH.'includes/admin_columns.php';


// Tạo menu cho admin

include_once WP2023_PATH.'includes/admin_menus.php';

// Làm việc với CSDL trong wordpress
include_once WP2023_PATH.'includes/classes/wp2023_order.php';

// xử lý ajax in php
include_once WP2023_PATH.'includes/admin_ajax.php';

//Tạo trang setting cho admin
include_once WP2023_PATH.'includes/admin_settings.php';
