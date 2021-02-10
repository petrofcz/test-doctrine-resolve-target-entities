<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\MyTestEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCreateCommand extends Command
{
    /** @var EntityManagerInterface */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        parent::configure();
        $this->setName('test:create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $e = new MyTestEntity();
        $this->em->persist($e);
        $this->em->flush();
        return 0;
    }

}
