<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250619073638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cours ADD matiere_id_id INT DEFAULT NULL, ADD matiere_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF3E43022 FOREIGN KEY (matiere_id_id) REFERENCES matiere (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FDCA8C9CF3E43022 ON cours (matiere_id_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource ADD cours_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource ADD CONSTRAINT FK_939F45447ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_939F45447ECF78B0 ON ressource (cours_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF3E43022
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_FDCA8C9CF3E43022 ON cours
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours DROP matiere_id_id, DROP matiere_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource DROP FOREIGN KEY FK_939F45447ECF78B0
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_939F45447ECF78B0 ON ressource
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource DROP cours_id
        SQL);
    }
}
