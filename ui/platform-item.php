<?php
global $_wp_additional_image_sizes;
$platforms = [
    'facebook' => 'facebook',
    'twitter' => 'twitter',
    'instagram' => 'instagram',
    'whatsapp' => 'whatsapp',
];
$index = !empty($index) ? $index : 0;
$name_platform = "platforms[$index][platform_size]";
$name_size = "platforms[$index][platform_size]";
?>
<tr>
    <td>
        <label for=""><?php _e('platform', 'ils') ?> :
            <select name="<?php echo $name_platform ?>" id="">
                <?php foreach ($platforms as $key => $value) :  ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </td>
    <td>
        <label for=""><?php _e('Image size', 'ils') ?> :
            <select name="<?php echo $name_size ?>" id="">
                <?php foreach ($this->get_image_sizes() as $key => $value) :  ?>
                    <option value="<?php echo $key ?>"><?php echo $value['width'] . 'X' . $value['height'] ?></option>
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