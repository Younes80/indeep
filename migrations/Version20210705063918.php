<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705063918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, INDEX IDX_6034999371179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_type (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, INDEX IDX_C18AF23771179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999371179CD6 FOREIGN KEY (name_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE contrat_type ADD CONSTRAINT FK_C18AF23771179CD6 FOREIGN KEY (name_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE offer DROP contrat, DROP duree');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE contrat_type');
        $this->addSql('ALTER TABLE offer ADD contrat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD duree VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
