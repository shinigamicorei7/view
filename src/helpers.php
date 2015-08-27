<?php

if (!function_exists('view')) {
    /**
     * @param string $view_path
     * @param array $data
     * @return string
     */
    function view($view_path, $data = array())
    {
        return View::render($view_path, $data);
    }
}
