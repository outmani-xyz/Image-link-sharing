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
require_once('front.php');

if (is_admin()) {
    new ImageLinkSharingBack();
}
new ImageLinkSharingFront();
