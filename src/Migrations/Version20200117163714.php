<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200117163714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE buildings (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, def INT DEFAULT NULL, atk INT DEFAULT NULL, fire INT DEFAULT NULL, water INT DEFAULT NULL, wind INT DEFAULT NULL, light INT DEFAULT NULL, dark INT DEFAULT NULL, dcc INT DEFAULT NULL, pv INT DEFAULT NULL, spd INT DEFAULT NULL, UNIQUE INDEX UNIQ_9A51B6A7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buildings ADD CONSTRAINT FK_9A51B6A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) DEFAULT NULL, CHANGE website_link website_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE swarfarm swarfarm VARCHAR(255) DEFAULT NULL, CHANGE last_visit_at last_visit_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE buildings');
        $this->addSql('ALTER TABLE guild CHANGE discord_link discord_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE website_link website_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE gv_gscores CHANGE user_id user_id INT DEFAULT NULL, CHANGE attack_number attack_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores CHANGE gb10 gb10 INT DEFAULT NULL, CHANGE db10 db10 INT DEFAULT NULL, CHANGE nb10 nb10 INT DEFAULT NULL, CHANGE toa toa INT DEFAULT NULL, CHANGE toah toah INT DEFAULT NULL, CHANGE nb_six_stars nb_six_stars INT DEFAULT NULL, CHANGE min_speed min_speed INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE swarfarm swarfarm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_visit_at last_visit_at DATETIME DEFAULT \'NULL\'');
    }
}
