<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202125801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critical_opinion ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE critical_opinion ADD CONSTRAINT FK_48F94A0BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_48F94A0BA76ED395 ON critical_opinion (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critical_opinion DROP FOREIGN KEY FK_48F94A0BA76ED395');
        $this->addSql('DROP INDEX IDX_48F94A0BA76ED395 ON critical_opinion');
        $this->addSql('ALTER TABLE critical_opinion DROP user_id');
    }
}
