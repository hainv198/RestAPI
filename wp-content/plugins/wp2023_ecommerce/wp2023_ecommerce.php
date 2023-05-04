<?php
/*
 * Plugin Name:       Wordpress 2023 - Ecommerce
 * Plugin URI:        #
 * Description:       Plugin phục vụ khóa học wordpress 2023
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hainv Dev
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       wp2023_ecommerce
 * Domain Path:       /languages
 */

 // B1: định nghĩa các hàng số của plugin
 define('WP2023_PATH', plugin_dir_path( __FILE__ ));
 define('WP2023_URI', plugin_dir_url( __FILE__ ));

 // Định nghĩa các hành động khi plugin được kích hoạt
 register_activation_hook( __FILE__, 'wp_2023_ecommerce_activation' );

 function wp_2023_ecommerce_activation () {
    // Tạo CSDL

    // Tạo dữ liệu mẫu 

    // Tạo option

 }

// Định nghĩa hành động khi plugin tắt đi 
register_deactivation_hook(__FILE__,'wp_2023_ecommerce_deactivation');
function wp_2023_ecommerce_deactivation() {
// Xóa CSDL


// Xóa option
}

include_once WP2023_PATH.'includes/includes.php';


 ?>