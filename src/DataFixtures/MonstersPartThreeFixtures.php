<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class MonstersPartThreeFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $threeStars = [
            [
                'name' => 'Fairo',
                'img' => 'fairo',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Pigma',
                'img' => 'pigma',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shaffron',
                'img' => 'shaffron',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Loque',
                'img' => 'loque',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Geoffrey',
                'img' => 'geoffrey',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Fami',
                'img' => 'fami',
                'family' => $this->getReference("archerMagiquePromo"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
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
            [
                'name' => 'Lucasha',
                'img' => 'lucasha',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Calicus',
                'img' => 'calicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Cassie',
                'img' => 'cassie',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Gina',
                'img' => 'gina',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Linda',
                'img' => 'linda',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Silia',
                'img' => 'silia',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Rebecca',
                'img' => 'rebecca',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Prom',
                'img' => 'prom',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Rumicus',
                'img' => 'rumicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Elpuria',
                'img' => 'elpuria',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Kai\'en',
                'img' => 'kaien',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Michelle',
                'img' => 'michelle',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Rachid',
                'img' => 'rachid',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_DARK")
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

            $id = $threeStar['family']->getId() . "1" . $threeStar['element']->getId();
            $mon->setId($id);
            $manager->persist($mon);

            $metadata = $manager->getClassMetaData(get_class($mon));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
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