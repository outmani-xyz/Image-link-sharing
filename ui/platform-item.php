<?php
$name_platform = "platforms[$index][platform_name]";
$name_size = "platforms[$index][platform_size]";
?>
<tr>
    <td>
        <label for=""><?php _e('platform/user agent', 'ils') ?> :
            <input name="<?php echo $name_platform ?>" value="<?php echo !empty($platform['platform_name']) ? $platform['platform_name'] : '' ?>" id="">
        </label>
    </td>
    <td>
        <label for=""><?php _e('Image size', 'ils') ?> :
            <select name="<?php echo $name_size ?>" id="">
                <?php foreach ($this->get_image_sizes() as $key => $value) :  ?>
                    <option <?php echo (!empty($platform['platform_size']) && $platform['platform_size'] == $key) ? 'selected' : '' ?> value="<?php echo $key ?>"><?php echo $value['width'] . 'X' . $value['height'] ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </td>
    <td>
        <?php if (!empty($enable_delete)) : ?>
            <button class="ils-delete-platform" type="button"><?php _e('delete', 'ils') ?></button>
        <?php endif; ?>
    </td>
</tr>