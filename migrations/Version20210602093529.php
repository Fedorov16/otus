<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602093529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER INDEX department_name__ind RENAME TO UNIQ_CD1DE18A5E237E06');
        $this->addSql('ALTER INDEX discipline_name__ind RENAME TO UNIQ_75BEEE3F5E237E06');
        $this->addSql('DROP INDEX user_name__ind');
        $this->addSql('ALTER INDEX user_email__ind RENAME TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER INDEX uniq_75beee3f5e237e06 RENAME TO discipline_name__ind');
        $this->addSql('ALTER INDEX uniq_cd1de18a5e237e06 RENAME TO department_name__ind');
        $this->addSql('CREATE UNIQUE INDEX user_name__ind ON "user" (name)');
        $this->addSql('ALTER INDEX uniq_8d93d649e7927c74 RENAME TO user_email__ind');
    }
}
