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
            [
                'name' => 'Astar',
                'img' => 'astar',
                'family' => $this->getReference("chevalierMagique"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Lupinus',
                'img' => 'lupinus',
                'family' => $this->getReference("chevalierMagique"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Barque',
                'img' => 'barque',
                'family' => $this->getReference("capitainePirate"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Brick',
                'img' => 'brick',
                'family' => $this->getReference("capitainePirate"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Caraque',
                'img' => 'caraque',
                'family' => $this->getReference("capitainePirate"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Carcano',
                'img' => 'carcano',
                'family' => $this->getReference("sniper"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Carabine',
                'img' => 'carabine',
                'family' => $this->getReference("sniper"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Dragunov',
                'img' => 'dragunov',
                'family' => $this->getReference("sniper"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Magnum',
                'img' => 'magnum',
                'family' => $this->getReference("sniper"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Cichlid',
                'img' => 'cichlid',
                'family' => $this->getReference("sirene"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Conrad',
                'img' => 'conrad',
                'family' => $this->getReference("chevalierDeLaMort"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Duamutef',
                'img' => 'duamutef',
                'family' => $this->getReference("horus"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Fumée',
                'img' => 'fumee',
                'family' => $this->getReference("citrouille"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Poussiéreux',
                'img' => 'poussiereux',
                'family' => $this->getReference("citrouille"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Venteux',
                'img' => 'venteux',
                'family' => $this->getReference("citrouille"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sophia',
                'img' => 'sophia',
                'family' => $this->getReference("pierrette"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ling Ling',
                'img' => 'lingling',
                'family' => $this->getReference("kungfuGirl"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Hong Hua',
                'img' => 'honghua',
                'family' => $this->getReference("kungfuGirl"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Kunite',
                'img' => 'kunite',
                'family' => $this->getReference("gargouille"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Onyx',
                'img' => 'onyx',
                'family' => $this->getReference("gargouille"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Phenaka',
                'img' => 'phenaka',
                'family' => $this->getReference("gargouille"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Tanzaite',
                'img' => 'tanzaite',
                'family' => $this->getReference("gargouille"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Mikene',
                'img' => 'mikene',
                'family' => $this->getReference("ondine"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Tilasha',
                'img' => 'tilasha',
                'family' => $this->getReference("ondine"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Chamie',
                'img' => 'chamie',
                'family' => $this->getReference("kitsune"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Pang',
                'img' => 'pang',
                'family' => $this->getReference("rakshasa"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Su',
                'img' => 'su',
                'family' => $this->getReference("rakshasa"),
                'element' => $this->getReference("ELEM_WATER")
            ],
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
            [
                'name' => 'Iona',
                'img' => 'iona',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_LIGHT")
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