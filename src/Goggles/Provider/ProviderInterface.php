<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles\Provider;
use Goggles\Result\ResultCollection;

/**
 * Goggles\Provider\ProviderInterface
 * Base interface for all Goggles providers
 */
interface ProviderInterface
{
    /**
     * Returns a Human-readable name for this provider.
     * @return string
     */
    public function getName();

    /**
     * Performs a search for a given query
     * @param  string $query
     * @param  Goggles\Result\ResultCollection $results
     */
    public function search($query, ResultCollection $results);
}
