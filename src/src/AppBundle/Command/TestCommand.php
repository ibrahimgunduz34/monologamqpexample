<?
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
        $output->writeln('Test messages are sending to message queue now. Please press CTRL+C to break t');
        $i=2;
        while($i>1) {            
            if($i%2==0){
                $r=random_int(-1000, 0);
                $logger->error('Some error occurred while doing sometihng.', [
                            'some_value'    => 'ABC '.$r,
                            'another_value' => $r,
                        ]);
                        usleep(500);
            }else{ 
                $r=random_int(-1000, 0);
                $logger->warning('Some warning occurred while doing sometihng.', [
                            'some_value'    => 'ABC '.$r,
                            'another_value' => $r,
                        ]);
                        usleep(500);
            }
            $i++;
       
        }
    }
}

