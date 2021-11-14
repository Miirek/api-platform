<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211114161150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accounting_prescription (id SERIAL NOT NULL, credit_account_id INT DEFAULT NULL, debit_account_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, owner_id INT NOT NULL, last_editor INT DEFAULT NULL, create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modify_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9910D5B76813E404 ON accounting_prescription (credit_account_id)');
        $this->addSql('CREATE INDEX IDX_9910D5B7204C4EAA ON accounting_prescription (debit_account_id)');
        $this->addSql('ALTER TABLE accounting_prescription ADD CONSTRAINT FK_9910D5B76813E404 FOREIGN KEY (credit_account_id) REFERENCES analytic_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE accounting_prescription ADD CONSTRAINT FK_9910D5B7204C4EAA FOREIGN KEY (debit_account_id) REFERENCES analytic_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE accounting_prescription');
    }
}
