<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202143318 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff ADD staff_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF39299FA9B25 FOREIGN KEY (staff_type_id) REFERENCES staff_type (id)');
        $this->addSql('CREATE INDEX IDX_426EF39299FA9B25 ON staff (staff_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF39299FA9B25');
        $this->addSql('DROP INDEX IDX_426EF39299FA9B25 ON staff');
        $this->addSql('ALTER TABLE staff DROP staff_type_id');
    }
}
