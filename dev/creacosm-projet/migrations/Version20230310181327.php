<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310181327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD ville VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD profession VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD genre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD age INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE utilisateur DROP name');
        $this->addSql('ALTER TABLE utilisateur DROP prenom');
        $this->addSql('ALTER TABLE utilisateur DROP ville');
        $this->addSql('ALTER TABLE utilisateur DROP profession');
        $this->addSql('ALTER TABLE utilisateur DROP genre');
        $this->addSql('ALTER TABLE utilisateur DROP age');
    }
}
