<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202141822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff_type ADD staff_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE staff_type ADD CONSTRAINT FK_6EE821A6D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('CREATE INDEX IDX_6EE821A6D4D57CD ON staff_type (staff_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff_type DROP FOREIGN KEY FK_6EE821A6D4D57CD');
        $this->addSql('DROP INDEX IDX_6EE821A6D4D57CD ON staff_type');
        $this->addSql('ALTER TABLE staff_type DROP staff_id');
    }
}
