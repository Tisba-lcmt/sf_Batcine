<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202133014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critical_opinion ADD media_id INT NOT NULL');
        $this->addSql('ALTER TABLE critical_opinion ADD CONSTRAINT FK_48F94A0BEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_48F94A0BEA9FDD75 ON critical_opinion (media_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critical_opinion DROP FOREIGN KEY FK_48F94A0BEA9FDD75');
        $this->addSql('DROP INDEX IDX_48F94A0BEA9FDD75 ON critical_opinion');
        $this->addSql('ALTER TABLE critical_opinion DROP media_id');
    }
}
