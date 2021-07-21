<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Menace;

class MenaceFixtures extends Fixture
{
    const MENACES = [
        'hibernation renforcée',
        'explosion',
        'cannibale',
        'hallucinogène',
        'rots en forme de bulles roses',
        'liquidation totale de la nourriture',
        'invasion de rampants',
        'overdose',
        'disparition des chats',
        'développement de pattes sur le bord inférieur de tous les livres',
        'changements intempestifs de directions des vents',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::MENACES as $key => $menaceName) {
            $menace = new Menace();
            $menace->setName($menaceName);
            $manager->persist($menace);
            $this->addReference('menace_' . $key, $menace);
        }

        $manager->flush();
    }
}
