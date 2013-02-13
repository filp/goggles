<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles;
use Symfony\Component\Console\Application as ConsoleApplication;

/**
 * Goggles\Application
 */
class Application extends ConsoleApplication
{
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
        return "<info>{$this->getName()}</info>";
    }
}

