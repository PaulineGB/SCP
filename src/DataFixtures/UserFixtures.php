<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'pseudo' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'pseudo' => 'Alpha',
                'email' => 'alpha@caramail.com',
                'password' => 'alpha',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Beta',
                'email' => 'beta@yahoo.com',
                'password' => 'beta',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Gamma',
                'email' => 'gamma@wanadoo.com',
                'password' => 'gamma',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Delta',
                'email' => 'delta@yahoo.com',
                'password' => 'delta',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Epsilon',
                'email' => 'epsilon@me.com',
                'password' => 'epsilon',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Zeta',
                'email' => 'zeta@icloud.com',
                'password' => 'zeta',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Kappa',
                'email' => 'kappa@gmail.com',
                'password' => 'admin',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Omicron',
                'email' => 'omicron@yahoo.com',
                'password' => 'omicron',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Pi',
                'email' => 'pi@wiki.com',
                'password' => 'pi',
                'role' => 'ROLE_USER',
            ],
            [
                'pseudo' => 'Omega',
                'email' => 'omega@protonmail.com',
                'password' => 'omega',
                'role' => 'ROLE_USER',
            ],
        ];

        foreach ($users as $key => $data) {
            $user = new User();
            $user->setPseudo($data['pseudo']);
            $user->setEmail($data['email']);
            $user->setPassword($this->encoder->encodePassword($user, $data['password']));
            $user->setRoles([$data['role']]);
            $manager->persist($user);
            $this->addReference('user_' . $key, $user);
        }

        $manager->flush();
    }

}