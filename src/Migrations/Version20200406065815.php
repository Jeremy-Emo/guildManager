<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406065815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE siege_towers (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, color VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE siege_members');
        $this->addSql('ALTER TABLE defense DROP is_placed_by_default, CHANGE default_tower siege_towers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE defense ADD CONSTRAINT FK_DBA5F57572193853 FOREIGN KEY (siege_towers_id) REFERENCES siege_towers (id)');
        $this->addSql('CREATE INDEX IDX_DBA5F57572193853 ON defense (siege_towers_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE defense DROP FOREIGN KEY FK_DBA5F57572193853');
        $this->addSql('CREATE TABLE siege_members (siege_id INT NOT NULL, members_id INT NOT NULL, INDEX IDX_ED370D22BF006E8B (siege_id), INDEX IDX_ED370D22BD01F5ED (members_id), PRIMARY KEY(siege_id, members_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BD01F5ED FOREIGN KEY (members_id) REFERENCES members (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BF006E8B FOREIGN KEY (siege_id) REFERENCES siege (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE siege_towers');
        $this->addSql('DROP INDEX IDX_DBA5F57572193853 ON defense');
        $this->addSql('ALTER TABLE defense ADD is_placed_by_default TINYINT(1) NOT NULL, CHANGE siege_towers_id default_tower INT DEFAULT NULL');
    }
}
