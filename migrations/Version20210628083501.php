<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628083501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE deplacement (id INT AUTO_INCREMENT NOT NULL, document_id INT DEFAULT NULL, personne_id INT DEFAULT NULL, quantite INT NOT NULL, date_sortie DATETIME NOT NULL, date_retour DATETIME DEFAULT NULL, confirmation_sortie TINYINT(1) NOT NULL, confirmation_retour TINYINT(1) NOT NULL, INDEX IDX_1296FAC2C33F7837 (document_id), INDEX IDX_1296FAC2A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deplacement ADD CONSTRAINT FK_1296FAC2C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE deplacement ADD CONSTRAINT FK_1296FAC2A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE deplacement');
    }
}
