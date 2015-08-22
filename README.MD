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