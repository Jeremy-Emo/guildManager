<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartOneFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $twoStars = [
            [
                'name' => 'Colleen',
                'img' => 'colleen',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Konamiya',
                'img' => 'konamiya',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Lulu',
                'img' => 'lulu',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sieq',
                'img' => 'sieq',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Tarq',
                'img' => 'tarq',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taru',
                'img' => 'taru',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($twoStars as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/'.$twoStar['img'].'.png');
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
                'name' => 'Ardella',
                'img' => 'ardella',
                'family' => $this->getReference("archerMagique"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Belladeon',
                'img' => 'belladeon',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Bernard',
                'img' => 'bernard',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Bulldozer',
                'img' => 'bulldozer',
                'family' => $this->getReference("frankenstein"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Cuivre',
                'img' => 'cuivre',
                'family' => $this->getReference("armureVivante"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Darion',
                'img' => 'darion',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Fran',
                'img' => 'fran',
                'family' => $this->getReference("reineDesFees"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Groggo',
                'img' => 'groggo',
                'family' => $this->getReference("golem"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Loren',
                'img' => 'loren',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Lyn',
                'img' => 'lyn',
                'family' => $this->getReference("amazone"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Mav',
                'img' => 'mav',
                'family' => $this->getReference("chevalierPingouin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Megan',
                'img' => 'megan',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Racuni',
                'img' => 'racuni',
                'family' => $this->getReference("harg"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Rina',
                'img' => 'rina',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Spectra',
                'img' => 'spectra',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Tracteur',
                'img' => 'tracteur',
                'family' => $this->getReference("frankenstein"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Kahli',
                'img' => 'kahli',
                'family' => $this->getReference("hautElementaire"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Mantura',
                'img' => 'mantura',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Thrain',
                'img' => 'thrain',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Basalt',
                'img' => 'basalt',
                'family' => $this->getReference("mammouthDeCombat"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jubelle',
                'img' => 'jubelle',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Teon',
                'img' => 'teon',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Adrian',
                'img' => 'adrian',
                'family' => $this->getReference("elfePatrouilleur"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Glinodon',
                'img' => 'glinodon',
                'family' => $this->getReference("hommeLezard"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Hellea',
                'img' => 'hellea',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kabilla',
                'img' => 'kabilla',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Wayne',
                'img' => 'wayne',
                'family' => $this->getReference("chasseurDeTete"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Randy',
                'img' => 'randy',
                'family' => $this->getReference("chasseurDeTete"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Robot',
                'img' => 'robot',
                'family' => $this->getReference("frankenstein"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Foreur',
                'img' => 'foreur',
                'family' => $this->getReference("frankenstein"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Tien Qin',
                'img' => 'tienqin',
                'family' => $this->getReference("maitreIvre"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Dona',
                'img' => 'dona',
                'family' => $this->getReference("chevalierPingouin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Zinc',
                'img' => 'zinc',
                'family' => $this->getReference("armureVivante"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Janssen',
                'img' => 'janssen',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kumae',
                'img' => 'kumae',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Ahman',
                'img' => 'ahman',
                'family' => $this->getReference("bearman"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Varus',
                'img' => 'varus',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Woonhak',
                'img' => 'woonhak',
                'family' => $this->getReference("taoiste"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jamie',
                'img' => 'jamie',
                'family' => $this->getReference("chasseurDeTete"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Walkers',
                'img' => 'walkers',
                'family' => $this->getReference("chasseurDeTete"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Roger',
                'img' => 'roger',
                'family' => $this->getReference("chasseurDeTete"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Granit',
                'img' => 'granite',
                'family' => $this->getReference("mammouthDeCombat"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Marbre',
                'img' => 'marbre',
                'family' => $this->getReference("mammouthDeCombat"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Olivine',
                'img' => 'olivine',
                'family' => $this->getReference("mammouthDeCombat"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Talc',
                'img' => 'talc',
                'family' => $this->getReference("mammouthDeCombat"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Ceres',
                'img' => 'ceres',
                'family' => $this->getReference("amazone"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Ellin',
                'img' => 'ellin',
                'family' => $this->getReference("amazone"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Hina',
                'img' => 'hina',
                'family' => $this->getReference("amazone"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Mara',
                'img' => 'mara',
                'family' => $this->getReference("amazone"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Yaku',
                'img' => 'yaku',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shumar',
                'img' => 'shumar',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kahn',
                'img' => 'kahn',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Lucien',
                'img' => 'lucien',
                'family' => $this->getReference("elfePatrouilleur"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($threeStars as $threeStar) {
            $mon = new Monster();
            $mon->setName($threeStar['name'])->setImage('/img/3nat/'.$threeStar['img'].'.png');
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
                'name' => 'Abigail',
                'img' => 'abigail',
                'family' => $this->getReference("cannonGirl"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Acasis',
                'img' => 'acasis',
                'family' => $this->getReference("sylphide"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Aegir',
                'img' => 'aegir',
                'family' => $this->getReference("roiBarbare"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Amarna',
                'img' => 'amarna',
                'family' => $this->getReference("anubis"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Amduat',
                'img' => 'amduat',
                'family' => $this->getReference("horus"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Antarès',
                'img' => 'antares',
                'family' => $this->getReference("liche"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Aria',
                'img' => 'aria',
                'family' => $this->getReference("succube"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Baretta',
                'img' => 'baretta',
                'family' => $this->getReference("sylphe"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Bethony',
                'img' => 'bethony',
                'family' => $this->getReference("archerMagique"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Chasun',
                'img' => 'chasun',
                'family' => $this->getReference("danseuseDuCiel"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Chloe',
                'img' => 'chloe',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Delphoi',
                'img' => 'delphoi',
                'family' => $this->getReference("ondine"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Dover',
                'img' => 'dover',
                'family' => $this->getReference("koboldBomber"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Draco',
                'img' => 'draco',
                'family' => $this->getReference("brownieMagicien"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Eva',
                'img' => 'eva',
                'family' => $this->getReference("pierrette"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Fei',
                'img' => 'fei',
                'family' => $this->getReference("kungfuGirl"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Férelia',
                'img' => 'felleria',
                'family' => $this->getReference("dryade"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Frégate',
                'img' => 'fregate',
                'family' => $this->getReference("capitainePirate"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Fuco',
                'img' => 'fuco',
                'family' => $this->getReference("liche"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Galion',
                'img' => 'galleon',
                'family' => $this->getReference("capitainePirate"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Garo',
                'img' => 'garo',
                'family' => $this->getReference("ninja"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Gemini',
                'img' => 'gemini',
                'family' => $this->getReference("brownieMagicien"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Jin',
                'img' => 'gin',
                'family' => $this->getReference("ninja"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Grego',
                'img' => 'grego',
                'family' => $this->getReference("liche"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Halphas',
                'img' => 'halphas',
                'family' => $this->getReference("liche"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Harmonia',
                'img' => 'harmonia',
                'family' => $this->getReference("joueuseDeHarpe"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Hraesvelg',
                'img' => 'hraesvelg',
                'family' => $this->getReference("roiBarbare"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Hrungnir',
                'img' => 'hrungnir',
                'family' => $this->getReference("roiBarbare"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Hwa',
                'img' => 'hwa',
                'family' => $this->getReference("rakshasa"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Hwadam',
                'img' => 'hwadam',
                'family' => $this->getReference("taoiste"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Icarès',
                'img' => 'icares',
                'family' => $this->getReference("sylphide"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Illiana',
                'img' => 'illiana',
                'family' => $this->getReference("agentNeostone"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Imesety',
                'img' => 'imesety',
                'family' => $this->getReference("horus"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Iris',
                'img' => 'iris',
                'family' => $this->getReference("chevalierMagique"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Khmun',
                'img' => 'khmun',
                'family' => $this->getReference("anubis"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Lanett',
                'img' => 'lanett',
                'family' => $this->getReference("chevalierMagique"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lapis',
                'img' => 'lapis',
                'family' => $this->getReference("chevalierMagique"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Liebli',
                'img' => 'liebli',
                'family' => $this->getReference("joker"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lisa',
                'img' => 'lisa',
                'family' => $this->getReference("agentNeostone"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Liu Mei',
                'img' => 'liumei',
                'family' => $this->getReference("kungfuGirl"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Lucas',
                'img' => 'lucas',
                'family' => $this->getReference("combattantNeostone"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Lumirécia',
                'img' => 'lumirecia',
                'family' => $this->getReference("sylphide"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Lushen',
                'img' => 'lushen',
                'family' => $this->getReference("joker"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Martina',
                'img' => 'martina',
                'family' => $this->getReference("guerriereAuBoomerang"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Maruna',
                'img' => 'maruna',
                'family' => $this->getReference("guerriereAuBoomerang"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Melissa',
                'img' => 'melissa',
                'family' => $this->getReference("danseuseAuxChakrams"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Mihyang',
                'img' => 'mihyang',
                'family' => $this->getReference("danseuseDuCiel"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Mimirr',
                'img' => 'mimirr',
                'family' => $this->getReference("roiBarbare"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Monte',
                'img' => 'monte',
                'family' => $this->getReference("maitreDesDes"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Morris',
                'img' => 'morris',
                'family' => $this->getReference("maitreDesDes"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Orion',
                'img' => 'orion',
                'family' => $this->getReference("brownieMagicien"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Qebehsenuef',
                'img' => 'qebehsenuef',
                'family' => $this->getReference("horus"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Reno',
                'img' => 'reno',
                'family' => $this->getReference("maitreDesDes"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Rigel',
                'img' => 'rigel',
                'family' => $this->getReference("liche"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sabrina',
                'img' => 'sabrina',
                'family' => $this->getReference("guerriereAuBoomerang"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shaina',
                'img' => 'shaina',
                'family' => $this->getReference("danseuseAuxChakrams"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Sige',
                'img' => 'sige',
                'family' => $this->getReference("samourai"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Skogul',
                'img' => 'skogul',
                'family' => $this->getReference("guerrierGeant"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Stella',
                'img' => 'stella',
                'family' => $this->getReference("assassin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Susanoo',
                'img' => 'susanoo',
                'family' => $this->getReference("ninja"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Talia',
                'img' => 'talia',
                'family' => $this->getReference("danseuseAuxChakrams"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Trasar',
                'img' => 'trasar',
                'family' => $this->getReference("guerrierGeant"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Trevor',
                'img' => 'trevor',
                'family' => $this->getReference("combattantNeostone"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Triana',
                'img' => 'triana',
                'family' => $this->getReference("joueuseDeHarpe"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tyron',
                'img' => 'tyron',
                'family' => $this->getReference("sylphe"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Verdehile',
                'img' => 'verdehile',
                'family' => $this->getReference("vampire"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Xiao Lin',
                'img' => 'xiaolin',
                'family' => $this->getReference("kungfuGirl"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Dias',
                'img' => 'dias',
                'family' => $this->getReference("chevalierDeLaMort"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Clara',
                'img' => 'clara',
                'family' => $this->getReference("pierrette"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Arnold',
                'img' => 'arnold',
                'family' => $this->getReference("chevalierDeLaMort"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Yen',
                'img' => 'yen',
                'family' => $this->getReference("rakshasa"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Refroidissement',
                'img' => 'refroidissement',
                'family' => $this->getReference("citrouille"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Covenant',
                'img' => 'covenant',
                'family' => $this->getReference("sniper"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Deva',
                'img' => 'deva',
                'family' => $this->getReference("danseuseAuxChakrams"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Olivia',
                'img' => 'olivia',
                'family' => $this->getReference("agentNeostone"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Zenobia',
                'img' => 'zenobia',
                'family' => $this->getReference("guerriereAuBoomerang"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Izaria',
                'img' => 'izaria',
                'family' => $this->getReference("succube"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Julie',
                'img' => 'julie',
                'family' => $this->getReference("pierrette"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Betta',
                'img' => 'betta',
                'family' => $this->getReference("sirene"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Isael',
                'img' => 'isael',
                'family' => $this->getReference("succube"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kamiya',
                'img' => 'kamiya',
                'family' => $this->getReference("kitsune"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Malite',
                'img' => 'malite',
                'family' => $this->getReference("gargouille"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Molly',
                'img' => 'molly',
                'family' => $this->getReference("sirene"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Platy',
                'img' => 'platy',
                'family' => $this->getReference("sirene"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Einheri',
                'img' => 'einheri',
                'family' => $this->getReference("guerrierGeant"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Arang',
                'img' => 'arang',
                'family' => $this->getReference("kitsune"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Borsalino',
                'img' => 'borsalino',
                'family' => $this->getReference("chevalierDeLaMort"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Briand',
                'img' => 'briand',
                'family' => $this->getReference("chevalierDeLaMort"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Emma',
                'img' => 'emma',
                'family' => $this->getReference("agentNeostone"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Hwahee',
                'img' => 'hwahee',
                'family' => $this->getReference("danseuseDuCiel"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Isabelle',
                'img' => 'isabelle',
                'family' => $this->getReference("assassin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Malaka',
                'img' => 'malaka',
                'family' => $this->getReference("koboldBomber"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shihwa',
                'img' => 'shihwa',
                'family' => $this->getReference("kitsune"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Taurus',
                'img' => 'taurus',
                'family' => $this->getReference("koboldBomber"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tetra',
                'img' => 'tetra',
                'family' => $this->getReference("sirene"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Luna',
                'img' => 'luna',
                'family' => $this->getReference("pierrette"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Karl',
                'img' => 'karl',
                'family' => $this->getReference("combattantNeostone"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Sonnet',
                'img' => 'sonnet',
                'family' => $this->getReference("joueuseDeHarpe"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Jean',
                'img' => 'jean',
                'family' => $this->getReference("voleurFantome"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Brumeux',
                'img' => 'brumeux',
                'family' => $this->getReference("citrouille"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Atenai',
                'img' => 'atenai',
                'family' => $this->getReference("ondine"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Mihael',
                'img' => 'mihael',
                'family' => $this->getReference("sylphide"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Korona',
                'img' => 'korona',
                'family' => $this->getReference("brownieMagicien"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Ludo',
                'img' => 'ludo',
                'family' => $this->getReference("maitreDesDes"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Guillaume',
                'img' => 'guillaume',
                'family' => $this->getReference("voleurFantome"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Aschubel',
                'img' => 'aschubel',
                'family' => $this->getReference("sylphe"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Isillen',
                'img' => 'isillen',
                'family' => $this->getReference("elfePatrouilleur"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Eredas',
                'img' => 'eredas',
                'family' => $this->getReference("sylphe"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Figaro',
                'img' => 'figaro',
                'family' => $this->getReference("joker"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Shimitae',
                'img' => 'shimitae',
                'family' => $this->getReference("sylphe"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Raviti',
                'img' => 'raviti',
                'family' => $this->getReference("harg"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Orochi',
                'img' => 'orochi',
                'family' => $this->getReference("ninja"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ran',
                'img' => 'ran',
                'family' => $this->getReference("rakshasa"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Louis',
                'img' => 'louis',
                'family' => $this->getReference("voleurFantome"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Iunu',
                'img' => 'iunu',
                'family' => $this->getReference("anubis"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Bailey',
                'img' => 'bailey',
                'family' => $this->getReference("guerriereAuBoomerang"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Belita',
                'img' => 'belita',
                'family' => $this->getReference("danseuseAuxChakrams"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Emily',
                'img' => 'emily',
                'family' => $this->getReference("cannonGirl"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Aquila',
                'img' => 'aquila',
                'family' => $this->getReference("brownieMagicien"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Avaris',
                'img' => 'avaris',
                'family' => $this->getReference("anubis"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Icasha',
                'img' => 'icasha',
                'family' => $this->getReference("ondine"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Julien',
                'img' => 'julien',
                'family' => $this->getReference("voleurFantome"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Natalie',
                'img' => 'natalie',
                'family' => $this->getReference("assassin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Nisha',
                'img' => 'nisha',
                'family' => $this->getReference("dryade"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Soha',
                'img' => 'soha',
                'family' => $this->getReference("kitsune"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Tanya',
                'img' => 'tanya',
                'family' => $this->getReference("assassin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Liesel',
                'img' => 'liesel',
                'family' => $this->getReference("vampire"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Argen',
                'img' => 'argen',
                'family' => $this->getReference("vampire"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Lexy',
                'img' => 'lexy',
                'family' => $this->getReference("assassin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Gildong',
                'img' => 'gildong',
                'family' => $this->getReference("taoiste"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Fria',
                'img' => 'fria',
                'family' => $this->getReference("sylphide"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Jun',
                'img' => 'jun',
                'family' => $this->getReference("samourai"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Kaito',
                'img' => 'kaito',
                'family' => $this->getReference("samourai"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Kaz',
                'img' => 'kaz',
                'family' => $this->getReference("samourai"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sian',
                'img' => 'sian',
                'family' => $this->getReference("joker"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Surtr',
                'img' => 'surtr',
                'family' => $this->getReference("roiBarbare"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Tosi',
                'img' => 'tosi',
                'family' => $this->getReference("samourai"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Zibrolta',
                'img' => 'zibrolta',
                'family' => $this->getReference("koboldBomber"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Jojo',
                'img' => 'jojo',
                'family' => $this->getReference("joker"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Logan',
                'img' => 'logan',
                'family' => $this->getReference("combattantNeostone"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ryan',
                'img' => 'ryan',
                'family' => $this->getReference("combattantNeostone"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Herne',
                'img' => 'herne',
                'family' => $this->getReference("dryade"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Hyanes',
                'img' => 'hyanes',
                'family' => $this->getReference("dryade"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Mellia',
                'img' => 'mellia',
                'family' => $this->getReference("dryade"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tablo',
                'img' => 'tablo',
                'family' => $this->getReference("maitreDesDes"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/'.$fourStar['img'].'.png');
            if(isset($fourStar['family'])){
                $mon->setMonsterFamily($fourStar['family']);
            }
            if(isset($fourStar['element'])){
                $mon->setElement($fourStar['element']);
            }
            $manager->persist($mon);
        }

        $fiveStars = [
            [
                'name' => 'Akhamamir',
                'img' => 'akhamamir',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Alexandra',
                'img' => 'alexandra',
                'family' => $this->getReference("licorne"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Amelia',
                'img' => 'amelia',
                'family' => $this->getReference("licorne"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Anavel',
                'img' => 'anavel',
                'family' => $this->getReference("filleOcculte"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Ariel',
                'img' => 'ariel',
                'family' => $this->getReference("archange"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Baleygr',
                'img' => 'baleygr',
                'family' => $this->getReference("empereurDesFoudres"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Barbara',
                'img' => 'barbara',
                'family' => $this->getReference("chasseresseAuFauve"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Bastet',
                'img' => 'bastet',
                'family' => $this->getReference("reineDuDesert"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Bellenus',
                'img' => 'bellenus',
                'family' => $this->getReference("druide"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Beth',
                'img' => 'beth',
                'family' => $this->getReference("dameDeLenfer"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Brandia',
                'img' => 'brandia',
                'family' => $this->getReference("reinePolaire"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Camille',
                'img' => 'camille',
                'family' => $this->getReference("valkyrie"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Chandra',
                'img' => 'chandra',
                'family' => $this->getReference("moineBestial"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Charlotte',
                'img' => 'charlotte',
                'family' => $this->getReference("filleOcculte"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Chiwu',
                'img' => 'chiwu',
                'family' => $this->getReference("pionnier"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Chow',
                'img' => 'chow',
                'family' => $this->getReference("chevalierDragon"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Daphnis',
                'img' => 'daphnis',
                'family' => $this->getReference("roiDesFees"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Diana',
                'img' => 'diana',
                'family' => $this->getReference("licorne"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Eirgar',
                'img' => 'eirgar',
                'family' => $this->getReference("seigneurVampire"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Eladriel',
                'img' => 'eladriel',
                'family' => $this->getReference("archange"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Eleanor',
                'img' => 'eleanor',
                'family' => $this->getReference("licorne"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Elenoa',
                'img' => 'elenoa',
                'family' => $this->getReference("reinePolaire"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Ethna',
                'img' => 'ethna',
                'family' => $this->getReference("dameDeLenfer"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Feng Yan',
                'img' => 'fengyan',
                'family' => $this->getReference("guerrierPanda"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ganymède',
                'img' => 'ganymede',
                'family' => $this->getReference("roiDesFees"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Han',
                'img' => 'han',
                'family' => $this->getReference("ninja"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Helena',
                'img' => 'helena',
                'family' => $this->getReference("licorne"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Herteit',
                'img' => 'herteit',
                'family' => $this->getReference("empereurDesFoudres"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jaara',
                'img' => 'jaara',
                'family' => $this->getReference("phenix"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jamire',
                'img' => 'jamire',
                'family' => $this->getReference("dragon"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Jeanne',
                'img' => 'jeanne',
                'family' => $this->getReference("paladin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Joséphine',
                'img' => 'josephine',
                'family' => $this->getReference("paladin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Juno',
                'img' => 'juno',
                'family' => $this->getReference("oracle"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Katarina',
                'img' => 'katarina',
                'family' => $this->getReference("valkyrie"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Kumar',
                'img' => 'kumar',
                'family' => $this->getReference("moineBestial"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Lagmaron',
                'img' => 'lagmaron',
                'family' => $this->getReference("chimere"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Laika',
                'img' => 'laika',
                'family' => $this->getReference("chevalierDragon"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Leo',
                'img' => 'leo',
                'family' => $this->getReference("chevalierDragon"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Lora',
                'img' => 'lora',
                'family' => $this->getReference("filleOcculte"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Mephisto',
                'img' => 'mephisto',
                'family' => $this->getReference("demon"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Mei Hou Wang',
                'img' => 'mhw',
                'family' => $this->getReference("roiSinge"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Mi Ying',
                'img' => 'miying',
                'family' => $this->getReference("guerrierPanda"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Mo Long',
                'img' => 'molong',
                'family' => $this->getReference("guerrierPanda"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Nicki',
                'img' => 'nicki',
                'family' => $this->getReference("filleOcculte"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Odin',
                'img' => 'odin',
                'family' => $this->getReference("empereurDesFoudres"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Okéanos',
                'img' => 'okeanos',
                'family' => $this->getReference("empereurDeLaMer"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Ophélia',
                'img' => 'ophelia',
                'family' => $this->getReference("paladin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Perna',
                'img' => 'perna',
                'family' => $this->getReference("phenix"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Poséidon',
                'img' => 'poseidon',
                'family' => $this->getReference("empereurDeLaMer"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Praha',
                'img' => 'praha',
                'family' => $this->getReference("oracle"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Psamathe',
                'img' => 'psamathe',
                'family' => $this->getReference("roiDesFees"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Pung Baek',
                'img' => 'pungbaek',
                'family' => $this->getReference("pionnier"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Qitian Dasheng',
                'img' => 'qitiandasheng',
                'family' => $this->getReference("roiSinge"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Rakan',
                'img' => 'rakan',
                'family' => $this->getReference("chimere"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Raki',
                'img' => 'raki',
                'family' => $this->getReference("dameDeLenfer"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Rica',
                'img' => 'rica',
                'family' => $this->getReference("filleOcculte"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Ritesh',
                'img' => 'ritesh',
                'family' => $this->getReference("moineBestial"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Savannah',
                'img' => 'savannah',
                'family' => $this->getReference("chasseresseAuFauve"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Seara',
                'img' => 'seara',
                'family' => $this->getReference("oracle"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shazam',
                'img' => 'shazam',
                'family' => $this->getReference("moineBestial"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Shi Hou',
                'img' => 'shihou',
                'family' => $this->getReference("roiSinge"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Sigmarus',
                'img' => 'sigmarus',
                'family' => $this->getReference("phenix"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taor',
                'img' => 'taor',
                'family' => $this->getReference("chimere"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taranys',
                'img' => 'taranys',
                'family' => $this->getReference("druide"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tesarion',
                'img' => 'tesarion',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Teshar',
                'img' => 'teshar',
                'family' => $this->getReference("phenix"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Theomars',
                'img' => 'theomars',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Tiana',
                'img' => 'tiana',
                'family' => $this->getReference("reinePolaire"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tian Lang',
                'img' => 'tianlang',
                'family' => $this->getReference("guerrierPanda"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Vanessa',
                'img' => 'vanessa',
                'family' => $this->getReference("valkyrie"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Velajuel',
                'img' => 'velajuel',
                'family' => $this->getReference("archange"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Veromos',
                'img' => 'veromos',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Woonsa',
                'img' => 'woonsa',
                'family' => $this->getReference("pionnier"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Woosa',
                'img' => 'woosa',
                'family' => $this->getReference("pionnier"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Xiong Fei',
                'img' => 'xf',
                'family' => $this->getReference("guerrierPanda"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Zaiross',
                'img' => 'zaiross',
                'family' => $this->getReference("dragon"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Wedjat',
                'img' => 'wedjat',
                'family' => $this->getReference("horus"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Bolverk',
                'img' => 'bolverk',
                'family' => $this->getReference("empereurDesFoudres"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Alicia',
                'img' => 'alicia',
                'family' => $this->getReference("reinePolaire"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Zeratu',
                'img' => 'zeratu',
                'family' => $this->getReference("chimere"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Celia',
                'img' => 'celia',
                'family' => $this->getReference("joueuseDeHarpe"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Triton',
                'img' => 'triton',
                'family' => $this->getReference("empereurDeLaMer"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sekhmet',
                'img' => 'sekhmet',
                'family' => $this->getReference("reineDuDesert"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Akroma',
                'img' => 'akroma',
                'family' => $this->getReference("valkyrie"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Eludia',
                'img' => 'eludia',
                'family' => $this->getReference("phenix"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Grogen',
                'img' => 'grogen',
                'family' => $this->getReference("dragon"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Jager',
                'img' => 'jager',
                'family' => $this->getReference("chevalierDragon"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Leona',
                'img' => 'leona',
                'family' => $this->getReference("paladin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Louise',
                'img' => 'louise',
                'family' => $this->getReference("paladin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Lydia',
                'img' => 'lydia',
                'family' => $this->getReference("reinePolaire"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Poupée de chiffon',
                'img' => 'ragdoll',
                'family' => $this->getReference("chevalierDragon"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Shan',
                'img' => 'shan',
                'family' => $this->getReference("chimere"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Trinité',
                'img' => 'trinite',
                'family' => $this->getReference("valkyrie"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Verad',
                'img' => 'verad',
                'family' => $this->getReference("dragon"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Zerath',
                'img' => 'zerath',
                'family' => $this->getReference("dragon"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Xing Zhe',
                'img' => 'xingzhe',
                'family' => $this->getReference("roiSinge"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Lucifer',
                'img' => 'lucifer',
                'family' => $this->getReference("demon"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Bella',
                'img' => 'bella',
                'family' => $this->getReference("cannonGirl"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Christina',
                'img' => 'christina',
                'family' => $this->getReference("cannonGirl"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Bael',
                'img' => 'bael',
                'family' => $this->getReference("demon"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Belial',
                'img' => 'belial',
                'family' => $this->getReference("demon"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Belzébuth',
                'img' => 'belzebuth',
                'family' => $this->getReference("demon"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Abellio',
                'img' => 'abellio',
                'family' => $this->getReference("druide"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Artamiel',
                'img' => 'artamiel',
                'family' => $this->getReference("archange"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Asima',
                'img' => 'asima',
                'family' => $this->getReference("dameDeLenfer"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Craka',
                'img' => 'craka',
                'family' => $this->getReference("dameDeLenfer"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Fermion',
                'img' => 'fermion',
                'family' => $this->getReference("archange"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Pater',
                'img' => 'pater',
                'family' => $this->getReference("druide"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Valantis',
                'img' => 'valantis',
                'family' => $this->getReference("druide"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Geldnir',
                'img' => 'geldnir',
                'family' => $this->getReference("empereurDesFoudres"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Giana',
                'img' => 'giana',
                'family' => $this->getReference("oracle"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Hathor',
                'img' => 'hathor',
                'family' => $this->getReference("reineDuDesert"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Isis',
                'img' => 'isis',
                'family' => $this->getReference("reineDuDesert"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Laima',
                'img' => 'laima',
                'family' => $this->getReference("oracle"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Mannanan',
                'img' => 'mannanan',
                'family' => $this->getReference("empereurDeLaMer"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Masha',
                'img' => 'masha',
                'family' => $this->getReference("chasseresseAuFauve"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Narsha',
                'img' => 'narsha',
                'family' => $this->getReference("chasseresseAuFauve"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Nephthys',
                'img' => 'nephthys',
                'family' => $this->getReference("reineDuDesert"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Nigong',
                'img' => 'nigong',
                'family' => $this->getReference("pionnier"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Obéron',
                'img' => 'oberon',
                'family' => $this->getReference("roiDesFees"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Pontos',
                'img' => 'pontos',
                'family' => $this->getReference("empereurDeLaMer"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Rahul',
                'img' => 'rahul',
                'family' => $this->getReference("moineBestial"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Son Zhang Lao',
                'img' => 'son_zhang_lao',
                'family' => $this->getReference("roiSinge"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Vivachel',
                'img' => 'vivachel',
                'family' => $this->getReference("joueuseDeHarpe"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Xiana',
                'img' => 'xiana',
                'family' => $this->getReference("chasseresseAuFauve"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Thebae',
                'img' => 'thebae',
                'family' => $this->getReference("anubis"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Julianne',
                'img' => 'julianne',
                'family' => $this->getReference("vampire"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Cadiz',
                'img' => 'cadiz',
                'family' => $this->getReference("vampire"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Sylvia',
                'img' => 'sylvia',
                'family' => $this->getReference("agentNeostone"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Yeonhong',
                'img' => 'yeonhong',
                'family' => $this->getReference("danseuseDuCiel"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Wolhyung',
                'img' => 'wolhyung',
                'family' => $this->getReference("danseuseDuCiel"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Nyx',
                'img' => 'nyx',
                'family' => $this->getReference("roiDesFees"),
                'element' => $this->getReference("ELEM_DARK")
            ],
        ];

        foreach ($fiveStars as $fiveStar) {
            $mon = new Monster();
            $mon->setName($fiveStar['name'])->setImage('/img/5nat/'.$fiveStar['img'].'.png');
            if(isset($fiveStar['family'])){
                $mon->setMonsterFamily($fiveStar['family']);
            }
            if(isset($fiveStar['element'])){
                $mon->setElement($fiveStar['element']);
            }
            $manager->persist($mon);
        }

        $secondAwakes = [
            [
                'name' => 'Belladeon',
                'img' => 'belladeon',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Camaryn',
                'img' => 'camaryn',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Dagora',
                'img' => 'dagora',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Eilene',
                'img' => 'eilene',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Elucia',
                'img' => 'elucia',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Eshir',
                'img' => 'eshir',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Gorgo',
                'img' => 'gorgo',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Icaru',
                'img' => 'icaru',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Iselia',
                'img' => 'iselia',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Jultan',
                'img' => 'jultan',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kro',
                'img' => 'kro',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lusha',
                'img' => 'lusha',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Mei',
                'img' => 'mei',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Miho',
                'img' => 'miho',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Mina',
                'img' => 'mina',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Naomie',
                'img' => 'naomie',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ramagos',
                'img' => 'ramagos',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ramahan',
                'img' => 'ramahan',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Raoq',
                'img' => 'raoq',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Shakan',
                'img' => 'shakan',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tatu',
                'img' => 'tatu',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Ursha',
                'img' => 'ursha',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Vigor',
                'img' => 'vigor',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Cheryl',
                'img' => 'cheryl',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Kacie',
                'img' => 'kacey',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Neal',
                'img' => 'neal',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Sorin',
                'img' => 'sorin',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Garoche',
                'img' => 'garoche',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Xiao Ling',
                'img' => 'xiaoling',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($secondAwakes as $secondAwake) {
            $mon = new Monster();
            $mon->setName($secondAwake['name'].' 2A')->setImage('/img/2a/'.$secondAwake['img'].'.png');
            if(isset($secondAwake['family'])){
                $mon->setMonsterFamily($secondAwake['family']);
            }
            if(isset($secondAwake['element'])){
                $mon->setElement($secondAwake['element']);
            }
            $manager->persist($mon);
        }

        $homies = [
            [
                'name' => 'Eau',
                'img' => 'water',
                'family' => $this->getReference("homonculus"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Feu',
                'img' => 'fire',
                'family' => $this->getReference("homonculus"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Vent',
                'img' => 'wind',
                'family' => $this->getReference("homonculus"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Light',
                'img' => 'light',
                'family' => $this->getReference("homonculus"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Dark',
                'img' => 'dark',
                'family' => $this->getReference("homonculus"),
                'element' => $this->getReference("ELEM_DARK")
            ],
        ];

        foreach ($homies as $homie) {
            $mon = new Monster();
            $mon->setName('Homunculus ' . $homie['name'])->setImage('/img/homie/'.$homie['img'].'.png');
            if(isset($homie['family'])){
                $mon->setMonsterFamily($homie['family']);
            }
            if(isset($homie['element'])){
                $mon->setElement($homie['element']);
            }
            $manager->persist($mon);
        }

        $manager->flush();

    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}
