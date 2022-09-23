<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923132527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bad_produit (id INT AUTO_INCREMENT NOT NULL, id_admin_id INT NOT NULL, id_produit_id INT NOT NULL, UNIQUE INDEX UNIQ_645AF3C034F06E85 (id_admin_id), UNIQUE INDEX UNIQ_645AF3C0AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bad_service (id INT AUTO_INCREMENT NOT NULL, id_admin_id INT DEFAULT NULL, id_service_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AC62853534F06E85 (id_admin_id), UNIQUE INDEX UNIQ_AC62853548D62931 (id_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_service_id INT NOT NULL, id_produit_id INT NOT NULL, active TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', note INT NOT NULL, commentaire VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5F9E962A79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_5F9E962A48D62931 (id_service_id), UNIQUE INDEX UNIQ_5F9E962AAABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repports (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_service_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, rapport VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_164600D779F37AE5 (id_user_id), UNIQUE INDEX UNIQ_164600D748D62931 (id_service_id), UNIQUE INDEX UNIQ_164600D7AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bad_produit ADD CONSTRAINT FK_645AF3C034F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE bad_produit ADD CONSTRAINT FK_645AF3C0AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE bad_service ADD CONSTRAINT FK_AC62853534F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE bad_service ADD CONSTRAINT FK_AC62853548D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A48D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D748D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE repports ADD CONSTRAINT FK_164600D7AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bad_produit DROP FOREIGN KEY FK_645AF3C034F06E85');
        $this->addSql('ALTER TABLE bad_produit DROP FOREIGN KEY FK_645AF3C0AABEFE2C');
        $this->addSql('ALTER TABLE bad_service DROP FOREIGN KEY FK_AC62853534F06E85');
        $this->addSql('ALTER TABLE bad_service DROP FOREIGN KEY FK_AC62853548D62931');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A48D62931');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AAABEFE2C');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D779F37AE5');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D748D62931');
        $this->addSql('ALTER TABLE repports DROP FOREIGN KEY FK_164600D7AABEFE2C');
        $this->addSql('DROP TABLE bad_produit');
        $this->addSql('DROP TABLE bad_service');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE repports');
    }
}
