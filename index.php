<?php
/*
Plugin Name: Image link sharing
Plugin URI: http://outmani.xyz
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: outmani.xyz
Version: 1.0
Author URI: http://outmani.xyz
*/
require_once('back.php');
new ImageLinkSharing();
add_filter('wpseo_opengraph_image', 'change_og_image', 19);



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
    if (is_bot_of("whatsapp")) {
        $content = get_the_post_thumbnail_url($post, 'thumbnail') . '#whatsapp';
    }
    return $content;
}
