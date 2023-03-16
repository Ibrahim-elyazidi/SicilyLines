<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316104326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, longeur DOUBLE PRECISION NOT NULL, largeur DOUBLE PRECISION NOT NULL, vitesse DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, adresse VARCHAR(70) NOT NULL, cp INT NOT NULL, ville VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, nb_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liaison (id INT AUTO_INCREMENT NOT NULL, port_depart_id INT DEFAULT NULL, port_arrive_id INT DEFAULT NULL, duree INT NOT NULL, INDEX IDX_225AC3794C9CCD3 (port_depart_id), INDEX IDX_225AC37CEC9B4D0 (port_arrive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participer (id INT AUTO_INCREMENT NOT NULL, nombre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periode (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, traversee_id INT DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C84955ED2BB15B (traversee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifer (id INT AUTO_INCREMENT NOT NULL, tarif DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traversee (id INT AUTO_INCREMENT NOT NULL, liaison_id INT DEFAULT NULL, bateau_id INT DEFAULT NULL, date DATE NOT NULL, heure TIME NOT NULL, INDEX IDX_B688F501ED31185 (liaison_id), INDEX IDX_B688F501A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC3794C9CCD3 FOREIGN KEY (port_depart_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37CEC9B4D0 FOREIGN KEY (port_arrive_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED2BB15B FOREIGN KEY (traversee_id) REFERENCES traversee (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501ED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC3794C9CCD3');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37CEC9B4D0');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955ED2BB15B');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501ED31185');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501A9706509');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE liaison');
        $this->addSql('DROP TABLE participer');
        $this->addSql('DROP TABLE periode');
        $this->addSql('DROP TABLE port');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE secteur');
        $this->addSql('DROP TABLE tarifer');
        $this->addSql('DROP TABLE traversee');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
