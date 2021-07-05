<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705081618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999324345682');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999371179CD6');
        $this->addSql('DROP INDEX IDX_6034999324345682 ON contrat');
        $this->addSql('DROP INDEX IDX_6034999371179CD6 ON contrat');
        $this->addSql('ALTER TABLE contrat ADD name VARCHAR(255) NOT NULL, DROP name_id, DROP offers_id_id');
        $this->addSql('ALTER TABLE contrat_type DROP FOREIGN KEY FK_C18AF23771179CD6');
        $this->addSql('ALTER TABLE contrat_type DROP FOREIGN KEY FK_C18AF237FC69E3BE');
        $this->addSql('DROP INDEX IDX_C18AF237FC69E3BE ON contrat_type');
        $this->addSql('DROP INDEX IDX_C18AF23771179CD6 ON contrat_type');
        $this->addSql('ALTER TABLE contrat_type ADD name VARCHAR(255) NOT NULL, DROP name_id, DROP offer_id_id');
        $this->addSql('ALTER TABLE offer ADD contrats_id INT DEFAULT NULL, ADD contrat_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E6A6193D6 FOREIGN KEY (contrats_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E6C82DFE5 FOREIGN KEY (contrat_type_id) REFERENCES contrat_type (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E6A6193D6 ON offer (contrats_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E6C82DFE5 ON offer (contrat_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD name_id INT DEFAULT NULL, ADD offers_id_id INT DEFAULT NULL, DROP name');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999324345682 FOREIGN KEY (offers_id_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999371179CD6 FOREIGN KEY (name_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_6034999324345682 ON contrat (offers_id_id)');
        $this->addSql('CREATE INDEX IDX_6034999371179CD6 ON contrat (name_id)');
        $this->addSql('ALTER TABLE contrat_type ADD name_id INT DEFAULT NULL, ADD offer_id_id INT DEFAULT NULL, DROP name');
        $this->addSql('ALTER TABLE contrat_type ADD CONSTRAINT FK_C18AF23771179CD6 FOREIGN KEY (name_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE contrat_type ADD CONSTRAINT FK_C18AF237FC69E3BE FOREIGN KEY (offer_id_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_C18AF237FC69E3BE ON contrat_type (offer_id_id)');
        $this->addSql('CREATE INDEX IDX_C18AF23771179CD6 ON contrat_type (name_id)');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E6A6193D6');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E6C82DFE5');
        $this->addSql('DROP INDEX IDX_29D6873E6A6193D6 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E6C82DFE5 ON offer');
        $this->addSql('ALTER TABLE offer DROP contrats_id, DROP contrat_type_id');
    }
}
