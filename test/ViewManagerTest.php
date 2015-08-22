<?php
/**
 * Created by PhpStorm.
 * User: BryanDaniel
 * Date: 22/08/2015
 * Time: 13:12
 */

namespace Matrix\View\Test;


use Matrix\View\ViewManager;

class ViewManagerTest extends \PHPUnit_Framework_TestCase
{

    protected $viewManager;

    /**
     * ViewManagerTest constructor.
     */
    public function __construct()
    {
        $this->viewManager = new ViewManager();
        $this->viewManager->loadTwigEnvironment();
        ViewManager::setInstance($this->viewManager);

    }


    public function test_instance_using_class_root()
    {
        $this->assertInstanceOf('Matrix\View\ViewManager', ViewManager::getInstance());
    }

    public function test_instance_using_class_alias()
    {
        $this->assertInstanceOf('Matrix\View\ViewManager', \View::getInstance());
    }

    public function test_class_alias_equals_class_root()
    {
        $this->assertEquals(ViewManager::getInstance(), \View::getInstance());
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
