<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021080723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_of_book (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(255) NOT NULL, type_des LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD type_of_book_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F6D49415 FOREIGN KEY (type_of_book_id) REFERENCES type_of_book (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331F6D49415 ON book (type_of_book_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331F6D49415');
        $this->addSql('DROP TABLE type_of_book');
        $this->addSql('DROP INDEX IDX_CBE5A331F6D49415 ON book');
        $this->addSql('ALTER TABLE book DROP type_of_book_id');
    }
}
