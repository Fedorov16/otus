<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219180428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE department (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department_progress (id SERIAL NOT NULL, department_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, percent INT NOT NULL, modified_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1BBFE86CAE80F5DF ON department_progress (department_id)');
        $this->addSql('CREATE INDEX IDX_1BBFE86CA5522701 ON department_progress (discipline_id)');
        $this->addSql('CREATE TABLE discipline (id SERIAL NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75BEEE3FAE80F5DF ON discipline (department_id)');
        $this->addSql('CREATE TABLE progress (id SERIAL NOT NULL, user_id INT DEFAULT NULL, discipline_id INT DEFAULT NULL, percent INT NOT NULL, modified_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2201F246A76ED395 ON progress (user_id)');
        $this->addSql('CREATE INDEX IDX_2201F246A5522701 ON progress (discipline_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_login_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D93D649AE80F5DF ON "user" (department_id)');
        $this->addSql('ALTER TABLE department_progress ADD CONSTRAINT FK_1BBFE86CAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE department_progress ADD CONSTRAINT FK_1BBFE86CA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT FK_75BEEE3FAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE TABLE "unsubscribe"(id SERIAL NOT NULL, user_id INT DEFAULT NULL)');
        $this->addSql('CREATE INDEX UnsubscribeUser ON unsubscribe (user_id)');
        $this->addSql('ALTER TABLE unsubscribe ADD CONSTRAINT FK_2201F2469D86651F FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE department_progress DROP CONSTRAINT FK_1BBFE86CAE80F5DF');
        $this->addSql('ALTER TABLE discipline DROP CONSTRAINT FK_75BEEE3FAE80F5DF');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649AE80F5DF');
        $this->addSql('ALTER TABLE department_progress DROP CONSTRAINT FK_1BBFE86CA5522701');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT FK_2201F246A5522701');
        $this->addSql('ALTER TABLE progress DROP CONSTRAINT FK_2201F246A76ED395');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE department_progress');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE progress');
        $this->addSql('DROP TABLE "user"');
    }
}
