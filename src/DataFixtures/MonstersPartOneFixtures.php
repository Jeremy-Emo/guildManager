<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MonstersPartOneFixtures extends Fixture implements FixtureGroupInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load($manager)
    {
        $twoStars = [
            [
                'name' => 'Colleen',
                'img' => 'colleen',
            ],
            [
                'name' => 'Konamiya',
                'img' => 'konamiya',
            ],
            [
                'name' => 'Lulu',
                'img' => 'lulu',
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
            ],
            [
                'name' => 'Sieq',
                'img' => 'sieq',
            ],
            [
                'name' => 'Tarq',
                'img' => 'tarq',
            ],
            [
                'name' => 'Taru',
                'img' => 'taru',
            ],
        ];

        foreach ($twoStars as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/'.$twoStar['img'].'.png');
            $manager->persist($mon);
        }

        $threeStars = [
            [
                'name' => 'Ardella',
                'img' => 'ardella',
            ],
            [
                'name' => 'Belladeon',
                'img' => 'belladeon',
            ],
            [
                'name' => 'Bernard',
                'img' => 'bernard',
            ],
            [
                'name' => 'Bulldozer',
                'img' => 'bulldozer',
            ],
            [
                'name' => 'Cuivre',
                'img' => 'cuivre',
            ],
            [
                'name' => 'Darion',
                'img' => 'darion',
            ],
            [
                'name' => 'Fran',
                'img' => 'fran',
            ],
            [
                'name' => 'Groggo',
                'img' => 'groggo',
            ],
            [
                'name' => 'Loren',
                'img' => 'loren',
            ],
            [
                'name' => 'Lyn',
                'img' => 'lyn',
            ],
            [
                'name' => 'Mav',
                'img' => 'mav',
            ],
            [
                'name' => 'Megan',
                'img' => 'megan',
            ],
            [
                'name' => 'Racuni',
                'img' => 'racuni',
            ],
            [
                'name' => 'Rina',
                'img' => 'rina',
            ],
            [
                'name' => 'Spectra',
                'img' => 'spectra',
            ],
            [
                'name' => 'Tracteur',
                'img' => 'tracteur',
            ],
            [
                'name' => 'Kahli',
                'img' => 'kahli',
            ],
            [
                'name' => 'Mantura',
                'img' => 'mantura',
            ],
            [
                'name' => 'Thrain',
                'img' => 'thrain',
            ],
            [
                'name' => 'Basalt',
                'img' => 'basalt',
            ],
            [
                'name' => 'Jubelle',
                'img' => 'jubelle',
            ],
            [
                'name' => 'Teon',
                'img' => 'teon',
            ],
            [
                'name' => 'Adrian',
                'img' => 'adrian',
            ],
            [
                'name' => 'Glinodon',
                'img' => 'glinodon',
            ],
            [
                'name' => 'Hellea',
                'img' => 'hellea',
            ],
            [
                'name' => 'Kabilla',
                'img' => 'kabilla',
            ],
        ];

        foreach ($threeStars as $treeStar) {
            $mon = new Monster();
            $mon->setName($treeStar['name'])->setImage('/img/3nat/'.$treeStar['img'].'.png');
            $manager->persist($mon);
        }

        $fourStars = [
            [
                'name' => 'Abigail',
                'img' => 'abigail',
            ],
            [
                'name' => 'Acasis',
                'img' => 'acasis',
            ],
            [
                'name' => 'Aegir',
                'img' => 'aegir',
            ],
            [
                'name' => 'Amarna',
                'img' => 'amarna',
            ],
            [
                'name' => 'Amduat',
                'img' => 'amduat',
            ],
            [
                'name' => 'Antarès',
                'img' => 'antares',
            ],
            [
                'name' => 'Aria',
                'img' => 'aria',
            ],
            [
                'name' => 'Baretta',
                'img' => 'baretta',
            ],
            [
                'name' => 'Bethony',
                'img' => 'bethony',
            ],
            [
                'name' => 'Chasun',
                'img' => 'chasun',
            ],
            [
                'name' => 'Chloe',
                'img' => 'chloe',
            ],
            [
                'name' => 'Delphoi',
                'img' => 'delphoi',
            ],
            [
                'name' => 'Dover',
                'img' => 'dover',
            ],
            [
                'name' => 'Draco',
                'img' => 'draco',
            ],
            [
                'name' => 'Eva',
                'img' => 'eva',
            ],
            [
                'name' => 'Fei',
                'img' => 'fei',
            ],
            [
                'name' => 'Férelia',
                'img' => 'felleria',
            ],
            [
                'name' => 'Frégate',
                'img' => 'fregate',
            ],
            [
                'name' => 'Fuco',
                'img' => 'fuco',
            ],
            [
                'name' => 'Galion',
                'img' => 'galleon',
            ],
            [
                'name' => 'Garo',
                'img' => 'garo',
            ],
            [
                'name' => 'Gemini',
                'img' => 'gemini',
            ],
            [
                'name' => 'Gin',
                'img' => 'gin',
            ],
            [
                'name' => 'Grego',
                'img' => 'grego',
            ],
            [
                'name' => 'Halphas',
                'img' => 'halphas',
            ],
            [
                'name' => 'Harmonia',
                'img' => 'harmonia',
            ],
            [
                'name' => 'Hraesvelg',
                'img' => 'hraesvelg',
            ],
            [
                'name' => 'Hrungnir',
                'img' => 'hrungnir',
            ],
            [
                'name' => 'Hwa',
                'img' => 'hwa',
            ],
            [
                'name' => 'Hwadam',
                'img' => 'hwadam',
            ],
            [
                'name' => 'Icarès',
                'img' => 'icares',
            ],
            [
                'name' => 'Illiana',
                'img' => 'illiana',
            ],
            [
                'name' => 'Imesety',
                'img' => 'imesety',
            ],
            [
                'name' => 'Iris',
                'img' => 'iris',
            ],
            [
                'name' => 'Khmun',
                'img' => 'khmun',
            ],
            [
                'name' => 'Lanett',
                'img' => 'lanett',
            ],
            [
                'name' => 'Lapis',
                'img' => 'lapis',
            ],
            [
                'name' => 'Liebli',
                'img' => 'liebli',
            ],
            [
                'name' => 'Lisa',
                'img' => 'lisa',
            ],
            [
                'name' => 'Liu Mei',
                'img' => 'liumei',
            ],
            [
                'name' => 'Lucas',
                'img' => 'lucas',
            ],
            [
                'name' => 'Lumirécia',
                'img' => 'lumirecia',
            ],
            [
                'name' => 'Lushen',
                'img' => 'lushen',
            ],
            [
                'name' => 'Martina',
                'img' => 'martina',
            ],
            [
                'name' => 'Maruna',
                'img' => 'maruna',
            ],
            [
                'name' => 'Melissa',
                'img' => 'melissa',
            ],
            [
                'name' => 'Mihyang',
                'img' => 'mihyang',
            ],
            [
                'name' => 'Mimir',
                'img' => 'mimir',
            ],
            [
                'name' => 'Monte',
                'img' => 'monte',
            ],
            [
                'name' => 'Morris',
                'img' => 'morris',
            ],
            [
                'name' => 'Orion',
                'img' => 'orion',
            ],
            [
                'name' => 'Qebehsenuef',
                'img' => 'qebehsenuef',
            ],
            [
                'name' => 'Reno',
                'img' => 'reno',
            ],
            [
                'name' => 'Rigel',
                'img' => 'rigel',
            ],
            [
                'name' => 'Sabrina',
                'img' => 'sabrina',
            ],
            [
                'name' => 'Shaina',
                'img' => 'shaina',
            ],
            [
                'name' => 'Sige',
                'img' => 'sige',
            ],
            [
                'name' => 'Skogul',
                'img' => 'skogul',
            ],
            [
                'name' => 'Stella',
                'img' => 'stella',
            ],
            [
                'name' => 'Susanoo',
                'img' => 'susanoo',
            ],
            [
                'name' => 'Talia',
                'img' => 'talia',
            ],
            [
                'name' => 'Trasar',
                'img' => 'trasar',
            ],
            [
                'name' => 'Trevor',
                'img' => 'trevor',
            ],
            [
                'name' => 'Triana',
                'img' => 'triana',
            ],
            [
                'name' => 'Tyron',
                'img' => 'tyron',
            ],
            [
                'name' => 'Verdehile',
                'img' => 'verdehile',
            ],
            [
                'name' => 'Xiao Lin',
                'img' => 'xiaolin',
            ],
            [
                'name' => 'Dias',
                'img' => 'dias',
            ],
            [
                'name' => 'Clara',
                'img' => 'clara',
            ],
            [
                'name' => 'Arnold',
                'img' => 'arnold',
            ],
            [
                'name' => 'Yen',
                'img' => 'yen',
            ],
            [
                'name' => 'Refroidissement',
                'img' => 'refroidissement',
            ],
            [
                'name' => 'Covenant',
                'img' => 'covenant',
            ],
            [
                'name' => 'Deva',
                'img' => 'deva',
            ],
            [
                'name' => 'Olivia',
                'img' => 'olivia',
            ],
            [
                'name' => 'Zenobia',
                'img' => 'zenobia',
            ],
            [
                'name' => 'Izaria',
                'img' => 'izaria',
            ],
            [
                'name' => 'Julie',
                'img' => 'julie',
            ],
            [
                'name' => 'Betta',
                'img' => 'betta',
            ],
            [
                'name' => 'Isael',
                'img' => 'isael',
            ],
            [
                'name' => 'Kamiya',
                'img' => 'kamiya',
            ],
            [
                'name' => 'Malite',
                'img' => 'malite',
            ],
            [
                'name' => 'Molly',
                'img' => 'molly',
            ],
            [
                'name' => 'Platy',
                'img' => 'platy',
            ],
            [
                'name' => 'Einheri',
                'img' => 'einheri',
            ],
            [
                'name' => 'Arang',
                'img' => 'arang',
            ],
            [
                'name' => 'Borsalino',
                'img' => 'borsalino',
            ],
            [
                'name' => 'Briand',
                'img' => 'briand',
            ],
            [
                'name' => 'Emma',
                'img' => 'emma',
            ],
            [
                'name' => 'Hwahee',
                'img' => 'hwahee',
            ],
            [
                'name' => 'Isabelle',
                'img' => 'isabelle',
            ],
            [
                'name' => 'Malaka',
                'img' => 'malaka',
            ],
            [
                'name' => 'Shihwa',
                'img' => 'shihwa',
            ],
            [
                'name' => 'Taurus',
                'img' => 'taurus',
            ],
            [
                'name' => 'Tetra',
                'img' => 'tetra',
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/'.$fourStar['img'].'.png');
            $manager->persist($mon);
        }

        $fiveStars = [
            [
                'name' => 'Akhamamir',
                'img' => 'akhamamir',
            ],
            [
                'name' => 'Alexandra',
                'img' => 'alexandra',
            ],
            [
                'name' => 'Amelia',
                'img' => 'amelia',
            ],
            [
                'name' => 'Anavel',
                'img' => 'anavel',
            ],
            [
                'name' => 'Ariel',
                'img' => 'ariel',
            ],
            [
                'name' => 'Baleygr',
                'img' => 'baleygr',
            ],
            [
                'name' => 'Barbara',
                'img' => 'barbara',
            ],
            [
                'name' => 'Bastet',
                'img' => 'bastet',
            ],
            [
                'name' => 'Bellenus',
                'img' => 'bellenus',
            ],
            [
                'name' => 'Beth',
                'img' => 'beth',
            ],
            [
                'name' => 'Brandia',
                'img' => 'brandia',
            ],
            [
                'name' => 'Camille',
                'img' => 'camille',
            ],
            [
                'name' => 'Chandra',
                'img' => 'chandra',
            ],
            [
                'name' => 'Charlotte',
                'img' => 'charlotte',
            ],
            [
                'name' => 'Chiwu',
                'img' => 'chiwu',
            ],
            [
                'name' => 'Chow',
                'img' => 'chow',
            ],
            [
                'name' => 'Daphnis',
                'img' => 'daphnis',
            ],
            [
                'name' => 'Diana',
                'img' => 'diana',
            ],
            [
                'name' => 'Eirgar',
                'img' => 'eirgar',
            ],
            [
                'name' => 'Eladriel',
                'img' => 'eladriel',
            ],
            [
                'name' => 'Eleanor',
                'img' => 'eleanor',
            ],
            [
                'name' => 'Elenoa',
                'img' => 'elenoa',
            ],
            [
                'name' => 'Ethna',
                'img' => 'ethna',
            ],
            [
                'name' => 'Feng Yan',
                'img' => 'fengyan',
            ],
            [
                'name' => 'Ganymède',
                'img' => 'ganymede',
            ],
            [
                'name' => 'Han',
                'img' => 'han',
            ],
            [
                'name' => 'Helena',
                'img' => 'helena',
            ],
            [
                'name' => 'Herteit',
                'img' => 'herteit',
            ],
            [
                'name' => 'Jaara',
                'img' => 'jaara',
            ],
            [
                'name' => 'Jamire',
                'img' => 'jamire',
            ],
            [
                'name' => 'Jeanne',
                'img' => 'jeanne',
            ],
            [
                'name' => 'Joséphine',
                'img' => 'josephine',
            ],
            [
                'name' => 'Juno',
                'img' => 'juno',
            ],
            [
                'name' => 'Katarina',
                'img' => 'katarina',
            ],
            [
                'name' => 'Kumar',
                'img' => 'kumar',
            ],
            [
                'name' => 'Lagmaron',
                'img' => 'lagmaron',
            ],
            [
                'name' => 'Laika',
                'img' => 'laika',
            ],
            [
                'name' => 'Leo',
                'img' => 'leo',
            ],
            [
                'name' => 'Lora',
                'img' => 'lora',
            ],
            [
                'name' => 'Mephisto',
                'img' => 'mephisto',
            ],
            [
                'name' => 'Mei Hou Wang',
                'img' => 'mhw',
            ],
            [
                'name' => 'Mi Ying',
                'img' => 'miying',
            ],
            [
                'name' => 'Mo Long',
                'img' => 'molong',
            ],
            [
                'name' => 'Nicki',
                'img' => 'nicki',
            ],
            [
                'name' => 'Odin',
                'img' => 'odin',
            ],
            [
                'name' => 'Okéanos',
                'img' => 'okeanos',
            ],
            [
                'name' => 'Ophélia',
                'img' => 'ophelia',
            ],
            [
                'name' => 'Perna',
                'img' => 'perna',
            ],
            [
                'name' => 'Poséidon',
                'img' => 'poseidon',
            ],
            [
                'name' => 'Praha',
                'img' => 'praha',
            ],
            [
                'name' => 'Psamathe',
                'img' => 'psamathe',
            ],
            [
                'name' => 'Pung Baek',
                'img' => 'pungbaek',
            ],
            [
                'name' => 'Qitian Dasheng',
                'img' => 'qitiandasheng',
            ],
            [
                'name' => 'Rakan',
                'img' => 'rakan',
            ],
            [
                'name' => 'Raki',
                'img' => 'raki',
            ],
            [
                'name' => 'Rica',
                'img' => 'rica',
            ],
            [
                'name' => 'Ritesh',
                'img' => 'ritesh',
            ],
            [
                'name' => 'Savannah',
                'img' => 'savannah',
            ],
            [
                'name' => 'Seara',
                'img' => 'seara',
            ],
            [
                'name' => 'Shazam',
                'img' => 'shazam',
            ],
            [
                'name' => 'Shi Hou',
                'img' => 'shihou',
            ],
            [
                'name' => 'Sigmarus',
                'img' => 'sigmarus',
            ],
            [
                'name' => 'Taor',
                'img' => 'taor',
            ],
            [
                'name' => 'Taranys',
                'img' => 'taranys',
            ],
            [
                'name' => 'Tesarion',
                'img' => 'tesarion',
            ],
            [
                'name' => 'Teshar',
                'img' => 'teshar',
            ],
            [
                'name' => 'Theomars',
                'img' => 'theomars',
            ],
            [
                'name' => 'Tiana',
                'img' => 'tiana',
            ],
            [
                'name' => 'Tian Lang',
                'img' => 'tianlang',
            ],
            [
                'name' => 'Vanessa',
                'img' => 'vanessa',
            ],
            [
                'name' => 'Velajuel',
                'img' => 'velajuel',
            ],
            [
                'name' => 'Veromos',
                'img' => 'veromos',
            ],
            [
                'name' => 'Woonsa',
                'img' => 'woonsa',
            ],
            [
                'name' => 'Woosa',
                'img' => 'woosa',
            ],
            [
                'name' => 'Xiong Fei',
                'img' => 'xf',
            ],
            [
                'name' => 'Zaiross',
                'img' => 'zaiross',
            ],
            [
                'name' => 'Wedjat',
                'img' => 'wedjat',
            ],
            [
                'name' => 'Bolverk',
                'img' => 'bolverk',
            ],
            [
                'name' => 'Alicia',
                'img' => 'alicia',
            ],
            [
                'name' => 'Zeratu',
                'img' => 'zeratu',
            ],
            [
                'name' => 'Celia',
                'img' => 'celia',
            ],
            [
                'name' => 'Triton',
                'img' => 'triton',
            ],
            [
                'name' => 'Sekhmet',
                'img' => 'sekhmet',
            ],
        ];

        foreach ($fiveStars as $fiveStar) {
            $mon = new Monster();
            $mon->setName($fiveStar['name'])->setImage('/img/5nat/'.$fiveStar['img'].'.png');
            $manager->persist($mon);
        }

        $secondAwakes = [
            [
                'name' => 'Belladeon',
                'img' => 'belladeon',
            ],
            [
                'name' => 'Camaryn',
                'img' => 'camaryn',
            ],
            [
                'name' => 'Dagora',
                'img' => 'dagora',
            ],
            [
                'name' => 'Eilene',
                'img' => 'eilene',
            ],
            [
                'name' => 'Elucia',
                'img' => 'elucia',
            ],
            [
                'name' => 'Eshir',
                'img' => 'eshir',
            ],
            [
                'name' => 'Gorgo',
                'img' => 'gorgo',
            ],
            [
                'name' => 'Icaru',
                'img' => 'icaru',
            ],
            [
                'name' => 'Iselia',
                'img' => 'iselia',
            ],
            [
                'name' => 'Jultan',
                'img' => 'jultan',
            ],
            [
                'name' => 'Kro',
                'img' => 'kro',
            ],
            [
                'name' => 'Lusha',
                'img' => 'lusha',
            ],
            [
                'name' => 'Mei',
                'img' => 'mei',
            ],
            [
                'name' => 'Miho',
                'img' => 'miho',
            ],
            [
                'name' => 'Mina',
                'img' => 'mina',
            ],
            [
                'name' => 'Naomie',
                'img' => 'naomie',
            ],
            [
                'name' => 'Ramagos',
                'img' => 'ramagos',
            ],
            [
                'name' => 'Ramahan',
                'img' => 'ramahan',
            ],
            [
                'name' => 'Raoq',
                'img' => 'raoq',
            ],
            [
                'name' => 'Shakan',
                'img' => 'shakan',
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
            ],
            [
                'name' => 'Tatu',
                'img' => 'tatu',
            ],
            [
                'name' => 'Ursha',
                'img' => 'ursha',
            ],
            [
                'name' => 'Vigor',
                'img' => 'vigor',
            ],
        ];

        foreach ($secondAwakes as $secondAwake) {
            $mon = new Monster();
            $mon->setName($secondAwake['name'].' 2A')->setImage('/img/2a/'.$secondAwake['img'].'.png');
            $manager->persist($mon);
        }

        $homies = [
            [
                'name' => 'Eau',
                'img' => 'water',
            ],
            [
                'name' => 'Feu',
                'img' => 'fire',
            ],
            [
                'name' => 'Vent',
                'img' => 'wind',
            ],
            [
                'name' => 'Light',
                'img' => 'light',
            ],
            [
                'name' => 'Dark',
                'img' => 'dark',
            ],
        ];

        foreach ($homies as $homie) {
            $mon = new Monster();
            $mon->setName('Homunculus ' . $homie['name'])->setImage('/img/homie/'.$homie['img'].'.png');
            $manager->persist($mon);
        }

        $manager->flush();

    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters'];
    }
}
