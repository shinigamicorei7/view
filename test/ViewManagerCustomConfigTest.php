<?php
/**
 * Created by PhpStorm.
 * User: BryanDaniel
 * Date: 22/08/2015
 * Time: 14:35
 */

namespace Matrix\View\Test;


use Matrix\View\ViewManager;

class ViewManagerCustomConfigTest extends \PHPUnit_Framework_TestCase
{

    protected $viewManager;

    /**
     * ViewManagerCustomConfigTest constructor.
     */
    public function __construct()
    {
        ViewManager::setDirConfig('pruebas/config.example.php');
        $this->viewManager = new ViewManager();
        $this->viewManager->loadTwigEnvironment();
        ViewManager::setInstance($this->viewManager);
    }

    public function test_view_render_return_using_class_root()
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

    public function test_view_render_using_class_alias()
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

    public function test_view_render_using_helper_function()
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
