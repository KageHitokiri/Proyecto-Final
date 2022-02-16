<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216231021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_character (id INT AUTO_INCREMENT NOT NULL, character_name VARCHAR(255) NOT NULL, race VARCHAR(50) NOT NULL, damage INT NOT NULL, max_hp INT NOT NULL, hp INT NOT NULL, max_stamina INT NOT NULL, stamina INT NOT NULL, max_essence INT NOT NULL, essence INT NOT NULL, exp INT NOT NULL, gold INT NOT NULL, potion_counter INT NOT NULL, weapon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_character_skill (player_character_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_79E4805E910BEE57 (player_character_id), INDEX IDX_79E4805E5585C142 (skill_id), PRIMARY KEY(player_character_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_character_quest (player_character_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_64CE9C3E910BEE57 (player_character_id), INDEX IDX_64CE9C3E209E9EF4 (quest_id), PRIMARY KEY(player_character_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, exp_given INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(50) NOT NULL, exp_cost INT NOT NULL, skill_type VARCHAR(50) NOT NULL, stamina_consumption INT NOT NULL, essence_consumption INT NOT NULL, description VARCHAR(255) NOT NULL, stamina_fatigue INT NOT NULL, essence_fatigue INT NOT NULL, hp_fatigue INT NOT NULL, skill_family VARCHAR(50) NOT NULL, skill_level INT NOT NULL, hp_consumption INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, weapon_name VARCHAR(30) NOT NULL, weapon_type VARCHAR(30) NOT NULL, min_damage INT NOT NULL, max_damage INT NOT NULL, stamina_consumption INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character_skill DROP FOREIGN KEY FK_79E4805E910BEE57');
        $this->addSql('ALTER TABLE player_character_quest DROP FOREIGN KEY FK_64CE9C3E910BEE57');
        $this->addSql('ALTER TABLE player_character_quest DROP FOREIGN KEY FK_64CE9C3E209E9EF4');
        $this->addSql('ALTER TABLE player_character_skill DROP FOREIGN KEY FK_79E4805E5585C142');
        $this->addSql('DROP TABLE player_character');
        $this->addSql('DROP TABLE player_character_skill');
        $this->addSql('DROP TABLE player_character_quest');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE weapon');
    }
}
