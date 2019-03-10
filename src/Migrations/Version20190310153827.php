<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190310153827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipes ADD style_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B5BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('CREATE INDEX IDX_A369E2B5BACD6074 ON recipes (style_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B5BACD6074');
        $this->addSql('DROP INDEX IDX_A369E2B5BACD6074 ON recipes');
        $this->addSql('ALTER TABLE recipes DROP style_id');
    }
}
