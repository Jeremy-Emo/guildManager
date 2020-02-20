<?php

namespace App\DataFixtures;

use App\Entity\Achievement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class AchievementsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $titles = [
            [
                'name' => 'Speed Cairos',
                'text' => 'Faire moins de 1 min sur GB10, DB10 et NB10',
                'image' => 'gb9',
            ],
            [
                'name' => 'God Cairos',
                'text' => 'Faire moins de 30 secondes sur GB10, DB10 et NB10',
                'image' => 'gb10',
            ],
            [
                'name' => 'PC Master Raid',
                'text' => 'Monter une team BJ5 stable',
                'image' => 'raid',
            ],
            [
                'name' => 'Début du late game',
                'text' => 'Atteindre le Late -',
                'image' => 'late_minus',
            ],
            [
                'name' => 'Fin du late game',
                'text' => 'Atteindre le Late +',
                'image' => 'late',
            ],
            [
                'name' => 'Destructeur de défenses',
                'text' => 'Monter une offense Bulldozer/Cuivre/Imesety',
                'image' => 'break_def',
            ],
            [
                'name' => 'NINJAS !!!',
                'text' => 'Monter une défense Susanoo/Orion/Garo',
                'image' => 'ninja',
            ],
            [
                'name' => 'Maître des éléments',
                'text' => 'Monter 20 monstres 6* de chaque élément',
                'image' => 'element_master',
            ],
            [
                'name' => 'Chanceux',
                'text' => 'Posséder un nat5 L&D',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Chanceux',
                'text' => 'Posséder un nat5 L&D',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Chanceux',
                'text' => 'Posséder un nat5 L&D',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Très chanceux',
                'text' => 'Posséder 2 nat5 L&D',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Trop chanceux',
                'text' => 'Posséder 4 nat5 L&D',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Carte bleu tiers',
                'text' => 'Posséder 6 nat5 L&D',
                'image' => 'cb',
            ],
            [
                'name' => 'Champion de la guilde',
                'text' => 'Gagner une fois un tournoi RTA de guilde',
                'image' => 'champion',
            ],
            [
                'name' => 'Le début dans l\'arène',
                'text' => 'Faire C1 en arène',
                'image' => 'c1',
            ],
            [
                'name' => 'Top 300',
                'text' => 'Faire G1 en arène',
                'image' => 'g1',
            ],
            [
                'name' => 'Presque une légende !',
                'text' => 'Faire G2 en arène',
                'image' => 'g2',
            ],
            [
                'name' => 'I wanna be a legend !',
                'text' => 'Faire G3 en arène',
                'image' => 'g3',
            ],
            [
                'name' => 'Little monster',
                'text' => 'Faire C1 en RTA',
                'image' => 'c1',
            ],
            [
                'name' => 'True monster',
                'text' => 'Faire G1 en RTA',
                'image' => 'g1',
            ],
            [
                'name' => 'Invincible',
                'text' => 'Faire 10 victoires d\'affilée en GVO',
                'image' => 'gvg',
            ],
            [
                'name' => 'Mécène de la guilde',
                'text' => 'Prendre un pack de guilde',
                'image' => 'crystal',
            ],
            [
                'name' => 'Le début de la vitesse',
                'text' => 'Posséder un monstre à 270 de vitesse',
                'image' => 'orion',
            ],
            [
                'name' => 'Rapide',
                'text' => 'Posséder un monstre à 290 de vitesse',
                'image' => 'bernard',
            ],
            [
                'name' => 'A la vitesse de la lumière',
                'text' => 'Posséder un monstre à 310 de vitesse',
                'image' => 'fregate',
            ],
            [
                'name' => 'Vous ne passerez PAS',
                'text' => 'Faire 10 défenses réussies consécutives en GVO',
                'image' => 'fortress',
            ],
            [
                'name' => 'Le MUR',
                'text' => 'Avoir une défense à plus de 100 victoires',
                'image' => 'mur',
            ],
            [
                'name' => 'Destructeur de tours',
                'text' => 'Prendre une tour en solo en GVO',
                'image' => 'tower_destruction',
            ],
            [
                'name' => 'Riche',
                'text' => 'Monter à 10 millions de mana',
                'image' => 'pognon2',
            ],
            [
                'name' => 'Richissime',
                'text' => 'Monter à 50 millions de mana',
                'image' => 'pognon',
            ],
            [
                'name' => 'Motivé',
                'text' => 'Posséder 30 monstres 6*',
                'image' => '6-1',
            ],
            [
                'name' => 'Acharné',
                'text' => 'Posséder 50 monstres 6*',
                'image' => '6-2',
            ],
            [
                'name' => 'Accro',
                'text' => 'Posséder 100 monstres 6*',
                'image' => '6-3',
            ],
            [
                'name' => 'Malade',
                'text' => 'Posséder 150 monstres 6*',
                'image' => '6-4',
            ],
            [
                'name' => 'Exalté',
                'text' => 'Posséder 200 monstres 6*',
                'image' => '6-5',
            ],
            [
                'name' => 'FUUUUU-SION !',
                'text' => 'Avoir complété 6 fusions',
                'image' => 'fusion',
            ],
            [
                'name' => 'Maître des rifts',
                'text' => 'Faire SSS sur toutes les rifts',
                'image' => 'sss',
            ],
            [
                'name' => 'Banquier de la guilde',
                'text' => 'Participer à une économie de vélins pour une summon de guilde',
                'image' => 'guild_scroll',
            ],
            [
                'name' => 'Raider de la guilde',
                'text' => 'Participer à une session de raid de guilde',
                'image' => 'raid',
            ],
            [
                'name' => 'Nouvel éveil',
                'text' => 'Monter 5 monstre 2e éveil 6*',
                'image' => 'raoq',
            ],
            [
                'name' => 'Voyage au centre des dimensions',
                'text' => 'Monter 10 monstre 2e éveil 6*',
                'image' => 'elucia',
            ],
            [
                'name' => 'Expert des dimensions',
                'text' => 'Monter 30 monstre 2e éveil 6*',
                'image' => 'miho',
            ],
        ];

        $i = 1;

        foreach($titles as $title) {
            $hf = new Achievement();
            $hf
                ->setId($i)
                ->setName($title['name'])
                ->setText($title['text'])
                ->setImage($title['image'])
            ;

            $manager->persist($hf);

            $metadata = $manager->getClassMetaData(get_class($hf));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
            $i ++;

        }

        $manager->flush();

    }

    public static function getGroups(): array
    {
        return ['toProd'];
    }
}