<?php namespace Matrix\View;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_LoaderInterface;

define('LIB_DIR', __DIR__);

class ViewManager
{

    /**
     * @var null|ViewManager
     */
    protected static $instance = null;

    /**
     * @var Twig_Environment
     */
    protected $environment;
    /**
     * @var Twig_LoaderInterface
     */
    protected static $loader = null;

    /**
     * @var array
     */
    protected static $config;
    protected $defaultConfig = 'config/view.php';

    /**
     * ViewManager constructor.
     * @param Twig_LoaderInterface $loaderInterface
     * @internal param array $config
     */
    public function __construct(Twig_LoaderInterface $loaderInterface = null)
    {
        if (is_null(self::$config)) {
            self::setDirConfig($this->defaultConfig);
        }

        if (!is_null($loaderInterface)) {
            self::setLoader($loaderInterface);
        }

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

    public function loadTwigEnvironment()
    {
        $loader = self::getLoader();

        $this->setEnvironment(new Twig_Environment($loader, self::$config['options']));
    }

    /**
     * @return Twig_Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @return Twig_LoaderInterface
     */
    public static function getLoader()
    {
        if (is_null(self::$loader)) {
            self::$loader = new Twig_Loader_Filesystem(self::$config['templates_dir']);
            if (!is_null(self::$config['namespaces']) && is_array(self::$config['namespaces'])) {
                foreach (self::$config['namespaces'] as $namespace => $dir) {
                    self::$loader->addPath($dir, $namespace);
                }
            }
        }

        return self::$loader;
    }

    /**
     * @param Twig_LoaderInterface $loader
     */
    public static function setLoader(Twig_LoaderInterface $loader)
    {
        self::$loader = $loader;
    }

    /**
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }

    /**
     * @param string $config
     */
    public static function setDirConfig($config)
    {
        self::$config = require $config;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = ViewManager::getInstance();

        if (is_null($instance)) {
            $instance = new ViewManager();
            $instance->loadTwigEnvironment();
            ViewManager::setInstance($instance);
        }

        $environment = $instance->getEnvironment();

        return call_user_func_array(array($environment, $name), $arguments);

    }

    public function __call($name, $arguments)
    {
        $environment = $this->getEnvironment();
        return call_user_func_array(array($environment, $name), $arguments);
    }

    public function setEnvironment(Twig_Environment $environment)
    {
        $this->environment = $environment;
    }
}
