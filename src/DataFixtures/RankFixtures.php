<?php

namespace App\DataFixtures;

use App\Entity\Rank;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RankFixtures extends Fixture implements FixtureGroupInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load($manager)
    {
        $ranks = [
            'Débutant',
            'F1',
            'F2',
            'F3',
            'C1',
            'C2',
            'C3',
            'G1',
            'G2',
            'G3',
            'Légende',
        ];

        $i = 1;
        
        foreach($ranks as $name) {
            $rank = new Rank();
            $rank->setName($name);
            $rank->setId($i);

            $manager->persist($rank);

            $this->setReference($name . '_REF', $rank);

            $metadata = $manager->getClassMetaData(get_class($rank));
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
