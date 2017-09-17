<?php
namespace AppBundle\Command;

use Psr\Log\LoggerInterface;
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
        /** @var LoggerInterface $logger */
        $logger = $this->getContainer()->get('logger');
        $output->writeln('Test messages are sending to message queue now. Please press CTRL+C to break this process.');
        while(true) {
            $logger->error('Some error occurred while doing sometihng.', [
                'some_value'    => 'ABC',
                'another_value' => 1532,
            ]);
            usleep(500);
        }
    }
}