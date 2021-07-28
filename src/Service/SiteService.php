<?php


namespace App\Service;


use App\Adapter\SeleniumAdapter;
use App\Entity\Site;
use App\Repository\SiteRepository;
use Doctrine\ORM\EntityManagerInterface;

class SiteService
{
    /** @var SiteRepository */
    private $siteRepository;

    /** @var SeleniumAdapter */
    private $seleniumAdapter;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(
        SiteRepository $siteRepository,
        SeleniumAdapter $seleniumAdapter,
        EntityManagerInterface $entityManager
    ) {
        $this->siteRepository = $siteRepository;
        $this->seleniumAdapter = $seleniumAdapter;
        $this->entityManager = $entityManager;
    }


    public function importSources(?string $provider)
    {
        if ($provider === null) {
            $sites = $this->siteRepository->findAll();
        } else {
            $sites = $this->siteRepository->findBy(['provider' => $provider, 'status' => 'new']);
        }

        $driver = $this->seleniumAdapter->getWebDriver();
        foreach ($sites as $site) {
            $driver->get($site->getUrl());
            $pageSource = $driver->getPageSource();
            $site->setSource($pageSource);
            $site->setStatus(Site::STATUS_IMPORTED);
            $site->setImportDate(new \DateTimeImmutable());
            $this->entityManager->persist($site);
        }
        $this->entityManager->flush();
        $this->seleniumAdapter->finish();
    }
}