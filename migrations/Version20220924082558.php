<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220924082558 extends AbstractMigration
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
        $this->addSql('ALTER TABLE bad_user_user DROP FOREIGN KEY FK_6B25BFA1A76ED395');
        $this->addSql('ALTER TABLE bad_user_user DROP FOREIGN KEY FK_6B25BFA1EA91CC72');
        $this->addSql('DROP TABLE bad_user_user');
        $this->addSql('ALTER TABLE bad_user ADD id_admin_id INT DEFAULT NULL, ADD id_user_id INT DEFAULT NULL, ADD reason VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, DROP raison, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD34F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FDC23FD34F06E85 ON bad_user (id_admin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FDC23FD79F37AE5 ON bad_user (id_user_id)');
        $this->addSql('ALTER TABLE geographique_zone ADD id_user_id INT DEFAULT NULL, ADD id_service_id INT DEFAULT NULL, ADD id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B448D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE geographique_zone ADD CONSTRAINT FK_3ED456B4AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ED456B479F37AE5 ON geographique_zone (id_user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ED456B448D62931 ON geographique_zone (id_service_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ED456B4AABEFE2C ON geographique_zone (id_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bad_user_user (bad_user_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6B25BFA1EA91CC72 (bad_user_id), INDEX IDX_6B25BFA1A76ED395 (user_id), PRIMARY KEY(bad_user_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bad_user_user ADD CONSTRAINT FK_6B25BFA1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bad_user_user ADD CONSTRAINT FK_6B25BFA1EA91CC72 FOREIGN KEY (bad_user_id) REFERENCES bad_user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD34F06E85');
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD79F37AE5');
        $this->addSql('DROP INDEX UNIQ_5FDC23FD34F06E85 ON bad_user');
        $this->addSql('DROP INDEX UNIQ_5FDC23FD79F37AE5 ON bad_user');
        $this->addSql('ALTER TABLE bad_user ADD raison VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP id_admin_id, DROP id_user_id, DROP reason, DROP description');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B479F37AE5');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B448D62931');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B4AABEFE2C');
        $this->addSql('DROP INDEX UNIQ_3ED456B479F37AE5 ON geographique_zone');
        $this->addSql('DROP INDEX UNIQ_3ED456B448D62931 ON geographique_zone');
        $this->addSql('DROP INDEX UNIQ_3ED456B4AABEFE2C ON geographique_zone');
        $this->addSql('ALTER TABLE geographique_zone DROP id_user_id, DROP id_service_id, DROP id_produit_id');
    }
}
