<?php
/*
Plugin Name: Image link sharing
Plugin URI: http://outmani.xyz
Description:  Image link sharing : is simple plugin help you to generate diffrent image size for og:image for multiple platforme or bots
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
