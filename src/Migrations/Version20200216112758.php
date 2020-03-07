<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200216112758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE defense (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, mob_leader_id INT NOT NULL, mob_one_id INT NOT NULL, mob_two_id INT NOT NULL, victories INT NOT NULL, loses INT NOT NULL, INDEX IDX_DBA5F5757E3C61F9 (owner_id), INDEX IDX_DBA5F575C9D6A79D (mob_leader_id), INDEX IDX_DBA5F5754942F8EB (mob_one_id), INDEX IDX_DBA5F575221E1F24 (mob_two_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE defense ADD CONSTRAINT FK_DBA5F5757E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE defense ADD CONSTRAINT FK_DBA5F575C9D6A79D FOREIGN KEY (mob_leader_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE defense ADD CONSTRAINT FK_DBA5F5754942F8EB FOREIGN KEY (mob_one_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE defense ADD CONSTRAINT FK_DBA5F575221E1F24 FOREIGN KEY (mob_two_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) DEFAULT NULL, CHANGE website_link website_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE buildings CHANGE user_id user_id INT DEFAULT NULL, CHANGE def def INT DEFAULT NULL, CHANGE atk atk INT DEFAULT NULL, CHANGE fire fire INT DEFAULT NULL, CHANGE water water INT DEFAULT NULL, CHANGE wind wind INT DEFAULT NULL, CHANGE light light INT DEFAULT NULL, CHANGE dark dark INT DEFAULT NULL, CHANGE dcc dcc INT DEFAULT NULL, CHANGE pv pv INT DEFAULT NULL, CHANGE spd spd INT DEFAULT NULL, CHANGE gvg_pv gvg_pv INT DEFAULT NULL, CHANGE gvg_dcc gvg_dcc INT DEFAULT NULL, CHANGE gvg_def gvg_def INT DEFAULT NULL, CHANGE gvg_atk gvg_atk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL, CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE best_rtarank_id best_rtarank_id INT DEFAULT NULL, CHANGE best_arena_rank_id best_arena_rank_id INT DEFAULT NULL, CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE swarfarm swarfarm VARCHAR(255) DEFAULT NULL, CHANGE last_visit_at last_visit_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE defense');
        $this->addSql('ALTER TABLE buildings CHANGE user_id user_id INT DEFAULT NULL, CHANGE def def INT DEFAULT NULL, CHANGE atk atk INT DEFAULT NULL, CHANGE fire fire INT DEFAULT NULL, CHANGE water water INT DEFAULT NULL, CHANGE wind wind INT DEFAULT NULL, CHANGE light light INT DEFAULT NULL, CHANGE dark dark INT DEFAULT NULL, CHANGE dcc dcc INT DEFAULT NULL, CHANGE pv pv INT DEFAULT NULL, CHANGE spd spd INT DEFAULT NULL, CHANGE gvg_pv gvg_pv INT DEFAULT NULL, CHANGE gvg_dcc gvg_dcc INT DEFAULT NULL, CHANGE gvg_def gvg_def INT DEFAULT NULL, CHANGE gvg_atk gvg_atk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE website_link website_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL, CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE best_rtarank_id best_rtarank_id INT DEFAULT NULL, CHANGE best_arena_rank_id best_arena_rank_id INT DEFAULT NULL, CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE swarfarm swarfarm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_visit_at last_visit_at DATETIME DEFAULT \'NULL\'');
    }
}
