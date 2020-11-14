<?php
class ImageLinkSharingFront
{

    private $option = 'ils_platforms';
    function __construct()
    {
        add_filter('wpseo_opengraph_image', [$this, 'change_og_image'], 99);
    }

    function is_bot_of($crawler = '')
    {
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), trim($crawler)) !== false) {
            return true;
        }
        return false;
    }
    function change_og_image($content)
    {
        global $post;


        $platforms = get_option($this->option);
        foreach ($platforms as $index => $platform) {
            $size = '';
            if (!empty($platform['platform_name']) && !empty($platform['platform_size']) && $this->is_bot_of($platform['platform_name'])) {
                $size = $platform['platform_size'];
                $content = get_the_post_thumbnail_url($post, $size).'#'.$platform['platform_name'];
                if (!$content) {
                    $content = get_the_post_thumbnail_url($post, 'thumbnail');
                }
            }
        }
        return $content;
    }
}
