<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200331091659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monster ADD monster_family_id INT DEFAULT NULL, ADD element_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F427E65D2D FOREIGN KEY (monster_family_id) REFERENCES monster_family (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F41F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('CREATE INDEX IDX_245EC6F427E65D2D ON monster (monster_family_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F41F1F2A24 ON monster (element_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F41F1F2A24');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F427E65D2D');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE monster_family');
        $this->addSql('DROP INDEX IDX_245EC6F427E65D2D ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F41F1F2A24 ON monster');
        $this->addSql('ALTER TABLE monster DROP monster_family_id, DROP element_id');
    }
}
