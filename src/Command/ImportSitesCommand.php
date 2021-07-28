<?php

namespace App\Command;

use App\Service\SiteService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportSitesCommand extends Command
{
    protected static $defaultName = 'app:import-sites';
    protected static $defaultDescription = 'Import source code from several sites using selenium';

    /** @var SiteService */
    private $siteService;

    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('provider', InputArgument::OPTIONAL, 'make import for possible providers')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->siteService->importSources($input->getArgument('provider'));

        $io->success('successfully imported sources of all site in database');

        return Command::SUCCESS;
    }
}
