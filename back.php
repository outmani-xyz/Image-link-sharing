<?php
class ImageLinkSharing{

    function isl_add_admin_menu(){
        add_menu_page('Image sharing link','Image sharing link','edit_option','isl_sizes','ui_admin_menu');
    }

    function ui_admin_menu(){
        
    }
}