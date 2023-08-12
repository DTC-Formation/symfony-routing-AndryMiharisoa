<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230805130331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etude (id INT AUTO_INCREMENT NOT NULL, diplome VARCHAR(255) NOT NULL, date_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD etude_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64947ABD362 FOREIGN KEY (etude_id) REFERENCES etude (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64947ABD362 ON user (etude_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64947ABD362');
        $this->addSql('DROP TABLE etude');
        $this->addSql('DROP INDEX IDX_8D93D64947ABD362 ON user');
        $this->addSql('ALTER TABLE user DROP etude_id');
    }
}
