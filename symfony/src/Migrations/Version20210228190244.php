<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20210228190244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {

        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE department (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department_progress (id SERIAL NOT NULL, department_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, percent INT NOT NULL, level INT NOT NULL, necessary_level INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX department_progress__department_id__ind ON department_progress (department_id)');
        $this->addSql('CREATE INDEX department_progress__discipline_id__ind ON department_progress (discipline_id)');
        $this->addSql('CREATE TABLE discipline (id SERIAL NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX discipline__department_id__ind ON discipline (department_id)');
        $this->addSql('CREATE TABLE progress (id SERIAL NOT NULL, user_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, percent INT NOT NULL, level INT NOT NULL, necessary_level INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX progress__user_id__ind ON progress (user_id)');
        $this->addSql('CREATE INDEX progress__discipline_id__ind ON progress (discipline_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_login_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX user__department_id__ind ON "user" (department_id)');
        $this->addSql('ALTER TABLE department_progress ADD CONSTRAINT department_progress__department_id__fk FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE department_progress ADD CONSTRAINT department_progress__discipline_id__fk FOREIGN KEY (discipline_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT discipline__department_id__fk FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT progress__user_id__fk FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT progress__discipline_id__fk FOREIGN KEY (discipline_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT user__department_id__fk FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE department_progress DROP CONSTRAINT department_progress__department_id__fk');
        $this->addSql('ALTER TABLE discipline DROP CONSTRAINT discipline__department_id__fk');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT user__department_id__fk');
        $this->addSql('ALTER TABLE department_progress DROP CONSTRAINT department_progress__discipline_id__fk');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT progress__discipline_id__fk');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT progress__user_id__fk');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE department_progress');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE progress');
        $this->addSql('DROP TABLE "user"');
    }
}
