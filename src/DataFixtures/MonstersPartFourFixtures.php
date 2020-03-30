<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class MonstersPartFourFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $oneStars = [
            [
                'name' => 'Havana',
                'img' => 'havana',
            ],
            [
                'name' => 'Lamor',
                'img' => 'lamor',
            ],
            [
                'name' => 'Samour',
                'img' => 'samour',
            ],
            [
                'name' => 'Tigryss',
                'img' => 'tigryss',
            ],
            [
                'name' => 'Varis',
                'img' => 'varis',
            ],
        ];

        foreach ($oneStars as $oneStar) {
            $mon = new Monster();
            $mon->setName($oneStar['name'])->setImage('/img/1nat/' . $oneStar['img'] . '.png');
            $manager->persist($mon);
        }


        $twoStars = [
            [
                'name' => 'Arkajan',
                'img' => 'arkajan',
            ],
            [
                'name' => 'Cogma',
                'img' => 'cogma',
            ],
            [
                'name' => 'Fynn',
                'img' => 'fynn',
            ],
            [
                'name' => 'Garok',
                'img' => 'garok',
            ],
            [
                'name' => 'Kunda',
                'img' => 'kunda',
            ],
            [
                'name' => 'Rakaja',
                'img' => 'rakaja',
            ],
            [
                'name' => 'Ralph',
                'img' => 'ralph',
            ],
            [
                'name' => 'Tantra',
                'img' => 'tantra',
            ],
            [
                'name' => 'Bremis',
                'img' => 'bremis',
            ],
            [
                'name' => 'Daharenos',
                'img' => 'daharenos',
            ],
            [
                'name' => 'Taharus',
                'img' => 'taharus',
            ],
            [
                'name' => 'Seal',
                'img' => 'seal',
            ],
            [
                'name' => 'Sisroo',
                'img' => 'sisroo',
            ],
            [
                'name' => 'Kaimann',
                'img' => 'kaimann',
            ],
            [
                'name' => 'Decamaron',
                'img' => 'decamaron',
            ],
            [
                'name' => 'Lukan',
                'img' => 'lukan',
            ],
            [
                'name' => 'Sharman',
                'img' => 'sharman',
            ],
        ];

        foreach ($twoStars as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/' . $twoStar['img'] . '.png');
            $manager->persist($mon);
        }


        $threeStars = [
            [
                'name' => 'Bagir',
                'img' => 'bagir',
            ],
            [
                'name' => 'Vidurr',
                'img' => 'vidurr',
            ],
            [
                'name' => 'Priz',
                'img' => 'priz',
            ],
            [
                'name' => 'Camules',
                'img' => 'camules',
            ],
            [
                'name' => 'Seren',
                'img' => 'seren',
            ],
            [
                'name' => 'Sia',
                'img' => 'sia',
            ],
            [
                'name' => 'Krakdon',
                'img' => 'krakdon',
            ],
            [
                'name' => 'Prilea',
                'img' => 'prilea',
            ],
            [
                'name' => 'Ramira',
                'img' => 'ramira',
            ],
            [
                'name' => 'Anduril',
                'img' => 'anduril',
            ],
            [
                'name' => 'Cassandre',
                'img' => 'cassandre',
            ],
            [
                'name' => 'Dagorr',
                'img' => 'dagorr',
            ],
            [
                'name' => 'Drogan',
                'img' => 'drogan',
            ],
            [
                'name' => 'Ellena',
                'img' => 'ellena',
            ],
            [
                'name' => 'Eludain',
                'img' => 'eludain',
            ],
            [
                'name' => 'Ermeda',
                'img' => 'ermeda',
            ],
            [
                'name' => 'Fao',
                'img' => 'fao',
            ],
            [
                'name' => 'Gruda',
                'img' => 'gruda',
            ],
            [
                'name' => 'Haken',
                'img' => 'haken',
            ],
            [
                'name' => 'Jumaline',
                'img' => 'jumaline',
            ],
            [
                'name' => 'Kugo',
                'img' => 'kugo',
            ],
            [
                'name' => 'Kuhn',
                'img' => 'kuhn',
            ],
            [
                'name' => 'Kungen',
                'img' => 'kungen',
            ],
            [
                'name' => 'Maggi',
                'img' => 'maggi',
            ],
            [
                'name' => 'Moria',
                'img' => 'moria',
            ],
            [
                'name' => 'Purian',
                'img' => 'purian',
            ],
            [
                'name' => 'Ragion',
                'img' => 'ragion',
            ],
            [
                'name' => 'Shailoq',
                'img' => 'shailoq',
            ],
            [
                'name' => 'Shamann',
                'img' => 'shamann',
            ],
            [
                'name' => 'Sharron',
                'img' => 'sharron',
            ],
            [
                'name' => 'Shren',
                'img' => 'shren',
            ],
            [
                'name' => 'Tagaros',
                'img' => 'tagaros',
            ],
            [
                'name' => 'Argent',
                'img' => 'argent',
            ],
            [
                'name' => 'Fer',
                'img' => 'fer',
            ],
            [
                'name' => 'Hemos',
                'img' => 'hemos',
            ],
            [
                'name' => 'Hiva',
                'img' => 'hiva',
            ],
            [
                'name' => 'Nickel',
                'img' => 'nickel',
            ],
            [
                'name' => 'Sath',
                'img' => 'sath',
            ],
            [
                'name' => 'Huan',
                'img' => 'huan',
            ],
            [
                'name' => 'Mao',
                'img' => 'mao',
            ],
            [
                'name' => 'Wei Shin',
                'img' => 'weishin',
            ],
            [
                'name' => 'Xiao Chun',
                'img' => 'xiaochun',
            ],
            [
                'name' => 'Anne',
                'img' => 'anne',
            ],
            [
                'name' => 'Aqcus',
                'img' => 'aqcus',
            ],
            [
                'name' => 'Baekdu',
                'img' => 'baekdu',
            ],
            [
                'name' => 'Burentau',
                'img' => 'burentau',
            ],
            [
                'name' => 'Devinodon',
                'img' => 'devinodon',
            ],
            [
                'name' => 'Eintau',
                'img' => 'eintau',
            ],
            [
                'name' => 'Eluin',
                'img' => 'eluin',
            ],
            [
                'name' => 'Erwin',
                'img' => 'erwin',
            ],
            [
                'name' => 'Gangchun',
                'img' => 'gangchun',
            ],
            [
                'name' => 'Grotau',
                'img' => 'grotau',
            ],
            [
                'name' => 'Grue',
                'img' => 'grue',
            ],
            [
                'name' => 'Gunpyeong',
                'img' => 'gunpyeong',
            ],
            [
                'name' => 'Hannah',
                'img' => 'hannah',
            ],
            [
                'name' => 'Hanra',
                'img' => 'hanra',
            ],
            [
                'name' => 'Hiro',
                'img' => 'hiro',
            ],
            [
                'name' => 'Igmanodon',
                'img' => 'igmanodon',
            ],
            [
                'name' => 'Ignicus',
                'img' => 'ignicus',
            ],
            [
                'name' => 'Jackie',
                'img' => 'jackie',
            ],
            [
                'name' => 'Kamatau',
                'img' => 'kamatau',
            ],
            [
                'name' => 'Karakum',
                'img' => 'karakum',
            ],
            [
                'name' => 'Kernodon',
                'img' => 'kernodon',
            ],
            [
                'name' => 'Kroa',
                'img' => 'kroa',
            ],
            [
                'name' => 'Kuna',
                'img' => 'kuna',
            ],
            [
                'name' => 'Lo',
                'img' => 'lo',
            ],
            [
                'name' => 'Luan',
                'img' => 'luan',
            ],
            [
                'name' => 'Naki',
                'img' => 'naki',
            ],
            [
                'name' => 'Namib',
                'img' => 'namib',
            ],
            [
                'name' => 'Nangrim',
                'img' => 'nangrim',
            ],
            [
                'name' => 'Nubia',
                'img' => 'nubia',
            ],
            [
                'name' => 'Remy',
                'img' => 'remy',
            ],
            [
                'name' => 'Sahara',
                'img' => 'sahara',
            ],
            [
                'name' => 'Sera',
                'img' => 'sera',
            ],
            [
                'name' => 'Sin',
                'img' => 'sin',
            ],
            [
                'name' => 'Sonora',
                'img' => 'sonora',
            ],
            [
                'name' => 'Suri',
                'img' => 'suri',
            ],
            [
                'name' => 'Toma',
                'img' => 'toma',
            ],
            [
                'name' => 'Urtau',
                'img' => 'urtau',
            ],
            [
                'name' => 'Velfinodon',
                'img' => 'velfinodon',
            ],
            [
                'name' => 'Zephicus',
                'img' => 'zephicus',
            ],
        ];

        foreach ($threeStars as $threeStar) {
            $mon = new Monster();
            $mon->setName($threeStar['name'])->setImage('/img/3nat/' . $threeStar['img'] . '.png');
            $manager->persist($mon);
        }


        $fourStars = [
            [
                'name' => 'Luer',
                'img' => 'luer',
            ],
            [
                'name' => 'Scarlett',
                'img' => 'scarlett',
            ],
            [
                'name' => 'Selena',
                'img' => 'selena',
            ],
            [
                'name' => 'Akia',
                'img' => 'akia',
            ],
            [
                'name' => 'Chris',
                'img' => 'chris',
            ],
            [
                'name' => 'Woochi',
                'img' => 'woochi',
            ],
            [
                'name' => 'Dova',
                'img' => 'dova',
            ],
            [
                'name' => 'Bering',
                'img' => 'bering',
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/' . $fourStar['img'] . '.png');
            $manager->persist($mon);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part4'];
    }
}