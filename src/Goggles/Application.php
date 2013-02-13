<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles;

use Goggles\Provider\ProviderInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Application as ConsoleApplication;

/**
 * Goggles\Application
 */
class Application extends ConsoleApplication
{
    /**
     * @var Goggles\Provider\ProviderInterface[]
     */
    protected $providers;

    /**
     * @var string[]
     */
    protected $configSearchPaths;

    /**
     * Registers a search provider. The provider will
     * be used in the order it was registered.
     * @param  Goggles\Provider\ProviderInterface $provider
     * @return Goggles\Application
     */
    public function registerProvider(ProviderInterface $provider)
    {
        if($this->providers === null) {
            $this->providers = array();
        }

        $this->providers[] = $provider;
    }

    /**
     * Returns an array of registered providers.
     * @return Goggles\Provider\ProviderInterface[]
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * Sets an array of paths that will be searched, in order
     * for a .goggles file. The file contents will be merged
     * right-to-left, as they are found.
     * @param  string[] $searchPaths
     * @return Goggles\Application
     */
    public function setConfigSearchPaths(array $paths)
    {
        $this->configSearchPaths = $paths;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Goggles';
    }

    /**
     * Overrides ConsoleApplication::getLongVersion to
     * get a prettier console header.
     *
     * @see    Symfony\Component\Console\Application::getLongVersion
     * @return string
     */
    public function getLongVersion()
    {
        return "<info>{$this->getName()}</info> - search composer packages";
    }

    /**
     * Runs the application with the registered commands.
     * @see Symfony\Component\Console\Application::run
     */
    public function run()
    {
        parent::run();
    }
}

