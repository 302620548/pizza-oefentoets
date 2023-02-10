<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210085023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bestelregel (id INT AUTO_INCREMENT NOT NULL, bestelling_id_id INT NOT NULL, pizza_id_id INT NOT NULL, aantal INT NOT NULL, INDEX IDX_8D814692D14A4739 (bestelling_id_id), INDEX IDX_8D81469289359C8F (pizza_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestelregel ADD CONSTRAINT FK_8D814692D14A4739 FOREIGN KEY (bestelling_id_id) REFERENCES bestelling (id)');
        $this->addSql('ALTER TABLE bestelregel ADD CONSTRAINT FK_8D81469289359C8F FOREIGN KEY (pizza_id_id) REFERENCES pizza (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestelregel DROP FOREIGN KEY FK_8D814692D14A4739');
        $this->addSql('ALTER TABLE bestelregel DROP FOREIGN KEY FK_8D81469289359C8F');
        $this->addSql('DROP TABLE bestelregel');
    }
}
