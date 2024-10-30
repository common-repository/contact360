<?php

class Contact360_Helper {

    public static function render_view($view)
    {
        $view_file = plugin_dir_path(__FILE__) . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
        if(!file_exists($view_file)){
            throw new Exception('View file not found.');
        }
        require $view_file;
    }

}