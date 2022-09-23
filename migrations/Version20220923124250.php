<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923124250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bad_user ADD id_admin_id INT DEFAULT NULL, ADD id_user_id INT DEFAULT NULL, ADD reason VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, DROP raison, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD34F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE bad_user ADD CONSTRAINT FK_5FDC23FD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FDC23FD34F06E85 ON bad_user (id_admin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FDC23FD79F37AE5 ON bad_user (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD34F06E85');
        $this->addSql('ALTER TABLE bad_user DROP FOREIGN KEY FK_5FDC23FD79F37AE5');
        $this->addSql('DROP INDEX UNIQ_5FDC23FD34F06E85 ON bad_user');
        $this->addSql('DROP INDEX UNIQ_5FDC23FD79F37AE5 ON bad_user');
        $this->addSql('ALTER TABLE bad_user ADD raison VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP id_admin_id, DROP id_user_id, DROP reason, DROP description');
    }
}
