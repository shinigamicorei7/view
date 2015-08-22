## Matrix\View

[![Latest Stable Version](https://poser.pugx.org/shinigamicorei7/view/v/stable)](https://packagist.org/packages/shinigamicorei7/view) [![Total Downloads](https://poser.pugx.org/shinigamicorei7/view/downloads)](https://packagist.org/packages/shinigamicorei7/view) [![Latest Unstable Version](https://poser.pugx.org/shinigamicorei7/view/v/unstable)](https://packagist.org/packages/shinigamicorei7/view) [![License](https://poser.pugx.org/shinigamicorei7/view/license)](https://packagist.org/packages/shinigamicorei7/view)

## Instalación y configuración

```
composer require shinigamicorei7/view
```

Modificamos nuestro archivo de configuración ubicado en `config/view.php`

## Uso

```php
require 'path/to/vendor/autoload.php';

/**
* Usando el Alias de la Clase
*/
echo View::render('index.twig',array('nombre' => 'Shinigamicorei7'));

/**
* Usando una sola función
* echo view('index.twig',array('nombre' => 'Shinigamicorei7'));
*/
```