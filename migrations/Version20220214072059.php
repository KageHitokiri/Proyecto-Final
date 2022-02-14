<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214072059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3376850DA76ED395 ON player_character (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character DROP FOREIGN KEY FK_3376850DA76ED395');
        $this->addSql('DROP INDEX IDX_3376850DA76ED395 ON player_character');
        $this->addSql('ALTER TABLE player_character DROP user_id');
    }
}
