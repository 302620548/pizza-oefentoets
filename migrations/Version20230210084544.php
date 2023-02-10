<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210084544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bestelling (id INT AUTO_INCREMENT NOT NULL, klant_id_id INT NOT NULL, datum DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_3114F81494450 (klant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestelling ADD CONSTRAINT FK_3114F81494450 FOREIGN KEY (klant_id_id) REFERENCES klant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestelling DROP FOREIGN KEY FK_3114F81494450');
        $this->addSql('DROP TABLE bestelling');
    }
}
