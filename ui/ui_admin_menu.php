<div class="ils-container">
    <h3>Image link sharing</h3>
    <form action="">
        <div class="ils-group">
            <table class="ils-table " id="ils-platforms">
                <?php include('platform-item.php') ?>
            </table>
            <button type="button" class="ils-add-platform"><?php _e('Add another', 'ils') ?></button>
        </div>
        <input type="submit" value="<?php _e('send','ils')?>">
    </form>

</div>