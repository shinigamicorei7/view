<?php namespace Matrix\View\Test;

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

    public function testInstanceUsingClassRoot()
    {
        $this->assertInstanceOf('Matrix\View\ViewManager', ViewManager::getInstance());
    }

    public function testInstanceUsingClassAlias()
    {
        $this->assertInstanceOf('Matrix\View\ViewManager', \View::getInstance());
    }

    public function testClassAliasEqualsClassRoot()
    {
        $this->assertEquals(ViewManager::getInstance(), \View::getInstance());
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
</body>
</html>';
        $this->assertEquals($html, ViewManager::render('index.twig', array('name' => 'Bryan')));
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
</body>
</html>';
        $this->assertEquals($html, \View::render('index.twig', array('name' => 'Bryan')));
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
</body>
</html>';
        $this->assertEquals($html, view('index.twig', array('name' => 'Bryan')));
    }
}
