<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211113202935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accounting_group DROP CONSTRAINT fk_9d8d4d9fed4b199f');
        $this->addSql('DROP INDEX idx_9d8d4d9fed4b199f');
        $this->addSql('ALTER TABLE accounting_group DROP class');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE accounting_group ADD class VARCHAR(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE accounting_group ADD CONSTRAINT fk_9d8d4d9fed4b199f FOREIGN KEY (class) REFERENCES accounting_class (ident) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9d8d4d9fed4b199f ON accounting_group (class)');
    }
}
