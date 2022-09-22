<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922222336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geographique_zone (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(80) NOT NULL, region VARCHAR(80) NOT NULL, departement INT NOT NULL, code_postal INT NOT NULL, localite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(40) NOT NULL, CHANGE user_phone_number user_phone_number VARCHAR(12) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649EBCDC059 ON user (user_phone_number)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE geographique_zone');
        $this->addSql('DROP INDEX UNIQ_8D93D649EBCDC059 ON user');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(255) NOT NULL, CHANGE user_phone_number user_phone_number VARCHAR(12) DEFAULT NULL');
    }
}
