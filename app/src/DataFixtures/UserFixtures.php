<?php

namespace App\DataFixtures;

use App\Entity\Collaborateur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures
    extends Fixture
    implements OrderedFixtureInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Client administrator account
        $user = new User();
        $user->setLogin('nicolas')
            ->setPassword($this->encoder->encodePassword($user, 'nicolas'))
            ->setRoles(['ROLE_COLLABORATEUR']);
        $manager->persist($user);


        // Default collaborateur account
        $collaborateur = new Collaborateur();
        $collaborateur->setName('Nicolas Vauché')
            ->setUser($user);
        $manager->persist($collaborateur);

        // Flush to DB
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
