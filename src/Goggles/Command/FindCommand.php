<?php
/**
 * Goggles : search for composer packages from the terminal
 * @author  Filipe Dobreira <http://github.com/filp>
 * @package filp/goggles
 */

namespace Goggles\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Goggles\Command\FindCommand
 * Searches for a string through the registered search providers.
 */
class FindCommand extends Command
{
    /**
     * @see Symfony\Component\Console\Command\Command::configure
     */
    protected function configure()
    {
        $this
            ->setName('find')
            ->setDescription('Search for a package using the available providers')
            ->addArgument('query', InputArgument::REQUIRED)
        ;
    }

    /**
     * @param InputInterface  $in
     * @param OutputInterface $out
     */
    protected function execute(InputInterface $in, OutputInterface $out)
    {
        $out->writeln("query: <info>{$in->getArgument('query')}</info>");
    }
}
