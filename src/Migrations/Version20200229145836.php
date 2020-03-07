<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229145836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offense ADD defense_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offense ADD CONSTRAINT FK_5F36D321FB0C2DCF FOREIGN KEY (defense_id) REFERENCES defense (id)');
        $this->addSql('CREATE INDEX IDX_5F36D321FB0C2DCF ON offense (defense_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offense DROP FOREIGN KEY FK_5F36D321FB0C2DCF');
        $this->addSql('DROP INDEX IDX_5F36D321FB0C2DCF ON offense');
        $this->addSql('ALTER TABLE offense DROP defense_id');
    }
}
