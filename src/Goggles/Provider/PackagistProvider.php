<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles\Provider;
use Goggles\Provider\ProviderInterface;
use Goggles\Result\Collection;

/**
 * Goggles\Provider\PackagistProvider
 * Queries Packagist.org for packages
 */
class PackagistProvider implements ProviderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "Packagist.org Search";
    }

    /**
     * @param  string $query
     * @param  Goggles\Result\ResultCollection $results
     */
    public function search($query)
    {

    }
}
