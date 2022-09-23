<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922230507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bad_user (id INT AUTO_INCREMENT NOT NULL, raison VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bad_user_user (bad_user_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6B25BFA1EA91CC72 (bad_user_id), INDEX IDX_6B25BFA1A76ED395 (user_id), PRIMARY KEY(bad_user_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bad_user_user ADD CONSTRAINT FK_6B25BFA1EA91CC72 FOREIGN KEY (bad_user_id) REFERENCES bad_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bad_user_user ADD CONSTRAINT FK_6B25BFA1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bad_user_user DROP FOREIGN KEY FK_6B25BFA1EA91CC72');
        $this->addSql('ALTER TABLE bad_user_user DROP FOREIGN KEY FK_6B25BFA1A76ED395');
        $this->addSql('DROP TABLE bad_user');
        $this->addSql('DROP TABLE bad_user_user');
    }
}