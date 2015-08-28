<?php
/**
 * Ejemplo de configuración.
 * PHP version 5
 *
 * @category PHP
 * @package  Tests
 * @author   Bryan Velastegui <bryan_slvr@hotmail.com>
 * @license  http://github.com/shinigamicorei7/view/LICENCE MIT licence
 * @link     http://github.com/shinigamicorei7/view
 */

if (false === function_exists('view')) {
    /**
     * Compilar una vista compatible con twig
     *
     * @param string $view_path Ruta a la template.
     * @param array  $data      Variables transmitidos a la template.
     *
     * @return string
     */
    function view($view_path, $data = array())
    {
        return View::render($view_path, $data);
    }
}
