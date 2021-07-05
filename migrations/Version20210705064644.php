<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705064644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD offers_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999324345682 FOREIGN KEY (offers_id_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_6034999324345682 ON contrat (offers_id_id)');
        $this->addSql('ALTER TABLE contrat_type ADD offer_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat_type ADD CONSTRAINT FK_C18AF237FC69E3BE FOREIGN KEY (offer_id_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_C18AF237FC69E3BE ON contrat_type (offer_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999324345682');
        $this->addSql('DROP INDEX IDX_6034999324345682 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP offers_id_id');
        $this->addSql('ALTER TABLE contrat_type DROP FOREIGN KEY FK_C18AF237FC69E3BE');
        $this->addSql('DROP INDEX IDX_C18AF237FC69E3BE ON contrat_type');
        $this->addSql('ALTER TABLE contrat_type DROP offer_id_id');
    }
}
