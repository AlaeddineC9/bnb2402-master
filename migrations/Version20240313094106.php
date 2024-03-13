<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313094106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, offer_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A53C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F53C674EE');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE booking CHANGE voyager_id voyager_id INT NOT NULL, CHANGE offer_id offer_id INT NOT NULL, CHANGE datestart date_start DATETIME NOT NULL');
        $this->addSql('ALTER TABLE equipment CHANGE title title VARCHAR(255) NOT NULL, CHANGE icon icon VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE offer CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE review ADD offer_id INT NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C653C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_794381C653C674EE ON review (offer_id)');
        $this->addSql('ALTER TABLE user ADD addresse VARCHAR(255) DEFAULT NULL, DROP role, DROP adress, CHANGE firstname firstname VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, url VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_C53D045F53C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A53C674EE');
        $this->addSql('DROP TABLE images');
        $this->addSql('ALTER TABLE booking CHANGE offer_id offer_id INT DEFAULT NULL, CHANGE voyager_id voyager_id INT DEFAULT NULL, CHANGE date_start datestart DATETIME NOT NULL');
        $this->addSql('ALTER TABLE equipment CHANGE title title VARCHAR(80) NOT NULL, CHANGE icon icon VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE offer CHANGE title title VARCHAR(80) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(80) NOT NULL, CHANGE country country VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C653C674EE');
        $this->addSql('DROP INDEX IDX_794381C653C674EE ON review');
        $this->addSql('ALTER TABLE review DROP offer_id');
        $this->addSql('ALTER TABLE user ADD role LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD adress VARCHAR(255) NOT NULL, DROP addresse, CHANGE firstname firstname VARCHAR(80) NOT NULL, CHANGE lastname lastname VARCHAR(80) NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL, CHANGE rating rating INT NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL');
    }
}
