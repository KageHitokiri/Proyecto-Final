<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218122828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character DROP FOREIGN KEY FK_3376850DA76ED395');
        $this->addSql('DROP INDEX FK_3376850DA76ED395 ON player_character');
        $this->addSql('ALTER TABLE player_character DROP user_id');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_skill ADD CONSTRAINT FK_79E4805E5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_character_quest ADD CONSTRAINT FK_64CE9C3E209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX FK_3376850DA76ED395 ON player_character (user_id)');
        $this->addSql('ALTER TABLE player_character_quest DROP FOREIGN KEY FK_64CE9C3E910BEE57');
        $this->addSql('ALTER TABLE player_character_quest DROP FOREIGN KEY FK_64CE9C3E209E9EF4');
        $this->addSql('ALTER TABLE player_character_skill DROP FOREIGN KEY FK_79E4805E910BEE57');
        $this->addSql('ALTER TABLE player_character_skill DROP FOREIGN KEY FK_79E4805E5585C142');
    }
}
