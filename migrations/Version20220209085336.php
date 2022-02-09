<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209085336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_character_skill (player_character_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_79E4805E910BEE57 (player_character_id), INDEX IDX_79E4805E5585C142 (skill_id), PRIMARY KEY(player_character_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(50) NOT NULL, exp_cost INT NOT NULL, skill_type VARCHAR(50) NOT NULL, stamina_consumption INT NOT NULL, essence_consumption INT NOT NULL, fatigue INT DEFAULT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character_skill DROP FOREIGN KEY FK_79E4805E5585C142');
        $this->addSql('DROP TABLE player_character_skill');
        $this->addSql('DROP TABLE skill');
    }
}
