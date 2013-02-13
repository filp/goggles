<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles\Result;
use Goggles\Result\Result;

/**
 * Goggles\Result\ResultCollection
 */
class ResultCollection
{
    /**
     * @var Goggles\Result\Result[]
     */
    protected $results;

    /**
     * Returns an array with all available results,
     * or an empty array if no results are available.
     * @return Goggles\Result\Result[]
     */
    public function getResultsArray()
    {
        return $this->results !== null ? $this->results : array();
    }

    /**
     * @param  Goggles\Result\Result
     * @return Goggles\Result\ResultCollection
     */
    public function addResult(Result $result)
    {
        if($this->results === null) {
            $this->results = array();
        }

        $this->results[] = $result;
    }

    /**
     * @param  Goggles\Result\Result[]
     * @return Goggles\Result\ResultCollection
     */
    public function addResults(array $results)
    {
        foreach($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }
}

