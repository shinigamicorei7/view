<?php namespace Matrix\View;

define('VIEW_DIR', __DIR__);

class ViewManager
{

    /**
     * @var null|ViewManager
     */
    protected static $instance = null;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var array
     */
    protected $config;

    /**
     * ViewManager constructor.
     */
    public function __construct()
    {
        $this->config = require 'config/view.php';
        $this->loadTwigEnvironment();
        self::setInstance($this);
    }

    /**
     * @return ViewManager|null
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * @param ViewManager $instance
     */
    public static function setInstance(ViewManager $instance)
    {
        self::$instance = $instance;
    }

    protected function loadTwigEnvironment()
    {
        $loader = new \Twig_Loader_Filesystem($this->config['views_dir']);
        $this->twig = new \Twig_Environment($loader);
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = ViewManager::getInstance();

        if (is_null($instance)) {
            $instance = new ViewManager();
        }

        $twig = $instance->getTwig();

        return call_user_func_array(array($twig, $name), $arguments);

    }


}