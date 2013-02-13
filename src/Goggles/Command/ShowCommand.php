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
 * Goggles\Command\ShowCommand
 * Shows information about various aspects of Goggles
 */
class ShowCommand extends Command
{
    /**
     * @see Symfony\Component\Console\Command\Command::configure
     */
    protected function configure()
    {
        $this
            ->setName('show')
            ->setDescription('Shows information about various aspects of Goggles')
            ->addArgument('key', InputArgument::REQUIRED)
        ;
    }

    /**
     * @param InputInterface  $in
     * @param OutputInterface $out
     */
    protected function execute(InputInterface $in, OutputInterface $out)
    {
        $app     = $this->getApplication();
        $keyName = $in->getArgument('key');

        switch($keyName) {
            case 'providers':
                $providers = $app->getProviders();
                if($providers === null) {
                    $out->writeln("<info>There are no registered providers</info>");
                } else {
                    foreach($providers as $provider) {
                        $out->writeln(
                            "Provider: <info>{$provider->getName()}</info> (<comment>" . get_class($provider) . "</comment>)"
                        );
                    }
                }
            break;
            default:
                $keys = array('providers');
                $out->writeln("<comment>$keyName</comment> is not a known key");
                $out->writeln("Known keys: <comment>". join(', ', $keys) . "</comment>");
        }
    }
}
