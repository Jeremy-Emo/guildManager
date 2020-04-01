<?php

namespace App\DataFixtures;

use App\Entity\MonsterFamily;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class FamilyFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $families = [
            [
                'name' => 'Agent Neostone',
                'ref' => 'agentNeostone',
            ],
            [
                'name' => 'Amazone',
                'ref' => 'amazone',
            ],
            [
                'name' => 'Anubis',
                'ref' => 'anubis',
            ],
            [
                'name' => 'Archange',
                'ref' => 'archange',
            ],
            [
                'name' => 'Archer Magique',
                'ref' => 'archerMagique',
            ],
            [
                'name' => 'Armure Vivante',
                'ref' => 'armureVivante',
            ],
            [
                'name' => 'Assassin',
                'ref' => 'assassin',
            ],
            [
                'name' => 'Bearman',
                'ref' => 'bearman',
            ],
            [
                'name' => 'Brownie Magicien',
                'ref' => 'brownieMagicien',
            ],
            [
                'name' => 'Cannon Girl',
                'ref' => 'cannonGirl',
            ],
            [
                'name' => 'Capitaine Pirate',
                'ref' => 'capitainePirate',
            ],
            [
                'name' => 'Cerbère',
                'ref' => 'cerbere',
            ],
            [
                'name' => 'Chasseresse au fauve',
                'ref' => 'chasseresseAuFauve',
            ],
            [
                'name' => 'Chasseur de bêtes',
                'ref' => 'chasseurDeBetes',
            ],
            [
                'name' => 'Chasseur de tête',
                'ref' => 'chasseurDeTete',
            ],
            [
                'name' => 'Chat martial',
                'ref' => 'chatmartial',
            ],
            [
                'name' => 'Chevalier de la Mort',
                'ref' => 'chevalierDeLaMort',
            ],
            [
                'name' => 'Chevalier Dragon',
                'ref' => 'chevalierDragon',
            ],
            [
                'name' => 'Chevalier Magique',
                'ref' => 'chevalierMagique',
            ],
            [
                'name' => 'Chevalier Pingouin',
                'ref' => 'chevalierPingouin',
            ],
            [
                'name' => 'Chimère',
                'ref' => 'chimere',
            ],
            [
                'name' => 'Citrouille d\'Halloween',
                'ref' => 'citrouille',
            ],
            [
                'name' => 'Combattant Neostone',
                'ref' => 'combattantNeostone',
            ],
            [
                'name' => 'Cow-Girl',
                'ref' => 'cowgirl',
            ],
            [
                'name' => 'Dame de l\'Enfer',
                'ref' => 'dameDeLenfer',
            ],
            [
                'name' => 'Danseuse aux chakrams',
                'ref' => 'danseuseAuxChakrams',
            ],
            [
                'name' => 'Danseuse du ciel',
                'ref' => 'danseuseDuCiel',
            ],
            [
                'name' => 'Démon',
                'ref' => 'demon',
            ],
            [
                'name' => 'Diablotin',
                'ref' => 'diablotin',
            ],
            [
                'name' => 'Dragon',
                'ref' => 'dragon',
            ],
            [
                'name' => 'Druide',
                'ref' => 'druide',
            ],
            [
                'name' => 'Dryade',
                'ref' => 'dryade',
            ],
            [
                'name' => 'Elémentaire',
                'ref' => 'elementaire',
            ],
            [
                'name' => 'Elémentaire faible',
                'ref' => 'elementaireFaible',
            ],
            [
                'name' => 'Elfe Patrouilleur',
                'ref' => 'elfePatrouilleur',
            ],
            [
                'name' => 'Empereur de la Mer',
                'ref' => 'empereurDeLaMer',
            ],
            [
                'name' => 'Empereur des Foudres',
                'ref' => 'empereurDesFoudres',
            ],
            [
                'name' => 'Expert en art martial',
                'ref' => 'martialArtist',
            ],
            [
                'name' => 'Faucheuse',
                'ref' => 'faucheuse',
            ],
            [
                'name' => 'Fée',
                'ref' => 'fee',
            ],
            [
                'name' => 'Fille Occulte',
                'ref' => 'filleOcculte',
            ],
            [
                'name' => 'Frankenstein',
                'ref' => 'frankenstein',
            ],
            [
                'name' => 'Gargouille',
                'ref' => 'gargouille',
            ],
            [
                'name' => 'Garuda',
                'ref' => 'garuda',
            ],
            [
                'name' => 'Golem',
                'ref' => 'golem',
            ],
            [
                'name' => 'Griffon',
                'ref' => 'griffon',
            ],
            [
                'name' => 'Guerrière au Boomerang',
                'ref' => 'guerriereAuBoomerang',
            ],
            [
                'name' => 'Guerrier géant',
                'ref' => 'guerrierGeant',
            ],
            [
                'name' => 'Guerrier panda',
                'ref' => 'guerrierPanda',
            ],
            [
                'name' => 'Haut Elementaire',
                'ref' => 'hautElementaire',
            ],
            [
                'name' => 'Harg',
                'ref' => 'harg',
            ],
            [
                'name' => 'Harpie',
                'ref' => 'harpie',
            ],
            [
                'name' => 'Harpu',
                'ref' => 'harpu',
            ],
            [
                'name' => 'Homme-Lézard',
                'ref' => 'hommeLezard',
            ],
            [
                'name' => 'Homonculus',
                'ref' => 'homonculus',
            ],
            [
                'name' => 'Horus',
                'ref' => 'horus',
            ],
            [
                'name' => 'Howl',
                'ref' => 'howl',
            ],
            [
                'name' => 'Ifrit',
                'ref' => 'ifrit',
            ],
            [
                'name' => 'Inferno',
                'ref' => 'inferno',
            ],
            [
                'name' => 'Inugami',
                'ref' => 'inugami',
            ],
            [
                'name' => 'Joker',
                'ref' => 'joker',
            ],
            [
                'name' => 'Joueuse de Harpe',
                'ref' => 'joueuseDeHarpe',
            ],
            [
                'name' => 'Kitsuné',
                'ref' => 'kitsune',
            ],
            [
                'name' => 'Kobold Bomber',
                'ref' => 'koboldBomber',
            ],
            [
                'name' => 'Kung-Fu Girl',
                'ref' => 'kungfuGirl',
            ],
            [
                'name' => 'Liche',
                'ref' => 'liche',
            ],
            [
                'name' => 'Licorne',
                'ref' => 'licorne',
            ],
            [
                'name' => 'Loup-Garou',
                'ref' => 'loupgarou',
            ],
            [
                'name' => 'Lutin',
                'ref' => 'lutin',
            ],
            [
                'name' => 'Lutin Champion',
                'ref' => 'lutinChampion',
            ],
            [
                'name' => 'Maître des Dés',
                'ref' => 'maitreDesDes',
            ],
            [
                'name' => 'Maître Ivre',
                'ref' => 'maitreIvre',
            ],
            [
                'name' => 'Mammouth de Combat',
                'ref' => 'mammouthDeCombat',
            ],
            [
                'name' => 'Minotaure',
                'ref' => 'minotaure',
            ],
            [
                'name' => 'Moine Bestial',
                'ref' => 'moineBestial',
            ],
            [
                'name' => 'Momie',
                'ref' => 'momie',
            ],
            [
                'name' => 'Ninja',
                'ref' => 'ninja',
            ],
            [
                'name' => 'Ondine',
                'ref' => 'ondine',
            ],
            [
                'name' => 'Oracle',
                'ref' => 'oracle',
            ],
            [
                'name' => 'L\'ours de guerre',
                'ref' => 'loursDeGuerre',
            ],
            [
                'name' => 'Paladin',
                'ref' => 'paladin',
            ],
            [
                'name' => 'Phénix',
                'ref' => 'phenix',
            ],
            [
                'name' => 'Pierrette',
                'ref' => 'pierrette',
            ],
            [
                'name' => 'Pionnier',
                'ref' => 'pionnier',
            ],
            [
                'name' => 'Prêtre Epikion',
                'ref' => 'pretreEpikion',
            ],
            [
                'name' => 'Rakshasa',
                'ref' => 'rakshasa',
            ],
            [
                'name' => 'Reine des fées',
                'ref' => 'reineDesFees',
            ],
            [
                'name' => 'Reine du désert',
                'ref' => 'reineDuDesert',
            ],
            [
                'name' => 'Reine polaire',
                'ref' => 'reinePolaire',
            ],
            [
                'name' => 'Requin coursier',
                'ref' => 'requinCoursier',
            ],
            [
                'name' => 'Roi Barbare',
                'ref' => 'roiBarbare',
            ],
            [
                'name' => 'Roi des fées',
                'ref' => 'roiDesFees',
            ],
            [
                'name' => 'Roi Singe',
                'ref' => 'roiSinge',
            ],
            [
                'name' => 'Salamandre',
                'ref' => 'salamandre',
            ],
            [
                'name' => 'Samourai',
                'ref' => 'samourai',
            ],
            [
                'name' => 'Seigneur Vampire',
                'ref' => 'seigneurVampire',
            ],
            [
                'name' => 'Serpent',
                'ref' => 'serpent',
            ],
            [
                'name' => 'Sirène',
                'ref' => 'sirene',
            ],
            [
                'name' => 'Sniper Mk.I',
                'ref' => 'sniper',
            ],
            [
                'name' => 'Sorcière Mystique',
                'ref' => 'sorciereMystique',
            ],
            [
                'name' => 'Succube',
                'ref' => 'succube',
            ],
            [
                'name' => 'Sylphe',
                'ref' => 'sylphe',
            ],
            [
                'name' => 'Sylphide',
                'ref' => 'sylphide',
            ],
            [
                'name' => 'Taoiste',
                'ref' => 'taoiste',
            ],
            [
                'name' => 'Vagabond',
                'ref' => 'vagabond',
            ],
            [
                'name' => 'Valkyrie',
                'ref' => 'valkyrie',
            ],
            [
                'name' => 'Vampire',
                'ref' => 'vampire',
            ],
            [
                'name' => 'Viking',
                'ref' => 'viking',
            ],
            [
                'name' => 'Voleur Fantôme',
                'ref' => 'voleurFantome',
            ],
            [
                'name' => 'Yéti',
                'ref' => 'yeti',
            ],
        ];

        foreach ($families as $family) {
            $fam = new MonsterFamily();
            $fam->setName($family['name']);
            $manager->persist($fam);

            $this->setReference($family['ref'], $fam);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'pack1'];
    }
}