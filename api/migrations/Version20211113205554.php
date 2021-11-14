<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211113205554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accounting_group ADD accounting_class_id INT NOT NULL');
        $this->addSql('ALTER TABLE accounting_group ADD CONSTRAINT FK_9D8D4D9F528426E2 FOREIGN KEY (accounting_class_id) REFERENCES accounting_class (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9D8D4D9F528426E2 ON accounting_group (accounting_class_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE accounting_group DROP CONSTRAINT FK_9D8D4D9F528426E2');
        $this->addSql('DROP INDEX IDX_9D8D4D9F528426E2');
        $this->addSql('ALTER TABLE accounting_group DROP accounting_class_id');
    }
}
