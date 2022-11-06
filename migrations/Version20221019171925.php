<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019171925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(45) NOT NULL, firstname VARCHAR(45) NOT NULL, phone_number INT NOT NULL, postal_code INT NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bad_produit (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, produit_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_645AF3C0A76ED395 (user_id), INDEX IDX_645AF3C0F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bad_service (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, service_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_AC628535A76ED395 (user_id), INDEX IDX_AC628535ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bad_user (id INT AUTO_INCREMENT NOT NULL, id_admin_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, reason VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5FDC23FD34F06E85 (id_admin_id), UNIQUE INDEX UNIQ_5FDC23FD79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_service_id INT NOT NULL, id_produit_id INT NOT NULL, active TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', note INT NOT NULL, commentaire VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5F9E962A79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_5F9E962A48D62931 (id_service_id), UNIQUE INDEX UNIQ_5F9E962AAABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geographique_zone (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_service_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, pays VARCHAR(80) NOT NULL, region VARCHAR(80) NOT NULL, departement INT NOT NULL, code_postal INT NOT NULL, localite VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3ED456B479F37AE5 (id_user_id), UNIQUE INDEX UNIQ_3ED456B448D62931 (id_service_id), UNIQUE INDEX UNIQ_3ED456B4AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, type VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) NOT NULL, image_size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repports (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_service_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, rapport VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_164600D779F37AE5 (id_user_id), UNIQUE INDEX UNIQ_164600D748D62931 (id_service_id), UNIQUE INDEX UNIQ_164600D7AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, nom_service VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, tarif DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) NOT NULL, image_size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_name VARCHAR(40) NOT NULL, user_firstname VARCHAR(45) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, user_age INT NOT NULL, user_pseudo VARCHAR(255) NOT NULL, user_phone_number VARCHAR(12) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649E39E52A0 (user_pseudo), UNIQUE INDEX UNIQ_8D93D649EBCDC059 (user_phone_number), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bad_produit ADD CONSTRAINT FK_645AF3C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bad_produit ADD CONSTRAINT FK_645AF3C0F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE bad_service ADD CONSTRAINT FK_AC628535A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bad_service ADD CONSTRAINT FK_AC628535ED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD34F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A48D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B448D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B4AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D748D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D7AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bad_produit DROP FOREIGN KEY FK_645AF3C0A76ED395');
        $this->addSql('ALTER TABLE bad_produit DROP FOREIGN KEY FK_645AF3C0F347EFB');
        $this->addSql('ALTER TABLE bad_service DROP FOREIGN KEY FK_AC628535A76ED395');
        $this->addSql('ALTER TABLE bad_service DROP FOREIGN KEY FK_AC628535ED5CA9E6');
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD34F06E85');
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD79F37AE5');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A48D62931');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AAABEFE2C');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B479F37AE5');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B448D62931');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B4AABEFE2C');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D779F37AE5');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D748D62931');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D7AABEFE2C');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE bad_produit');
        $this->addSql('DROP TABLE bad_service');
        $this->addSql('DROP TABLE bad_user');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE geographique_zone');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE repports');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
