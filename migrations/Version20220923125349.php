<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923125349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B479F37AE5');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B448D62931');
        $this->addSql('ALTER TABLE geographique_zone DROP FOREIGN KEY FK_3ED456B4AABEFE2C');
        $this->addSql('DROP INDEX UNIQ_3ED456B479F37AE5 ON geographique_zone');
        $this->addSql('DROP INDEX UNIQ_3ED456B448D62931 ON geographique_zone');
        $this->addSql('DROP INDEX UNIQ_3ED456B4AABEFE2C ON geographique_zone');
        $this->addSql('ALTER TABLE geographique_zone DROP id_user_id, DROP id_service_id, DROP id_produit_id');
    }
}
