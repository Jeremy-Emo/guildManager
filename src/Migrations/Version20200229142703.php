<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229142703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE offense (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, mob_leader_id INT NOT NULL, mob_one_id INT NOT NULL, mob_two_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_5F36D3217E3C61F9 (owner_id), INDEX IDX_5F36D321C9D6A79D (mob_leader_id), INDEX IDX_5F36D3214942F8EB (mob_one_id), INDEX IDX_5F36D321221E1F24 (mob_two_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offense ADD CONSTRAINT FK_5F36D3217E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offense ADD CONSTRAINT FK_5F36D321C9D6A79D FOREIGN KEY (mob_leader_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE offense ADD CONSTRAINT FK_5F36D3214942F8EB FOREIGN KEY (mob_one_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE offense ADD CONSTRAINT FK_5F36D321221E1F24 FOREIGN KEY (mob_two_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE defense ADD is_example TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE offense');
        $this->addSql('ALTER TABLE defense DROP is_example');
    }
}
