<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartFiveFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
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
            [
                'name' => 'Elsharion',
                'img' => 'elsharion',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Hanwul',
                'img' => 'hanwul',
                'family' => $this->getReference("peintre"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Jeogul',
                'img' => 'jeogul',
                'family' => $this->getReference("peintre"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Haegang',
                'img' => 'haegang',
                'family' => $this->getReference("peintre"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Cheongpung',
                'img' => 'cheongpung',
                'family' => $this->getReference("peintre"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Mookwol',
                'img' => 'mookwol',
                'family' => $this->getReference("peintre"),
                'element' => $this->getReference("ELEM_DARK")
            ],
        ];

        foreach ($fiveStars as $fiveStar) {
            $mon = new Monster();
            $mon->setName($fiveStar['name'])->setImage('/img/5nat/'.$fiveStar['img'].'.png')->setNaturalStars(5);
            if(isset($fiveStar['family'])){
                $mon->setMonsterFamily($fiveStar['family']);
            }
            if(isset($fiveStar['element'])){
                $mon->setElement($fiveStar['element']);
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
            $mon->setName('Homunculus ' . $homie['name'])->setImage('/img/homie/'.$homie['img'].'.png')->setNaturalStars(5);
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