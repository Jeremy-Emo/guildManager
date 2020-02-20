<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220165848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE achievement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE achievement_user (achievement_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E71294E0B3EC99FE (achievement_id), INDEX IDX_E71294E0A76ED395 (user_id), PRIMARY KEY(achievement_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) DEFAULT NULL, CHANGE website_link website_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE buildings CHANGE user_id user_id INT DEFAULT NULL, CHANGE def def INT DEFAULT NULL, CHANGE atk atk INT DEFAULT NULL, CHANGE fire fire INT DEFAULT NULL, CHANGE water water INT DEFAULT NULL, CHANGE wind wind INT DEFAULT NULL, CHANGE light light INT DEFAULT NULL, CHANGE dark dark INT DEFAULT NULL, CHANGE dcc dcc INT DEFAULT NULL, CHANGE pv pv INT DEFAULT NULL, CHANGE spd spd INT DEFAULT NULL, CHANGE gvg_pv gvg_pv INT DEFAULT NULL, CHANGE gvg_dcc gvg_dcc INT DEFAULT NULL, CHANGE gvg_def gvg_def INT DEFAULT NULL, CHANGE gvg_atk gvg_atk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL, CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE defense CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE best_rtarank_id best_rtarank_id INT DEFAULT NULL, CHANGE best_arena_rank_id best_arena_rank_id INT DEFAULT NULL, CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL, CHANGE sss_fire_rift sss_fire_rift TINYINT(1) DEFAULT NULL, CHANGE sss_wind_rift sss_wind_rift TINYINT(1) DEFAULT NULL, CHANGE sss_water_rift sss_water_rift TINYINT(1) DEFAULT NULL, CHANGE sss_dark_rift sss_dark_rift TINYINT(1) DEFAULT NULL, CHANGE sss_light_rift sss_light_rift TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE swarfarm swarfarm VARCHAR(255) DEFAULT NULL, CHANGE last_visit_at last_visit_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE achievement_user DROP FOREIGN KEY FK_E71294E0B3EC99FE');
        $this->addSql('DROP TABLE achievement');
        $this->addSql('DROP TABLE achievement_user');
        $this->addSql('ALTER TABLE buildings CHANGE user_id user_id INT DEFAULT NULL, CHANGE def def INT DEFAULT NULL, CHANGE atk atk INT DEFAULT NULL, CHANGE fire fire INT DEFAULT NULL, CHANGE water water INT DEFAULT NULL, CHANGE wind wind INT DEFAULT NULL, CHANGE light light INT DEFAULT NULL, CHANGE dark dark INT DEFAULT NULL, CHANGE dcc dcc INT DEFAULT NULL, CHANGE pv pv INT DEFAULT NULL, CHANGE spd spd INT DEFAULT NULL, CHANGE gvg_pv gvg_pv INT DEFAULT NULL, CHANGE gvg_dcc gvg_dcc INT DEFAULT NULL, CHANGE gvg_def gvg_def INT DEFAULT NULL, CHANGE gvg_atk gvg_atk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE defense CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE website_link website_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL, CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE best_rtarank_id best_rtarank_id INT DEFAULT NULL, CHANGE best_arena_rank_id best_arena_rank_id INT DEFAULT NULL, CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL, CHANGE sss_fire_rift sss_fire_rift TINYINT(1) DEFAULT \'NULL\', CHANGE sss_wind_rift sss_wind_rift TINYINT(1) DEFAULT \'NULL\', CHANGE sss_water_rift sss_water_rift TINYINT(1) DEFAULT \'NULL\', CHANGE sss_dark_rift sss_dark_rift TINYINT(1) DEFAULT \'NULL\', CHANGE sss_light_rift sss_light_rift TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE swarfarm swarfarm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_visit_at last_visit_at DATETIME DEFAULT \'NULL\'');
    }
}
