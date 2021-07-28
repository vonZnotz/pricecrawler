<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
{
    const STATUS_NEW = 'new';
    const STATUS_IMPORTED = 'imported';

    const PROVIDER_AMAZON = 'amazon';
    const PROVIDER_GOOGLE_SHOPPING = 'google_shopping';
    const PROVIDER_IDEALO_DE = 'idealo_de';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provider;

    /**
     * @ORM\Column(type="text")
     */
    private $url;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $importDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $analyzeDate;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getImportDate(): ?\DateTimeImmutable
    {
        return $this->importDate;
    }

    public function setImportDate(\DateTimeImmutable $importDate): self
    {
        $this->importDate = $importDate;

        return $this;
    }

    public function getAnalyzeDate(): ?\DateTimeInterface
    {
        return $this->analyzeDate;
    }

    public function setAnalyzeDate(?\DateTimeInterface $analyzeDate): self
    {
        $this->analyzeDate = $analyzeDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
