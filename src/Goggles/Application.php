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
use RuntimeException;

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
    public function setConfigPaths(array $paths)
    {
        $this->configSearchPaths = $paths;
    }

    /**
     * Search for configuration files in registered paths, and
     * merge them right-to-left into a single configuration.
     * @return array
     */
    protected function loadConfigurationFiles()
    {
        $config = array();
        foreach($this->configSearchPaths as $filePath) {
            if(is_file($filePath)) {
                $fileContents = file_get_contents($filePath);
                $config = array_merge_recursive(
                    $config, json_decode($fileContents, true)
                );
            }
        }

        return $config;
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
        $config = $this->loadConfigurationFiles();
        parent::run();
    }
}

