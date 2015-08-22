## Matrix\View

[![Build Status](https://travis-ci.org/shinigamicorei7/view.svg)](https://travis-ci.org/shinigamicorei7/view)
[![Latest Stable Version](https://poser.pugx.org/shinigamicorei7/view/v/stable)](https://packagist.org/packages/shinigamicorei7/view) 
[![Total Downloads](https://poser.pugx.org/shinigamicorei7/view/downloads)](https://packagist.org/packages/shinigamicorei7/view) 
[![Latest Unstable Version](https://poser.pugx.org/shinigamicorei7/view/v/unstable)](https://packagist.org/packages/shinigamicorei7/view) 
[![License](https://poser.pugx.org/shinigamicorei7/view/license)](https://packagist.org/packages/shinigamicorei7/view)

## Instalación y configuración

```
composer require shinigamicorei7/view
```

Creamos un archivo de configuración:

```php
<?php

return array(
    /**
     * Este campo es obligatorio ya que se usará como directorio root de las plantillas
     *
     * templates_dir string|array
     */
    'templates_dir' => array(
        'path/to/templates/'
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
        'test' => 'path/to/test/views/'
    ),
    'options' => array(
        'debug' => false,
        'cache' => 'path/to/cache/'
    )
);
```

## Uso

```php
require 'path/to/vendor/autoload.php';

View::setDirConfig('path/to/view/config.php');

/**
* Usando el Alias de la Clase
*/
echo View::render('index.twig',array('nombre' => 'Shinigamicorei7'));


/**
* Usando la función de ayuda
* echo view('index.twig',array('nombre' => 'Shinigamicorei7'));
*/

/**
* Usando los namespaces definidos en nuestro archivo de configuracion
* echo view('@test/index.twig',array('nombre' => 'Shinigamicorei7')); 
*/
```
