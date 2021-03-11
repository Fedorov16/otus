<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303202518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE department (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE discipline (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department_disciplines (discipline_id INT NOT NULL, department_id INT NOT NULL, PRIMARY KEY(department_id, discipline_id))');
        $this->addSql('CREATE INDEX IDX_433FB87A5522701 ON department_disciplines (discipline_id)');
        $this->addSql('CREATE INDEX IDX_433FB87AE80F5DF ON department_disciplines (department_id)');
        $this->addSql('CREATE TABLE progress (id SERIAL NOT NULL, user_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, percent INT NOT NULL, level INT NOT NULL, necessary_level INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX progress__user_id__ind ON progress (user_id)');
        $this->addSql('CREATE INDEX progress__discipline_id__ind ON progress (discipline_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_login_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, image VARCHAR(255) DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX user__department_id__ind ON "user" (department_id)');
        $this->addSql('ALTER TABLE department_disciplines ADD CONSTRAINT department_disciplines__discipline_id__fk FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE department_disciplines ADD CONSTRAINT department_disciplines__department_id__fk FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT progress__user_id__fk FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT progress__discipline_id__fk FOREIGN KEY (discipline_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT user__department_id__fk FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE department_disciplines DROP CONSTRAINT department_disciplines__discipline_id__fk');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT user__department_id__fk');
        $this->addSql('ALTER TABLE department_disciplines DROP CONSTRAINT department_disciplines__department_id__fk');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT progress__discipline_id__fk');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT progress__user_id__fk');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE department_disciplines');
        $this->addSql('DROP TABLE progress');
        $this->addSql('DROP TABLE "user"');
    }
}
