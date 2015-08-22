<?php namespace Matrix\View\Test;

use Matrix\View\ViewManager;

class ViewManagerCustomConfigTest extends \PHPUnit_Framework_TestCase
{

    protected $viewManager;

    /**
     * ViewManagerCustomConfigTest constructor.
     */
    public function __construct()
    {
        ViewManager::setDirConfig(LIB_DIR . '/test/pruebas/config.example.php');
        $this->viewManager = new ViewManager();
        $this->viewManager->loadTwigEnvironment();
        ViewManager::setInstance($this->viewManager);
    }

    public function testViewRenderReturnUsingClassRoot()
    {
        $html = '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Twig</title>
</head>
<body>
<h1>Welcome, Bryan</h1>
    <p>Extendemos la template index.twig que se encuentra en el directorio root</p>
</body>
</html>';
        $this->assertEquals($html, ViewManager::render('@test/index.twig', array('name' => 'Bryan')));
    }

    public function testViewRenderUsingClassAlias()
    {
        $html = '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Twig</title>
</head>
<body>
<h1>Welcome, Bryan</h1>
    <p>Extendemos la template index.twig que se encuentra en el directorio root</p>
</body>
</html>';
        $this->assertEquals($html, \View::render('@test/index.twig', array('name' => 'Bryan')));
    }

    public function testViewRenderUsingHelperFunction()
    {
        $html = '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Twig</title>
</head>
<body>
<h1>Welcome, Bryan</h1>
    <p>Extendemos la template index.twig que se encuentra en el directorio root</p>
</body>
</html>';
        $this->assertEquals($html, view('@test/index.twig', array('name' => 'Bryan')));
    }
}
