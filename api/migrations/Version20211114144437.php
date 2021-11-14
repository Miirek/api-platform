<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211114144437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE analytical_account_id_seq CASCADE');
        $this->addSql('CREATE TABLE analytic_account (id SERIAL NOT NULL, synthetic_account_id INT NOT NULL, ident VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_821C6750AD4C276F ON analytic_account (synthetic_account_id)');
        $this->addSql('ALTER TABLE analytic_account ADD CONSTRAINT FK_821C6750AD4C276F FOREIGN KEY (synthetic_account_id) REFERENCES synthetic_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE analytical_account');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE analytical_account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE analytical_account (id SERIAL NOT NULL, synthetic_account_id INT NOT NULL, ident VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_6736678cad4c276f ON analytical_account (synthetic_account_id)');
        $this->addSql('ALTER TABLE analytical_account ADD CONSTRAINT fk_6736678cad4c276f FOREIGN KEY (synthetic_account_id) REFERENCES synthetic_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE analytic_account');
    }
}
