<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $user = new User();
        $user->setUsername('user');
        $user->setFullName('user');
        $user->setEmail('user@email.org');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'user'));
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setFullName('admin');
        $admin->setEmail('admin@email.org');
        $admin->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->persist($admin);

        $manager->flush();
    }
}
