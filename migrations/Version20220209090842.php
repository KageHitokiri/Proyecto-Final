<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209090842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill ADD stamina_fatigue INT NOT NULL, ADD essence_fatigue INT NOT NULL, ADD hp_fatigue INT NOT NULL, DROP fatigue');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill ADD fatigue INT DEFAULT NULL, DROP stamina_fatigue, DROP essence_fatigue, DROP hp_fatigue');
    }
}
