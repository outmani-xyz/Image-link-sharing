<?php
class ImageLinkSharing
{
    private $option = 'ils_platforms';
    function __construct()
    {
        add_action('admin_menu', [$this, 'ils_add_admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'add_js_css_admin']);
        add_action('wp_ajax_ils_add_platform', [$this, 'add_platform']);
        add_action('init', [$this, 'save_data']);
    }
    function ils_add_admin_menu()
    {
        add_menu_page('Image sharing link', 'Image sharing link', 'manage_options', 'ils_setting', [$this, 'ui_admin_menu']);
    }

    function ui_admin_menu()
    {
        $platforms = get_option($this->option);
        include('ui/ui_admin_menu.php');
    }

    function add_js_css_admin()
    {
        wp_enqueue_script('ils_main', plugin_dir_url(__FILE__) . '/assets/js/main.js', ['jquery'], false, true);
        wp_enqueue_style('ils_main', plugin_dir_url(__FILE__) . '/assets/css/style.css');
        wp_localize_script('jquery', 'ils_ajax', ['url' => admin_url('/admin-ajax.php')]);
    }

    function get_image_sizes()
    {
        global $_wp_additional_image_sizes;

        $default_image_sizes = get_intermediate_image_sizes();

        foreach ($default_image_sizes as $size) {
            $image_sizes[$size]['width'] = intval(get_option("{$size}_size_w"));
            $image_sizes[$size]['height'] = intval(get_option("{$size}_size_h"));
            $image_sizes[$size]['crop'] = get_option("{$size}_crop") ? get_option("{$size}_crop") : false;
        }

        if (isset($_wp_additional_image_sizes) && count($_wp_additional_image_sizes)) {
            $image_sizes = array_merge($image_sizes, $_wp_additional_image_sizes);
        }

        return $image_sizes;
    }

    function add_platform()
    {
        if (!empty($_POST['action']) && $_POST['action'] == 'ils_add_platform') {
            $index = !empty($_POST['count']) ? $_POST['count'] : 1;
            $enable_delete = true;
            ob_start();
            include('ui/platform-item.php');
            $ui = ob_get_clean();
            echo json_encode(['success' => true, 'data' => $ui]);
            exit;
        }
    }
    function save_data()
    {
        if (empty($_POST['action']) || $_POST['action'] != 'ils_save_data') {
            return;
        }
        if (empty($_POST['nonce_ils_save']) || !wp_verify_nonce($_POST['nonce_ils_save'])) {
            return;
        }
        $platforms = !empty($_POST['platforms']) ? $_POST['platforms']  : '';
        if (!empty($platforms)) {
            $option = get_option($this->option);
            $status = false;
            if (!empty($option)) {
                $status = update_option($this->option, $platforms);
            } else {
                $status = add_option($this->option, $platforms);
            }
        }
        wp_safe_redirect(admin_url('/admin.php?page=ils_setting'),302);exit;
    }
}
