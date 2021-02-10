<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\MyTestEntity;
use App\Entity\TestEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestSelectCommand extends Command
{
    const OPT_SHOULD_WORK = 'should-work';

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
        $this->setName('test:select');
        $this->addOption(self::OPT_SHOULD_WORK, null, InputOption::VALUE_NONE);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($input->getOption(self::OPT_SHOULD_WORK)) {
            $dummy = $this->em->getRepository(MyTestEntity::class);
        }

        $q = $this->em->createQuery('SELECT e FROM ' . TestEntity::class . ' e WHERE e.customProp = 0');

        foreach($q->execute() as $res) {
            $output->writeln($res->getAsd());
        };

        return 0;
    }

}
