<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210111093145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, libelle_budget VARCHAR(255) NOT NULL, montant_initial_budget INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_document (id INT AUTO_INCREMENT NOT NULL, libelle_categorie_doc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_eleve (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, categorie_document_id INT DEFAULT NULL, nom_document VARCHAR(255) NOT NULL, lien_document VARCHAR(255) NOT NULL, description_document LONGTEXT NOT NULL, date_ajout DATETIME NOT NULL, INDEX IDX_D8698A76FD02F13 (evenement_id), INDEX IDX_D8698A761CC15E3E (categorie_document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, nom_eleve VARCHAR(255) NOT NULL, prenom_eleve VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, genre_eleve VARCHAR(1) NOT NULL, date_creation DATETIME NOT NULL, date_maj DATETIME DEFAULT NULL, archive_eleve SMALLINT NOT NULL, num_tel_eleve INT NOT NULL, num_tel_parent INT NOT NULL, INDEX IDX_ECA105F78F5EA509 (classe_id), INDEX IDX_ECA105F7BCF5E72D (categorie_id), UNIQUE INDEX UNIQ_ECA105F7FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, sport_id INT DEFAULT NULL, nom_evenement VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, lieu_evenement VARCHAR(255) NOT NULL, cout_evenement INT NOT NULL, descrip_evenement LONGTEXT NOT NULL, nb_place INT NOT NULL, image_evenement VARCHAR(255) DEFAULT NULL, vignette_evenement VARCHAR(255) DEFAULT NULL, INDEX IDX_B26681EC54C8C93 (type_id), INDEX IDX_B26681EAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flux (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, type_flux_id INT DEFAULT NULL, evenement_id INT DEFAULT NULL, budget_id INT DEFAULT NULL, montant_flux INT NOT NULL, date_flux DATETIME NOT NULL, INDEX IDX_7252313AA6CC7B2 (eleve_id), INDEX IDX_7252313A24A4FD9B (type_flux_id), INDEX IDX_7252313AFD02F13 (evenement_id), INDEX IDX_7252313A36ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, evenement_id INT DEFAULT NULL, date_inscription DATETIME NOT NULL, INDEX IDX_5E90F6D6A6CC7B2 (eleve_id), INDEX IDX_5E90F6D6FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, nom_sport VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_flux (id INT AUTO_INCREMENT NOT NULL, libelle_type_flux VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, login_utilisateur VARCHAR(255) NOT NULL, email_utilisateur VARCHAR(255) NOT NULL, mdp_utilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A761CC15E3E FOREIGN KEY (categorie_document_id) REFERENCES categorie_document (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F78F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_eleve (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EC54C8C93 FOREIGN KEY (type_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313AA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313A24A4FD9B FOREIGN KEY (type_flux_id) REFERENCES type_flux (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313AFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313A36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flux DROP FOREIGN KEY FK_7252313A36ABA6B8');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A761CC15E3E');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7BCF5E72D');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F78F5EA509');
        $this->addSql('ALTER TABLE flux DROP FOREIGN KEY FK_7252313AA6CC7B2');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A6CC7B2');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76FD02F13');
        $this->addSql('ALTER TABLE flux DROP FOREIGN KEY FK_7252313AFD02F13');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6FD02F13');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EAC78BCF8');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EC54C8C93');
        $this->addSql('ALTER TABLE flux DROP FOREIGN KEY FK_7252313A24A4FD9B');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7FB88E14F');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE categorie_document');
        $this->addSql('DROP TABLE categorie_eleve');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE flux');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE type_flux');
        $this->addSql('DROP TABLE utilisateur');
    }
}
