<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313104621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE critere_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE format_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE repondre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reponse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sondage_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE statistique_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE theme_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE visuel_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE critere (id INT NOT NULL, critere VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE format (id INT NOT NULL, format VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, type_id INT NOT NULL, visuel_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6F7494EC54C8C93 ON question (type_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494E9559EF01 ON question (visuel_id)');
        $this->addSql('CREATE TABLE repondre (id INT NOT NULL, utilisateur_id INT NOT NULL, question_id INT NOT NULL, reponse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F66FAAF4FB88E14F ON repondre (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_F66FAAF41E27F6BF ON repondre (question_id)');
        $this->addSql('CREATE TABLE reponse (id INT NOT NULL, question_id INT NOT NULL, reponse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5FB6DEC71E27F6BF ON reponse (question_id)');
        $this->addSql('CREATE TABLE sondage (id INT NOT NULL, createur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, introduction VARCHAR(255) NOT NULL, visibilite BOOLEAN NOT NULL, datecreation DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7579C89F73A201E5 ON sondage (createur_id)');
        $this->addSql('CREATE TABLE sondage_theme (sondage_id INT NOT NULL, theme_id INT NOT NULL, PRIMARY KEY(sondage_id, theme_id))');
        $this->addSql('CREATE INDEX IDX_6C1549B5BAF4AE56 ON sondage_theme (sondage_id)');
        $this->addSql('CREATE INDEX IDX_6C1549B559027487 ON sondage_theme (theme_id)');
        $this->addSql('CREATE TABLE statistique (id INT NOT NULL, sondage_id INT NOT NULL, format_id INT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_73A038ADBAF4AE56 ON statistique (sondage_id)');
        $this->addSql('CREATE INDEX IDX_73A038ADD629F605 ON statistique (format_id)');
        $this->addSql('CREATE TABLE statistique_critere (statistique_id INT NOT NULL, critere_id INT NOT NULL, PRIMARY KEY(statistique_id, critere_id))');
        $this->addSql('CREATE INDEX IDX_688F3B776A81463 ON statistique_critere (statistique_id)');
        $this->addSql('CREATE INDEX IDX_688F3B79E5F45AB ON statistique_critere (critere_id)');
        $this->addSql('CREATE TABLE theme (id INT NOT NULL, theme VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, motdepasse VARCHAR(255) NOT NULL, datedenaissance DATE NOT NULL, genre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, profession VARCHAR(255) DEFAULT NULL, entreprise VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur_sondage (utilisateur_id INT NOT NULL, sondage_id INT NOT NULL, PRIMARY KEY(utilisateur_id, sondage_id))');
        $this->addSql('CREATE INDEX IDX_F723F0DFB88E14F ON utilisateur_sondage (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_F723F0DBAF4AE56 ON utilisateur_sondage (sondage_id)');
        $this->addSql('CREATE TABLE visuel (id INT NOT NULL, visuel VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E9559EF01 FOREIGN KEY (visuel_id) REFERENCES visuel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE repondre ADD CONSTRAINT FK_F66FAAF4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE repondre ADD CONSTRAINT FK_F66FAAF41E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89F73A201E5 FOREIGN KEY (createur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sondage_theme ADD CONSTRAINT FK_6C1549B5BAF4AE56 FOREIGN KEY (sondage_id) REFERENCES sondage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sondage_theme ADD CONSTRAINT FK_6C1549B559027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADBAF4AE56 FOREIGN KEY (sondage_id) REFERENCES sondage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADD629F605 FOREIGN KEY (format_id) REFERENCES format (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE statistique_critere ADD CONSTRAINT FK_688F3B776A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE statistique_critere ADD CONSTRAINT FK_688F3B79E5F45AB FOREIGN KEY (critere_id) REFERENCES critere (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_sondage ADD CONSTRAINT FK_F723F0DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_sondage ADD CONSTRAINT FK_F723F0DBAF4AE56 FOREIGN KEY (sondage_id) REFERENCES sondage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE critere_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE format_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE repondre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reponse_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sondage_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE statistique_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theme_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE visuel_id_seq CASCADE');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494EC54C8C93');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494E9559EF01');
        $this->addSql('ALTER TABLE repondre DROP CONSTRAINT FK_F66FAAF4FB88E14F');
        $this->addSql('ALTER TABLE repondre DROP CONSTRAINT FK_F66FAAF41E27F6BF');
        $this->addSql('ALTER TABLE reponse DROP CONSTRAINT FK_5FB6DEC71E27F6BF');
        $this->addSql('ALTER TABLE sondage DROP CONSTRAINT FK_7579C89F73A201E5');
        $this->addSql('ALTER TABLE sondage_theme DROP CONSTRAINT FK_6C1549B5BAF4AE56');
        $this->addSql('ALTER TABLE sondage_theme DROP CONSTRAINT FK_6C1549B559027487');
        $this->addSql('ALTER TABLE statistique DROP CONSTRAINT FK_73A038ADBAF4AE56');
        $this->addSql('ALTER TABLE statistique DROP CONSTRAINT FK_73A038ADD629F605');
        $this->addSql('ALTER TABLE statistique_critere DROP CONSTRAINT FK_688F3B776A81463');
        $this->addSql('ALTER TABLE statistique_critere DROP CONSTRAINT FK_688F3B79E5F45AB');
        $this->addSql('ALTER TABLE utilisateur_sondage DROP CONSTRAINT FK_F723F0DFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_sondage DROP CONSTRAINT FK_F723F0DBAF4AE56');
        $this->addSql('DROP TABLE critere');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE repondre');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE sondage');
        $this->addSql('DROP TABLE sondage_theme');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE statistique_critere');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_sondage');
        $this->addSql('DROP TABLE visuel');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
