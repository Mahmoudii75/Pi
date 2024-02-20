<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218154944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDF2C56620 ON carte (compte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFDF2C56620');
        $this->addSql('DROP INDEX IDX_BAD4FFFDF2C56620 ON carte');
        $this->addSql('ALTER TABLE carte DROP compte_id');
    }
}
