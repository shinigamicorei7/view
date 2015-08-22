<?php

return array(
    /**
     * Este campo es obligatorio ya que se usará como directorio root de las plantillas
     *
     * templates_dir string|array
     */
    'templates_dir' => array(
        LIB_DIR . '/templates/'
    ),
    /**
     * Namespaces que se usaran en la aplicación Ej:
     *
     * echo view('@namespace/index.twig',$data);
     * o
     * echo View::render('@namespace/index.twig',$data);
     *
     * namespaces null|array
     */
    'namespaces' => array(
        'test' => LIB_DIR . '/test/pruebas/'
    ),
    'options' => array(
        'debug' => false,
        'cache' => LIB_DIR . '/cache/'
    )
);