<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210090935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_character_quest (player_character_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_64CE9C3E910BEE57 (player_character_id), INDEX IDX_64CE9C3E209E9EF4 (quest_id), PRIMARY KEY(player_character_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, exp_given INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character_quest DROP FOREIGN KEY FK_64CE9C3E209E9EF4');
        $this->addSql('DROP TABLE player_character_quest');
        $this->addSql('DROP TABLE quest');
    }
}
