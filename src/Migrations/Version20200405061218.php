<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405061218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE siege (id INT AUTO_INCREMENT NOT NULL, enemy_guild_one_id INT NOT NULL, enemy_guild_two_id INT NOT NULL, guild_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_6706B4F74E7E7ECE (enemy_guild_one_id), INDEX IDX_6706B4F725229901 (enemy_guild_two_id), INDEX IDX_6706B4F75F2131EF (guild_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siege_members (siege_id INT NOT NULL, members_id INT NOT NULL, INDEX IDX_ED370D22BF006E8B (siege_id), INDEX IDX_ED370D22BD01F5ED (members_id), PRIMARY KEY(siege_id, members_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE siege ADD CONSTRAINT FK_6706B4F74E7E7ECE FOREIGN KEY (enemy_guild_one_id) REFERENCES enemy_guild (id)');
        $this->addSql('ALTER TABLE siege ADD CONSTRAINT FK_6706B4F725229901 FOREIGN KEY (enemy_guild_two_id) REFERENCES enemy_guild (id)');
        $this->addSql('ALTER TABLE siege ADD CONSTRAINT FK_6706B4F75F2131EF FOREIGN KEY (guild_id) REFERENCES guild (id)');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BF006E8B FOREIGN KEY (siege_id) REFERENCES siege (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE siege_members ADD CONSTRAINT FK_ED370D22BD01F5ED FOREIGN KEY (members_id) REFERENCES members (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE siege_members DROP FOREIGN KEY FK_ED370D22BF006E8B');
        $this->addSql('DROP TABLE siege');
        $this->addSql('DROP TABLE siege_members');
    }
}
