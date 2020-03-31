<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartFourFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $oneStars = [
            [
                'name' => 'Havana',
                'img' => 'havana',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lamor',
                'img' => 'lamor',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Samour',
                'img' => 'samour',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tigryss',
                'img' => 'tigryss',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Varis',
                'img' => 'varis',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($oneStars as $oneStar) {
            $mon = new Monster();
            $mon->setName($oneStar['name'])->setImage('/img/1nat/' . $oneStar['img'] . '.png')->setNaturalStars(1);
            if(isset($oneStar['family'])){
                $mon->setMonsterFamily($oneStar['family']);
            }
            if(isset($oneStar['element'])){
                $mon->setElement($oneStar['element']);
            }
            $manager->persist($mon);
        }


        $twoStars = [
            [
                'name' => 'Arkajan',
                'img' => 'arkajan',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Cogma',
                'img' => 'cogma',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Fynn',
                'img' => 'fynn',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Garok',
                'img' => 'garok',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kunda',
                'img' => 'kunda',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Rakaja',
                'img' => 'rakaja',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ralph',
                'img' => 'ralph',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tantra',
                'img' => 'tantra',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Bremis',
                'img' => 'bremis',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Daharenos',
                'img' => 'daharenos',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taharus',
                'img' => 'taharus',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Seal',
                'img' => 'seal',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sisroo',
                'img' => 'sisroo',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Kaimann',
                'img' => 'kaimann',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Decamaron',
                'img' => 'decamaron',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lukan',
                'img' => 'lukan',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sharman',
                'img' => 'sharman',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($twoStars as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/' . $twoStar['img'] . '.png')->setNaturalStars(2);
            if(isset($twoStar['family'])){
                $mon->setMonsterFamily($twoStar['family']);
            }
            if(isset($twoStar['element'])){
                $mon->setElement($twoStar['element']);
            }
            $manager->persist($mon);
        }


        $threeStars = [
            [
                'name' => 'Bagir',
                'img' => 'bagir',
                'family' => $this->getReference("guerrierGeant"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Vidurr',
                'img' => 'vidurr',
                'family' => $this->getReference("guerrierGeant"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Priz',
                'img' => 'priz',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Camules',
                'img' => 'camules',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Seren',
                'img' => 'seren',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Sia',
                'img' => 'sia',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Krakdon',
                'img' => 'krakdon',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Prilea',
                'img' => 'prilea',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ramira',
                'img' => 'ramira',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Anduril',
                'img' => 'anduril',
                'family' => $this->getReference("inferno"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Cassandre',
                'img' => 'cassandre',
                'family' => $this->getReference("archerMagique"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Dagorr',
                'img' => 'dagorr',
                'family' => $this->getReference("bearman"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Drogan',
                'img' => 'drogan',
                'family' => $this->getReference("inferno"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Ellena',
                'img' => 'ellena',
                'family' => $this->getReference("hautElementaire"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Eludain',
                'img' => 'eludain',
                'family' => $this->getReference("inferno"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Ermeda',
                'img' => 'ermeda',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Fao',
                'img' => 'fao',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Gruda',
                'img' => 'gruda',
                'family' => $this->getReference("bearman"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Haken',
                'img' => 'haken',
                'family' => $this->getReference("bearman"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jumaline',
                'img' => 'jumaline',
                'family' => $this->getReference("hautElementaire"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kugo',
                'img' => 'kugo',
                'family' => $this->getReference("golem"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Kuhn',
                'img' => 'kuhn',
                'family' => $this->getReference("golem"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Kungen',
                'img' => 'kungen',
                'family' => $this->getReference("bearman"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Maggi',
                'img' => 'maggi',
                'family' => $this->getReference("golem"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Moria',
                'img' => 'moria',
                'family' => $this->getReference("hautElementaire"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Purian',
                'img' => 'purian',
                'family' => $this->getReference("inferno"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Ragion',
                'img' => 'ragion',
                'family' => $this->getReference("golem"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shailoq',
                'img' => 'shailoq',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shamann',
                'img' => 'shamann',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Sharron',
                'img' => 'sharron',
                'family' => $this->getReference("archerMagique"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shren',
                'img' => 'shren',
                'family' => $this->getReference("hautElementaire"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Tagaros',
                'img' => 'tagaros',
                'family' => $this->getReference("inferno"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Argent',
                'img' => 'argent',
                'family' => $this->getReference("armureVivante"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Fer',
                'img' => 'fer',
                'family' => $this->getReference("armureVivante"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Hemos',
                'img' => 'hemos',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Hiva',
                'img' => 'hiva',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Nickel',
                'img' => 'nickel',
                'family' => $this->getReference("armureVivante"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sath',
                'img' => 'sath',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Huan',
                'img' => 'huan',
                'family' => $this->getReference("maitreIvre"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Mao',
                'img' => 'mao',
                'family' => $this->getReference("maitreIvre"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Wei Shin',
                'img' => 'weishin',
                'family' => $this->getReference("maitreIvre"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Xiao Chun',
                'img' => 'xiaochun',
                'family' => $this->getReference("maitreIvre"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Anne',
                'img' => 'anne',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Aqcus',
                'img' => 'aqcus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Baekdu',
                'img' => 'baekdu',
                'family' => $this->getReference("chasseurDeBetes"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Burentau',
                'img' => 'burentau',
                'family' => $this->getReference("minotaure"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Devinodon',
                'img' => 'devinodon',
                'family' => $this->getReference("hommeLezard"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Eintau',
                'img' => 'eintau',
                'family' => $this->getReference("minotaure"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Eluin',
                'img' => 'eluin',
                'family' => $this->getReference("elfePatrouilleur"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Erwin',
                'img' => 'erwin',
                'family' => $this->getReference("elfePatrouilleur"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Gangchun',
                'img' => 'gangchun',
                'family' => $this->getReference("chasseurDeBetes"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Grotau',
                'img' => 'grotau',
                'family' => $this->getReference("minotaure"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Grue',
                'img' => 'grue',
                'family' => $this->getReference("frankenstein"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Gunpyeong',
                'img' => 'gunpyeong',
                'family' => $this->getReference("taoiste"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Hannah',
                'img' => 'hannah',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Hanra',
                'img' => 'hanra',
                'family' => $this->getReference("chasseurDeBetes"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Hiro',
                'img' => 'hiro',
                'family' => $this->getReference("martialArtist"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Igmanodon',
                'img' => 'igmanodon',
                'family' => $this->getReference("hommeLezard"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Ignicus',
                'img' => 'ignicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Jackie',
                'img' => 'jackie',
                'family' => $this->getReference("martialArtist"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kamatau',
                'img' => 'kamatau',
                'family' => $this->getReference("minotaure"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Karakum',
                'img' => 'karakum',
                'family' => $this->getReference("momie"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kernodon',
                'img' => 'kernodon',
                'family' => $this->getReference("hommeLezard"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Kroa',
                'img' => 'kroa',
                'family' => $this->getReference("harg"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kuna',
                'img' => 'kuna',
                'family' => $this->getReference("chevalierPingouin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lo',
                'img' => 'lo',
                'family' => $this->getReference("martialArtist"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Luan',
                'img' => 'luan',
                'family' => $this->getReference("martialArtist"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Naki',
                'img' => 'naki',
                'family' => $this->getReference("chevalierPingouin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Namib',
                'img' => 'namib',
                'family' => $this->getReference("momie"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Nangrim',
                'img' => 'nangrim',
                'family' => $this->getReference("chasseurDeBetes"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Nubia',
                'img' => 'nubia',
                'family' => $this->getReference("momie"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Remy',
                'img' => 'remy',
                'family' => $this->getReference("harg"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sahara',
                'img' => 'sahara',
                'family' => $this->getReference("momie"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Sera',
                'img' => 'sera',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sin',
                'img' => 'sin',
                'family' => $this->getReference("martialArtist"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Sonora',
                'img' => 'sonora',
                'family' => $this->getReference("momie"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Suri',
                'img' => 'suri',
                'family' => $this->getReference("chasseurDeBetes"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Toma',
                'img' => 'toma',
                'family' => $this->getReference("chevalierPingouin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Urtau',
                'img' => 'urtau',
                'family' => $this->getReference("minotaure"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Velfinodon',
                'img' => 'velfinodon',
                'family' => $this->getReference("hommeLezard"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Zephicus',
                'img' => 'zephicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_WIND")
            ],
        ];

        foreach ($threeStars as $threeStar) {
            $mon = new Monster();
            $mon->setName($threeStar['name'])->setImage('/img/3nat/' . $threeStar['img'] . '.png')->setNaturalStars(3);
            if(isset($threeStar['family'])){
                $mon->setMonsterFamily($threeStar['family']);
            }
            if(isset($threeStar['element'])){
                $mon->setElement($threeStar['element']);
            }
            $manager->persist($mon);
        }


        $fourStars = [
            [
                'name' => 'Luer',
                'img' => 'luer',
                'family' => $this->getReference("voleurFantome"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Scarlett',
                'img' => 'scarlett',
                'family' => $this->getReference("cannonGirl"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Selena',
                'img' => 'selena',
                'family' => $this->getReference("succube"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Akia',
                'img' => 'akia',
                'family' => $this->getReference("succube"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Chris',
                'img' => 'chris',
                'family' => $this->getReference("archerMagique"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Woochi',
                'img' => 'woochi',
                'family' => $this->getReference("taoiste"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Dova',
                'img' => 'dova',
                'family' => $this->getReference("harg"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Bering',
                'img' => 'bering',
                'family' => $this->getReference("koboldBomber"),
                'element' => $this->getReference("ELEM_DARK")
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/' . $fourStar['img'] . '.png')->setNaturalStars(4);
            if(isset($fourStar['family'])){
                $mon->setMonsterFamily($fourStar['family']);
            }
            if(isset($fourStar['element'])){
                $mon->setElement($fourStar['element']);
            }
            $manager->persist($mon);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part4'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}