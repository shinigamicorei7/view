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
class View
{
    /**
     * Instancia de la clase View.
     *
     * @var null|View
     */
    protected static $instance = null;

    /**
     * Instancia de la clase Twig_Environment.
     *
     * @var Twig_Environment
     */
    protected $environment;

    /**
     * Instancia de la interfaz Twig_LoaderInterface.
     *
     * @var Twig_LoaderInterface
     */
    protected static $loader = null;

    /**
     * Configuración para el paquete.
     *
     * @var array
     */
    protected static $config;

    /**
     * ViewManager constructor.
     *
     * @param Twig_LoaderInterface $loaderInterface Instancia de la interfaz
     *                                              Twig_LoaderInterface.
     */
    public function __construct(Twig_LoaderInterface $loaderInterface = null)
    {
        if (is_null(self::$config)) {
            die('El path de la configuración no a sido definido.');
        }

        if (!is_null($loaderInterface)) {
            self::setLoader($loaderInterface);
        }
    }

    /**
     * Retorna una instancia de la clase View
     *
     * @return View|null
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * Definir una instancia de la clase View
     *
     * @param View $instance Instancia de la clase View
     *
     * @return void
     */
    public static function setInstance(View $instance)
    {
        self::$instance = $instance;
    }

    /**
     * Cargamos la configuración definida por el usuario
     *
     * @return void
     */
    public function loadTwigEnvironment()
    {
        $loader = self::getLoader();

        $this->setEnvironment(
            new Twig_Environment($loader, self::$config['options'])
        );
    }

    /**
     * Retorna una instancia de la clase Twig_Environment.
     *
     * @return Twig_Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Retorna una instancia de la interfaz Twig_LoaderInterface.
     *
     * @return Twig_LoaderInterface
     */
    public static function getLoader()
    {
        if (is_null(self::$loader)) {
            self::$loader = new Twig_Loader_Filesystem(
                self::$config['templates_dir']
            );
            if (!is_null(self::$config['namespaces'])
                && is_array(
                    self::$config['namespaces']
                )
            ) {
                foreach (self::$config['namespaces'] as $namespace => $dir) {
                    self::$loader->addPath($dir, $namespace);
                }
            }
        }

        return self::$loader;
    }

    /**
     * Define una instancia de la clase Twig_LoaderInterface.
     *
     * @param Twig_LoaderInterface $loader Instancia de la clase Twig_LoaderInterface
     *
     * @return void
     */
    public static function setLoader(Twig_LoaderInterface $loader)
    {
        self::$loader = $loader;
    }

    /**
     * Retorna la configuración
     *
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }

    /**
     * Definir ruta al archivo de configuración
     *
     * @param string $config Ruta al archivo de configuración
     *
     * @return void
     */
    public static function setDirConfig($config)
    {
        self::$config = include $config;
    }

    /**
     * Para implementar la ayuda usamos la sobrecarga de php
     *
     * @param string $name      Nombre de la función
     * @param mixed  $arguments Argumentos que usa la función
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();

        if (is_null($instance)) {
            $instance = new self();
            $instance->loadTwigEnvironment();
            self::setInstance($instance);
        }

        $environment = $instance->getEnvironment();

        return call_user_func_array(array($environment, $name), $arguments);
    }

    /**
     * Implementamos este método para poder acceder a las funciones de
     * nuestra clase madre
     *
     * @param string $name      Nombre de la función
     * @param mixed  $arguments Argumentos que usa la función
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $environment = $this->getEnvironment();

        return call_user_func_array(array($environment, $name), $arguments);
    }

    /**
     * Si el usuario desea puede definir su propia instancia de la clase
     * Twig_Environment
     *
     * @param Twig_Environment $environment Instancia de la clase
     *                                      Twig_Environment
     *
     * @deprecated
     *
     * @return void
     */
    public function setEnvironment(Twig_Environment $environment)
    {
        $this->environment = $environment;
    }
}
