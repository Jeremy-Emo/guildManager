<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406063916 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE siege_members');
        $this->addSql('ALTER TABLE defense ADD default_tower INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE siege_members (siege_id INT NOT NULL, members_id INT NOT NULL, INDEX IDX_ED370D22BD01F5ED (members_id), INDEX IDX_ED370D22BF006E8B (siege_id), PRIMARY KEY(siege_id, members_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BD01F5ED FOREIGN KEY (members_id) REFERENCES members (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BF006E8B FOREIGN KEY (siege_id) REFERENCES siege (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE defense DROP default_tower');
    }
}
