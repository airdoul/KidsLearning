<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250619075337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF3E43022
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_FDCA8C9CF3E43022 ON cours
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours DROP matiere_id_id, CHANGE matiere_id matiere_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FDCA8C9CF46CD258 ON cours (matiere_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF46CD258
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_FDCA8C9CF46CD258 ON cours
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours ADD matiere_id_id INT DEFAULT NULL, CHANGE matiere_id matiere_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF3E43022 FOREIGN KEY (matiere_id_id) REFERENCES matiere (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FDCA8C9CF3E43022 ON cours (matiere_id_id)
        SQL);
    }
}
