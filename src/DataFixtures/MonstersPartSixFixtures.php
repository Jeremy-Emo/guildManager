<?php


namespace App\DataFixtures;


use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class MonstersPartSixFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $secondAwakes = [
            [
                'name' => 'Bernard',
                'img' => 'bernard',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 3,
            ],
            [
                'name' => 'Kahn',
                'img' => 'kahn',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Shamann',
                'img' => 'shamann',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Spectra',
                'img' => 'spectra',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Varus',
                'img' => 'varus',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
            [
                'name' => 'Belladeon',
                'img' => 'belladeon',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Camaryn',
                'img' => 'camaryn',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 2,
            ],
            [
                'name' => 'Dagora',
                'img' => 'dagora',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Eilene',
                'img' => 'eilene',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 2,
            ],
            [
                'name' => 'Elucia',
                'img' => 'elucia',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Eshir',
                'img' => 'eshir',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Gorgo',
                'img' => 'gorgo',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 2,
            ],
            [
                'name' => 'Icaru',
                'img' => 'icaru',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Iselia',
                'img' => 'iselia',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Jultan',
                'img' => 'jultan',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
            [
                'name' => 'Kro',
                'img' => 'kro',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
            [
                'name' => 'Lusha',
                'img' => 'lusha',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Mei',
                'img' => 'mei',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Miho',
                'img' => 'miho',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
            [
                'name' => 'Mina',
                'img' => 'mina',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Naomie',
                'img' => 'naomie',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 3,
            ],
            [
                'name' => 'Ramagos',
                'img' => 'ramagos',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 2,
            ],
            [
                'name' => 'Ramahan',
                'img' => 'ramahan',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 3,
            ],
            [
                'name' => 'Raoq',
                'img' => 'raoq',
                'family' => $this->getReference("inugami"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Shakan',
                'img' => 'shakan',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 3,
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 2,
            ],
            [
                'name' => 'Tatu',
                'img' => 'tatu',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 2,
            ],
            [
                'name' => 'Ursha',
                'img' => 'ursha',
                'family' => $this->getReference("loursDeGuerre"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 2,
            ],
            [
                'name' => 'Vigor',
                'img' => 'vigor',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Cheryl',
                'img' => 'cheryl',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 2,
            ],
            [
                'name' => 'Kacie',
                'img' => 'kacey',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 2,
            ],
            [
                'name' => 'Neal',
                'img' => 'neal',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Sorin',
                'img' => 'sorin',
                'family' => $this->getReference("fee"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
            [
                'name' => 'Garoche',
                'img' => 'garoche',
                'family' => $this->getReference("loupgarou"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Xiao Ling',
                'img' => 'xiaoling',
                'family' => $this->getReference("chatmartial"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
        ];

        foreach ($secondAwakes as $secondAwake) {
            $mon = new Monster();
            $mon->setName($secondAwake['name'] . ' 2A')->setImage('/img/2a/' . $secondAwake['img'] . '.png')->setNaturalStars($secondAwake['stars']);
            if(isset($secondAwake['family'])){
                $mon->setMonsterFamily($secondAwake['family']);
            }
            if(isset($secondAwake['element'])){
                $mon->setElement($secondAwake['element']);
            }

            $id = $secondAwake['family']->getId() . "3" . $secondAwake['element']->getId();
            $mon->setId($id);
            $manager->persist($mon);

            $metadata = $manager->getClassMetaData(get_class($mon));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
        }
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