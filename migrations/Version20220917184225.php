<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220917184225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(45) NOT NULL, firstname VARCHAR(45) NOT NULL, phone_number INT NOT NULL, postal_code INT NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(40) NOT NULL, CHANGE user_phone_number user_phone_number VARCHAR(12) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649EBCDC059 ON user (user_phone_number)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP INDEX UNIQ_8D93D649EBCDC059 ON user');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(255) NOT NULL, CHANGE user_phone_number user_phone_number VARCHAR(12) DEFAULT NULL');
    }
}
