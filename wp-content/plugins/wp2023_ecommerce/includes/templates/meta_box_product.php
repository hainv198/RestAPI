<?php
    global $post;
    // echo '<pre>';
    // print_r($post);
    // die();
    $product_price = get_post_meta($post->ID, 'product_price', true );
    $product_price_sale = get_post_meta($post->ID, 'product_price_sale', true );
    $product_stock = get_post_meta($post->ID, 'product_stock', true );
?>

<table class='form-table'>
    <tr>
        <th scope='row'> 
            <label for="blogname">Giá sản phẩm</label>
        </th>
        <td>
            <input type="text" name='product_price' class='regular-text' value='<?= $product_price;?>'/>
        </td>
    </tr>
    <tr>
        <th scope='row'> 
            <label for="blogname">Giá khuyến mại</label>
        </th>
        <td>
            <input type="text" name='product_price_sale' class='regular-text' value="<?= $product_price_sale;?>"/>
        </td>
    </tr>
    <tr>
        <th scope='row'> 
            <label for="blogname">Số lượng</label>
        </th>
        <td>
            <input type="text" name='product_stock' class='regular-text' value="<?= $product_stock;?>"/>
        </td>
    </tr>
</table>