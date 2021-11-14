<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211114122013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE analytical_account (id SERIAL NOT NULL, synthetic_account_id INT NOT NULL, ident VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6736678CAD4C276F ON analytical_account (synthetic_account_id)');
        $this->addSql('CREATE TABLE synthetic_account (id SERIAL NOT NULL, accounting_group_id INT NOT NULL, ident VARCHAR(1) NOT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2EE8717446D0F4B5 ON synthetic_account (accounting_group_id)');
        $this->addSql('ALTER TABLE analytical_account ADD CONSTRAINT FK_6736678CAD4C276F FOREIGN KEY (synthetic_account_id) REFERENCES synthetic_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE synthetic_account ADD CONSTRAINT FK_2EE8717446D0F4B5 FOREIGN KEY (accounting_group_id) REFERENCES accounting_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE analytical_account DROP CONSTRAINT FK_6736678CAD4C276F');
        $this->addSql('DROP TABLE analytical_account');
        $this->addSql('DROP TABLE synthetic_account');
    }
}
