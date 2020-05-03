<?php

namespace App\Factory;

use App\Entity\Guild;
use App\Entity\Members;

class StatsFactory extends GenericFactory
{
    public function getStats(Guild $guild) : array
    {
        $return = [];

        $return['statsLevels'] = $this->getLevelsStats($guild);
        $return['levelMoyen'] = $this->calculateLevelOfGuild($guild);
        $return['nbSixStarsMoyen'] = $this->calculateSixStarsOfGuild($guild);
        $return['speedMoyenne'] = $this->calculateSpeedMoyenneOfGuild($guild);

        return $return;
    }

    private function getLevelsStats($guild)
    {
        $members = $this->doctrine->getRepository(Members::class)->findBy([
            'guild' => $guild,
        ]);
        $return = [
            0,0,0,0,0,0,0 //Aucun score, Early -, Early +, Mid -, Mid +, Late -, Late +
        ];
        foreach ($members as $member) {
            $score = $member->getUser()->getScores() ?? null;
            if($score === null){
                $return[0] += 1;
            } else {
                $score = $score->calculateScores();
                if($score >= 17) {
                    $return[6] += 1;
                    continue;
                }
                if($score >= 14) {
                    $return[5] += 1;
                    continue;
                }
                if($score >= 9) {
                    $return[4] += 1;
                    continue;
                }
                if($score >= 5) {
                    $return[3] += 1;
                    continue;
                }
                if($score >= 2) {
                    $return[2] += 1;
                    continue;
                }
                if($score >= 1) {
                    $return[1] += 1;
                    continue;
                }
                $return[0] += 1;
            }
        }
        return $return;
    }

    private function calculateLevelOfGuild($guild)
    {
        $members = $this->doctrine->getRepository(Members::class)->findBy([
            'guild' => $guild,
        ]);
        $scoreTotal = 0;
        $nbreScores = 0;

        foreach ($members as $member) {
            $score = $member->getUser()->getScores() ?? null;
            if($score !== null){
                $nbreScores ++;
                $scoreTotal += $score->calculateScores();
            }
        }

        if($nbreScores !== 0){
            $realLevel = $scoreTotal / $nbreScores;
            if($realLevel >= 17) {
                return "Late +";
            }
            if($realLevel >= 14) {
                return "Late -";
            }
            if($realLevel >= 9) {
                return "Mid +";
            }
            if($realLevel >= 5) {
                return "Mid -";
            }
            if($realLevel >= 2) {
                return "Early +";
            }
            if($realLevel >= 1) {
                return "Early -";
            }
        } else {
            return "Aucun niveau.";
        }
    }

    private function calculateSixStarsOfGuild($guild)
    {
        $members = $this->doctrine->getRepository(Members::class)->findBy([
            'guild' => $guild,
        ]);

        $nbreMembers = 0;
        $nbreSixStars = 0;
        foreach($members as $member){
            if($member->getUser()->getScores() !== null){
                $sixStars = $member->getUser()->getScores()->getNbSixStars();
                if($sixStars !== null){
                    $nbreMembers ++;
                    $nbreSixStars += $sixStars;
                }
            }
        }

        return ($nbreMembers !== 0 ? $nbreSixStars / $nbreMembers : 0);
    }

    private function calculateSpeedMoyenneOfGuild($guild)
    {
        $members = $this->doctrine->getRepository(Members::class)->findBy([
            'guild' => $guild,
        ]);

        $nbreMembers = 0;
        $speedValue = 0;
        foreach($members as $member){
            if($member->getUser()->getScores() !== null){
                $speed = $member->getUser()->getScores()->getMinSpeed();
                if($speed !== null){
                    $nbreMembers ++;
                    $speedValue += $speed;
                }
            }
        }

        return ($nbreMembers !== 0 ? $speedValue / $nbreMembers : 0);
    }
}