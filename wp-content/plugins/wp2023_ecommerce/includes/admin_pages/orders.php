<?php
    $getDataOrder = new wp2023_order();
    $result = $getDataOrder->paginate(2);
    /*echo '<pre>';
    print_r($result);
    echo '</pre>';*/

    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    if ($action == 'trash') {
        $order_id = $_REQUEST['post'];
        if (count($order_id)) {
            foreach ($order_id as $order_id) {
	            $getDataOrder->trash($order_id);
            }
        }
	    function wp2023_redirect($url){
		    echo("<script>location.href = '".$url."'</script>");
	    }

	    wp2023_redirect('admin.php?page=wordpress-2023-orders');
        exit();

    }

    extract($result)

?>
<div class="wrap">
    <h1 class="wp-heading-inline">Quản lý đơn hàng</h1>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="all"><a href="admin.php?page=wordpress-2023-orders" class="current">Tất cả <span class="count">(<?=$total_items?>)</span></a>
            |</li>
        <li class="publish"><a href="admin.php?page=wordpress-2023-orders&status=pending">Đơn hàng mới</a> |</li>
        <li class="publish"><a href="admin.php?page=wordpress-2023-orders&status=completed">Đơn hàng đã hoàn thành</a> |</li>
        <li class="publish"><a href="admin.php?page=wordpress-2023-orders&status=canceled">Đơn hàng đã hủy</a></li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="wordpress-2023-orders">
        <input type="hidden" name="paged" value="1">
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Tìm các bài viết:</label>
            <input type="search" id="post-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value="Tìm các bài viết">
        </p>
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1">Hành động</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">

                <label class="screen-reader-text" for="cat">Lọc theo danh mục</label>
                <select name="status" id="cat" class="postform">
                    <option value="0">Tất cả trạng thái</option>
                    <option class="level-0" value="pending">Đơn hàng mới</option>
                    <option class="level-0" value="completed">Đơn đã hoàn thành</option>
                    <option class="level-0" value="canceled">Đơn đã hủy</option>
                </select>
                <input type="submit" id="post-query-submit" class="button" value="Lọc">
            </div>

	        <?php
	        include_once WP2023_PATH.'includes/templates/element/elm_paginate.php';
	        ?>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text">Danh sách bài viết</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
            <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text"
                                                                                for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                <th class="manage-column column-primary">Mã đơn hàng</th>
                <th class="manage-column">Tổng tiền</th>
                <th class="manage-column">Khách hàng</th>
                <th class="manage-column">Điện thoại</th>
                <th class="manage-column">Trạng thái</th>
                <th class="manage-column">Thời gian</th>
            </tr>
            </thead>
            <tbody id="the-list">
            <?php foreach ($items as $item): ?>
            <tr id="post-<?= $item->id ?>" class="iedit author-self level-0 post-<?= $item->id ?> status-publish hentry">
                <th scope="row" class="check-column">
                    <input id="cb-select-<?= $item->id ?>" type="checkbox" name="post[]" value="3">
                </th>
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Tiêu đề">
                    <strong>
                        <a class="row-title" href=""># <?= $item->id ?></a>
                    </strong>
                </td>
                <td><?= number_format($item->total)?></td>
                <td><?= $item->customer_name?></td>
                <td><?=$item->customer_phone?></td>
                <td>
                    <select name="" id="" class="order_status" data-id="<?=$item->id?>">
                        <option <?= $item->status == 'pending' ?  'selected' :  '' ?> value="pending">Đơn hàng mới</option>
                        <option  <?= $item->status == 'completed' ?  'selected' :  '' ?> value="completed">Đơn đã hoàn thành</option>
                        <option  <?= $item->status == 'canceled' ?  'selected' :  '' ?> value="canceled">Đơn đã hủy</option>
                    </select>
                </td>
                <td class="date column-date"><?=date('d-m-Y',strtotime($item->created))?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td id="cb" class="manage-column column-cb check-column">
                    <label class="screen-reader-text" for="cb-select-all-1">
                        Chọn toàn bộ
                    </label>
                    <input id="cb-select-all-1" type="checkbox">
                </td>
                <th class="manage-column column-primary">Mã đơn hàng</th>
                <th class="manage-column">Tổng tiền</th>
                <th class="manage-column">Khách hàng</th>
                <th class="manage-column">Điện thoại</th>
                <th class="manage-column">Trạng thái</th>
                <th class="manage-column">Thời gian</th>
            </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions"></div>
            <?php
                include WP2023_PATH.'includes/templates/element/elm_paginate.php';
            ?>
            <br class="clear">
        </div>
    </form>
</div>

<script>
    //đường dẫn sử lí ajax

    let ajax_url = '<?= admin_url('admin-ajax.php'); ?>';

    jQuery(document).ready(function() {
        console.log('ss');
        jQuery('.order_status').change(function () {

            let order_id = jQuery(this).data('id');//data-id lấy ra id
            let status = jQuery(this).val();

            jQuery.ajax({
                url:ajax_url,
                method:'POST',
                dataType:'json',
                data: {
                    action:'wp2023_order_change_status',
                    order_id:order_id,
                    status:status
                },
                success: function(res) {
                    alert("cập nhật thành công")
                },
                error: function (err) {
                    console.log(err)
                }
            })
        })

    })

</script>