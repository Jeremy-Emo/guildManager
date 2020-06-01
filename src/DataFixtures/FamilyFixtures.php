<?php

namespace App\DataFixtures;

use App\Entity\MonsterFamily;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class FamilyFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $families = [
            [
                'name' => 'Agent Neostone',
                'ref' => 'agentNeostone',
                'id' => 201
            ],
            [
                'name' => 'Amazone',
                'ref' => 'amazone',
                'id' => 149
            ],
            [
                'name' => 'Anubis',
                'ref' => 'anubis',
                'id' => 204
            ],
            [
                'name' => 'Archange',
                'ref' => 'archange',
                'id' => 170
            ],
            [
                'name' => 'Archer Magique',
                'ref' => 'archerMagique',
                'id' => 154
            ],
            [
                'name' => 'Archer Magique',
                'ref' => 'archerMagiquePromo',
                'id' => 167
            ],
            [
                'name' => 'Armure Vivante',
                'ref' => 'armureVivante',
                'id' => 165
            ],
            [
                'name' => 'Assassin',
                'ref' => 'assassin',
                'id' => 199
            ],
            [
                'name' => 'Bearman',
                'ref' => 'bearman',
                'id' => 137
            ],
            [
                'name' => 'Brownie Magicien',
                'ref' => 'brownieMagicien',
                'id' => 180
            ],
            [
                'name' => 'Cannon Girl',
                'ref' => 'cannonGirl',
                'id' => 229
            ],
            [
                'name' => 'Capitaine Pirate',
                'ref' => 'capitainePirate',
                'id' => 194
            ],
            [
                'name' => 'Cerbère',
                'ref' => 'cerbere',
                'id' => 106
            ],
            [
                'name' => 'Chasseresse au fauve',
                'ref' => 'chasseresseAuFauve',
                'id' => 235
            ],
            [
                'name' => 'Chasseur de bêtes',
                'ref' => 'chasseurDeBetes',
                'id' => 185
            ],
            [
                'name' => 'Chasseur de tête',
                'ref' => 'chasseurDeTete',
                'id' => 156
            ],
            [
                'name' => 'Chat martial',
                'ref' => 'chatmartial',
                'id' => 150
            ],
            [
                'name' => 'Chevalier de la Mort',
                'ref' => 'chevalierDeLaMort',
                'id' => 162
            ],
            [
                'name' => 'Chevalier Dragon',
                'ref' => 'chevalierDragon',
                'id' => 166
            ],
            [
                'name' => 'Chevalier Magique',
                'ref' => 'chevalierMagique',
                'id' => 198
            ],
            [
                'name' => 'Chevalier Pingouin',
                'ref' => 'chevalierPingouin',
                'id' => 187
            ],
            [
                'name' => 'Chimère',
                'ref' => 'chimere',
                'id' => 146
            ],
            [
                'name' => 'Citrouille d\'Halloween',
                'ref' => 'citrouille',
                'id' => 207
            ],
            [
                'name' => 'Combattant Neostone',
                'ref' => 'combattantNeostone',
                'id' => 200
            ],
            [
                'name' => 'Cow-Girl',
                'ref' => 'cowgirl',
                'id' => 193
            ],
            [
                'name' => 'Dame de l\'Enfer',
                'ref' => 'dameDeLenfer',
                'id' => 179
            ],
            [
                'name' => 'Danseuse aux chakrams',
                'ref' => 'danseuseAuxChakrams',
                'id' => 219
            ],
            [
                'name' => 'Danseuse du ciel',
                'ref' => 'danseuseDuCiel',
                'id' => 183
            ],
            [
                'name' => 'Démon',
                'ref' => 'demon',
                'id' => 231
            ],
            [
                'name' => 'Diablotin',
                'ref' => 'diablotin',
                'id' => 102
            ],
            [
                'name' => 'Dragon',
                'ref' => 'dragon',
                'id' => 144
            ],
            [
                'name' => 'Druide',
                'ref' => 'druide',
                'id' => 222
            ],
            [
                'name' => 'Dryade',
                'ref' => 'dryade',
                'id' => 221
            ],
            [
                'name' => 'Elémentaire',
                'ref' => 'elementaire',
                'id' => 108
            ],
            [
                'name' => 'Elémentaire faible',
                'ref' => 'elementaireFaible',
                'id' => 128
            ],
            [
                'name' => 'Elfe Patrouilleur',
                'ref' => 'elfePatrouilleur',
                'id' => 209
            ],
            [
                'name' => 'Empereur de la Mer',
                'ref' => 'empereurDeLaMer',
                'id' => 197
            ],
            [
                'name' => 'Empereur des Foudres',
                'ref' => 'empereurDesFoudres',
                'id' => 226
            ],
            [
                'name' => 'Expert en art martial',
                'ref' => 'martialArtist',
                'id' => 202
            ],
            [
                'name' => 'Faucheuse',
                'ref' => 'faucheuse',
                'id' => 160
            ],
            [
                'name' => 'Fée',
                'ref' => 'fee',
                'id' => 101
            ],
            [
                'name' => 'Fille Occulte',
                'ref' => 'filleOcculte',
                'id' => 161
            ],
            [
                'name' => 'Frankenstein',
                'ref' => 'frankenstein',
                'id' => 208
            ],
            [
                'name' => 'Gargouille',
                'ref' => 'gargouille',
                'id' => 233
            ],
            [
                'name' => 'Garuda',
                'ref' => 'garuda',
                'id' => 109
            ],
            [
                'name' => 'Golem',
                'ref' => 'golem',
                'id' => 114
            ],
            [
                'name' => 'Griffon',
                'ref' => 'griffon',
                'id' => 115
            ],
            [
                'name' => 'Guerrière au Boomerang',
                'ref' => 'guerriereAuBoomerang',
                'id' => 220
            ],
            [
                'name' => 'Guerrier géant',
                'ref' => 'guerrierGeant',
                'id' => 224
            ],
            [
                'name' => 'Guerrier panda',
                'ref' => 'guerrierPanda',
                'id' => 212
            ],
            [
                'name' => 'Haut Elementaire',
                'ref' => 'hautElementaire',
                'id' => 120
            ],
            [
                'name' => 'Harg',
                'ref' => 'harg',
                'id' => 210
            ],
            [
                'name' => 'Harpie',
                'ref' => 'harpie',
                'id' => 105
            ],
            [
                'name' => 'Harpu',
                'ref' => 'harpu',
                'id' => 121
            ],
            [
                'name' => 'Homme-Lézard',
                'ref' => 'hommeLezard',
                'id' => 178
            ],
            [
                'name' => 'Homonculus',
                'ref' => 'homonculusAtk',
                'id' => 10001
            ],
            [
                'name' => 'Homonculus',
                'ref' => 'homonculusSupport',
                'id' => 10002
            ],
            [
                'name' => 'Horus',
                'ref' => 'horus',
                'id' => 206
            ],
            [
                'name' => 'Howl',
                'ref' => 'howl',
                'id' => 132
            ],
            [
                'name' => 'Ifrit',
                'ref' => 'ifrit',
                'id' => 192
            ],
            [
                'name' => 'Inferno',
                'ref' => 'inferno',
                'id' => 117
            ],
            [
                'name' => 'Inugami',
                'ref' => 'inugami',
                'id' => 110
            ],
            [
                'name' => 'Joker',
                'ref' => 'joker',
                'id' => 134
            ],
            [
                'name' => 'Joueuse de Harpe',
                'ref' => 'joueuseDeHarpe',
                'id' => 214
            ],
            [
                'name' => 'Kitsuné',
                'ref' => 'kitsune',
                'id' => 112
            ],
            [
                'name' => 'Kobold Bomber',
                'ref' => 'koboldBomber',
                'id' => 181
            ],
            [
                'name' => 'Kung-Fu Girl',
                'ref' => 'kungfuGirl',
                'id' => 173
            ],
            [
                'name' => 'Liche',
                'ref' => 'liche',
                'id' => 163
            ],
            [
                'name' => 'Licorne',
                'ref' => 'licorne',
                'id' => 215
            ],
            [
                'name' => 'Loup-Garou',
                'ref' => 'loupgarou',
                'id' => 140
            ],
            [
                'name' => 'Lutin',
                'ref' => 'lutin',
                'id' => 103
            ],
            [
                'name' => 'Lutin Champion',
                'ref' => 'lutinChampion',
                'id' => 158
            ],
            [
                'name' => 'Maître des Dés',
                'ref' => 'maitreDesDes',
                'id' => 213
            ],
            [
                'name' => 'Maître Ivre',
                'ref' => 'maitreIvre',
                'id' => 172
            ],
            [
                'name' => 'Mammouth de Combat',
                'ref' => 'mammouthDeCombat',
                'id' => 190
            ],
            [
                'name' => 'Minotaure',
                'ref' => 'minotaure',
                'id' => 177
            ],
            [
                'name' => 'Moine Bestial',
                'ref' => 'moineBestial',
                'id' => 174
            ],
            [
                'name' => 'Momie',
                'ref' => 'momie',
                'id' => 203
            ],
            [
                'name' => 'Ninja',
                'ref' => 'ninja',
                'id' => 135
            ],
            [
                'name' => 'Ondine',
                'ref' => 'ondine',
                'id' => 116
            ],
            [
                'name' => 'Oracle',
                'ref' => 'oracle',
                'id' => 157
            ],
            [
                'name' => 'L\'ours de guerre',
                'ref' => 'loursDeGuerre',
                'id' => 107
            ],
            [
                'name' => 'Paladin',
                'ref' => 'paladin',
                'id' => 218
            ],
            [
                'name' => 'Phénix',
                'ref' => 'phenix',
                'id' => 145
            ],
            [
                'name' => 'Pierrette',
                'ref' => 'pierrette',
                'id' => 139
            ],
            [
                'name' => 'Pionnier',
                'ref' => 'pionnier',
                'id' => 186
            ],
            [
                'name' => 'Prêtre Epikion',
                'ref' => 'pretreEpikion',
                'id' => 153
            ],
            [
                'name' => 'Rakshasa',
                'ref' => 'rakshasa',
                'id' => 155
            ],
            [
                'name' => 'Reine des fées',
                'ref' => 'reineDesFees',
                'id' => 191
            ],
            [
                'name' => 'Reine du désert',
                'ref' => 'reineDuDesert',
                'id' => 205
            ],
            [
                'name' => 'Reine polaire',
                'ref' => 'reinePolaire',
                'id' => 189
            ],
            [
                'name' => 'Requin coursier',
                'ref' => 'requinCoursier',
                'id' => 195
            ],
            [
                'name' => 'Roi Barbare',
                'ref' => 'roiBarbare',
                'id' => 188
            ],
            [
                'name' => 'Roi des fées',
                'ref' => 'roiDesFees',
                'id' => 211
            ],
            [
                'name' => 'Roi Singe',
                'ref' => 'roiSinge',
                'id' => 168
            ],
            [
                'name' => 'Salamandre',
                'ref' => 'salamandre',
                'id' => 111
            ],
            [
                'name' => 'Samourai',
                'ref' => 'samourai',
                'id' => 169
            ],
            [
                'name' => 'Seigneur Vampire',
                'ref' => 'seigneurVampire',
                'id' => 230
            ],
            [
                'name' => 'Serpent',
                'ref' => 'serpent',
                'id' => 113
            ],
            [
                'name' => 'Sirène',
                'ref' => 'sirene',
                'id' => 196
            ],
            [
                'name' => 'Sniper Mk.I',
                'ref' => 'sniper',
                'id' => 227
            ],
            [
                'name' => 'Sorcière Mystique',
                'ref' => 'sorciereMystique',
                'id' => 159
            ],
            [
                'name' => 'Succube',
                'ref' => 'succube',
                'id' => 133
            ],
            [
                'name' => 'Sylphe',
                'ref' => 'sylphe',
                'id' => 118
            ],
            [
                'name' => 'Sylphide',
                'ref' => 'sylphide',
                'id' => 119
            ],
            [
                'name' => 'Taoiste',
                'ref' => 'taoiste',
                'id' => 184
            ],
            [
                'name' => 'Vagabond',
                'ref' => 'vagabond',
                'id' => 152
            ],
            [
                'name' => 'Valkyrie',
                'ref' => 'valkyrie',
                'id' => 138
            ],
            [
                'name' => 'Vampire',
                'ref' => 'vampire',
                'id' => 147
            ],
            [
                'name' => 'Viking',
                'ref' => 'viking',
                'id' => 148
            ],
            [
                'name' => 'Voleur Fantôme',
                'ref' => 'voleurFantome',
                'id' => 141
            ],
            [
                'name' => 'Yéti',
                'ref' => 'yeti',
                'id' => 104
            ],
            [
                'name' => 'Virtuose à la cithare',
                'ref' => 'stringMaster',
                'id' => 239
            ],
            [
                'name' => 'Peintre',
                'ref' => 'peintre',
                'id' => 237
            ],
        ];

        foreach ($families as $family) {
            $fam = new MonsterFamily();
            $fam->setName($family['name'])->setId($family['id']);
            $manager->persist($fam);

            $this->setReference($family['ref'], $fam);

            $metadata = $manager->getClassMetaData(get_class($fam));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'pack1'];
    }
}