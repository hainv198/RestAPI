<?php
    // echo '<pre>';
    // print_r($tag);
    // print_r($taxonomy);
    // echo '</pre>';
    $image = get_term_meta( $tag->term_id, 'image', true );
?>

<tr class="form-field">
    <th scope='row'>
	    <label for="image">Hình ảnh</label>
    </th>
    <td>
        <input name="image" id="image" type="text" value="<?= $image?>" size="40" >
    </td>
    </p>
</tr>