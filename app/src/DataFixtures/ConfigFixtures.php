<?php

namespace App\DataFixtures;

use App\Entity\Config;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ConfigFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Config fixtures
        $optionsConfig = [
            'app_name' => 'Mon site en Symfony 4',
            'app_title' => "Il est classe ? ou il est pas classe ? Mon site",
            'app_author' => 'Nicolas Vauché',
            'app_email' => 'hello@nicolasvauche.net',
            'app_locale' => 'fr',
        ];
        foreach ($optionsConfig as $optionName => $optionValue) {
            $config = new Config();
            $config->setName($optionName)
                ->setValue($optionValue);
            $manager->persist($config);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
