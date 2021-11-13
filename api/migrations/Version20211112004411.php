<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112004411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accounting_group (id SERIAL NOT NULL, class VARCHAR(1) DEFAULT NULL, ident VARCHAR(1) NOT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9D8D4D9FED4B199F ON accounting_group (class)');
        $this->addSql('ALTER TABLE accounting_group ADD CONSTRAINT FK_9D8D4D9FED4B199F FOREIGN KEY (class) REFERENCES accounting_class (ident) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE accounting_group');
    }
}
