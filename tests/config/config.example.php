<?php

/**
 * Ejemplo de configuración para el paquete View
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Tests
 * @author   Bryan Velastegui <bryan_slvr@hotmail.com>
 * @license  http://github.com/shinigamicorei7/view/LICENSE MIT license
 * @link     http://github.com/shinigamicorei7/view
 */

return array(
    /**
     * Este campo es obligatorio ya que se usará como directorio root
     * de las plantillas
     * templates_dir string|array
     */
    'templates_dir' => array(
        dirname(dirname(__FILE__)) . '/templates/'
    ), /**
     * Namespaces que se usaran en la aplicación Ej:
     * echo view('@namespace/index.twig',$data);
     * o
     * echo View::render('@namespace/index.twig',$data);
     * namespaces null|array
     */
    'namespaces' => array(
        'test' => dirname(dirname(__FILE__)) . '/templates/test/'
    ), 'options' => array(
        'debug' => true, 'cache' => dirname(dirname(__FILE__)) . '/cache/'
    )
);
