<?php

namespace App\Service;

use App\Repository\ConfigRepository;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\AbstractExtension;

class ConfigService
    extends AbstractExtension
{
    /**
     * @var $configRepository
     */
    private $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function getAppName()
    {
        return $this->configRepository->findOneBy(['name' => 'app_name'])->getValue();
    }

    public function getAppTitle()
    {
        return $this->configRepository->findOneBy(['name' => 'app_title'])->getValue();
    }
}
