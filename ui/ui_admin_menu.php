<div class="ils-container ils">
    <h3>Image link sharing</h3>
    <form action="" method="POST">
        <div class="ils-group">
            <table class="ils-table " id="ils-platforms">
                <?php include('platform-item.php') ?>
            </table>
            <button type="button" class="ils-add-platform"><?php _e('Add another', 'ils') ?></button>
        </div>
        <?php wp_nonce_field(-1,'nonce_ils_save') ?>
        <input type="hidden" name="action" value="ils_save_data">
        <input type="submit" value="<?php _e('send','ils')?>">
    </form>

</div>