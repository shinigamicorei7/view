<?php
/**
 * Clase de ayuda para el helper view()
 *
 * PHP version 5
 *
 * @category PHP
 * @package  View
 * @author   Bryan Velastegui <bryan_slvr@hotmail.com>
 * @license  http://github.com/shinigamicorei7/view/LICENSE MIT license
 * @link     http://github.com/shinigamicorei7/view
 */

/**
 * Clase de ayuda para el helper view()
 *
 * PHP version 5
 *
 * @category PHP
 * @package  View
 * @author   Bryan Velastegui <bryan_slvr@hotmail.com>
 * @license  http://github.com/shinigamicorei7/view/LICENCE MIT licence
 * @link     http://github.com/shinigamicorei7/view
 */
class ViewTest extends PHPUnit_Framework_TestCase
{
    /**
     * Instancia de nuestra clase View
     *
     * @var View
     */
    protected $view;

    /**
     * ViewCustomConfigTest constructor.
     */
    public function __construct()
    {
        View::setDirConfig(
            dirname(__FILE__) . DIRECTORY_SEPARATOR
            . 'config/config.example.php'
        );
        $this->view = new View();
        $this->view->loadTwigEnvironment();
        View::setInstance($this->view);
    }

    /**
     * Test render
     *
     * @return void
     */
    public function testViewRender()
    {
        $this->assertEquals(
            $this->getHtml(), View::render(
                '@test/index.twig', array(
                    'name' => 'Bryan'
                )
            )
        );
    }

    /**
     * Test render using helper function
     *
     * @return void
     */
    public function testViewRenderUsingHelperFunction()
    {
        $this->assertEquals(
            $this->getHtml(), view('@test/index.twig', array('name' => 'Bryan'))
        );
    }

    /**
     * Retorna el html compilado de la plantilla de ejemplo
     *
     * @return string
     */
    public function getHtml()
    {
        return '<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Test Twig</title>
    </head>
    <body>
        <h1>Welcome, Bryan</h1>
        <p>
    Extendemos la template index.twig que
    se encuentra en el directorio root
</p>
    </body>
</html>';
    }
}
