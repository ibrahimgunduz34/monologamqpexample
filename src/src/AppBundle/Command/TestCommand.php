<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('logging:test')
            ->setDescription('Tester command for sending log over');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}