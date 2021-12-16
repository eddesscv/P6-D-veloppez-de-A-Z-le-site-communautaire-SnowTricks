<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215091829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE trick_id trick_id INT NOT NULL');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB281BE2E');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trick CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image_path image_path VARCHAR(255) NOT NULL, CHANGE image_name image_name VARCHAR(255) NOT NULL, CHANGE activated activated TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE trick_id trick_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB281BE2E');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE trick CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE image_path image_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image_name image_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE activated activated TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }
}
