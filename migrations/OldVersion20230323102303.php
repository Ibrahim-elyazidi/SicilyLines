<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323102303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE categorie_bateau ADD CONSTRAINT FK_20421A63BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        //$this->addSql('ALTER TABLE categorie_bateau ADD CONSTRAINT FK_20421A63A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        //$this->addSql('ALTER TABLE equipement_bateau ADD CONSTRAINT FK_F0F14295806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        //$this->addSql('ALTER TABLE equipement_bateau ADD CONSTRAINT FK_F0F14295A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        //$this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC3794C9CCD3 FOREIGN KEY (port_depart_id) REFERENCES port (id)');
        //$this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37CEC9B4D0 FOREIGN KEY (port_arrive_id) REFERENCES port (id)');
        //$this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC379F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        //$this->addSql('CREATE INDEX IDX_225AC3794C9CCD3 ON liaison (port_depart_id)');
        //$this->addSql('CREATE INDEX IDX_225AC37CEC9B4D0 ON liaison (port_arrive_id)');
        //$this->addSql('CREATE INDEX IDX_225AC379F7E4405 ON liaison (secteur_id)');
        //$this->addSql('ALTER TABLE tarifer ADD periode_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFF384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id)');
        //$this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        //$this->addSql('CREATE INDEX IDX_6904C4FFF384C1CF ON tarifer (periode_id)');
        //$this->addSql('CREATE INDEX IDX_6904C4FFC54C8C93 ON tarifer (type_id)');
        //$this->addSql('ALTER TABLE traversee ADD liaison_id INT DEFAULT NULL, ADD bateau_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501ED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        //$this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        //$this->addSql('CREATE INDEX IDX_B688F501ED31185 ON traversee (liaison_id)');
        //$this->addSql('CREATE INDEX IDX_B688F501A9706509 ON traversee (bateau_id)');
        //$this->addSql('ALTER TABLE type ADD categorie_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        //$this->addSql('CREATE INDEX IDX_8CDE5729BCF5E72D ON type (categorie_id)');
        //$this->addSql('ALTER TABLE type_reservation ADD CONSTRAINT FK_9D19EC4B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        //$this->addSql('ALTER TABLE type_reservation ADD CONSTRAINT FK_9D19EC4C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFF384C1CF');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFC54C8C93');
        $this->addSql('DROP INDEX IDX_6904C4FFF384C1CF ON tarifer');
        $this->addSql('DROP INDEX IDX_6904C4FFC54C8C93 ON tarifer');
        $this->addSql('ALTER TABLE tarifer DROP periode_id, DROP type_id');
        $this->addSql('ALTER TABLE type_reservation DROP FOREIGN KEY FK_9D19EC4B83297E7');
        $this->addSql('ALTER TABLE type_reservation DROP FOREIGN KEY FK_9D19EC4C54C8C93');
        $this->addSql('ALTER TABLE categorie_bateau DROP FOREIGN KEY FK_20421A63BCF5E72D');
        $this->addSql('ALTER TABLE categorie_bateau DROP FOREIGN KEY FK_20421A63A9706509');
        $this->addSql('ALTER TABLE equipement_bateau DROP FOREIGN KEY FK_F0F14295806F0F5C');
        $this->addSql('ALTER TABLE equipement_bateau DROP FOREIGN KEY FK_F0F14295A9706509');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501ED31185');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501A9706509');
        $this->addSql('DROP INDEX IDX_B688F501ED31185 ON traversee');
        $this->addSql('DROP INDEX IDX_B688F501A9706509 ON traversee');
        $this->addSql('ALTER TABLE traversee DROP liaison_id, DROP bateau_id');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729BCF5E72D');
        $this->addSql('DROP INDEX IDX_8CDE5729BCF5E72D ON type');
        $this->addSql('ALTER TABLE type DROP categorie_id');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC3794C9CCD3');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37CEC9B4D0');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC379F7E4405');
        $this->addSql('DROP INDEX IDX_225AC3794C9CCD3 ON liaison');
        $this->addSql('DROP INDEX IDX_225AC37CEC9B4D0 ON liaison');
        $this->addSql('DROP INDEX IDX_225AC379F7E4405 ON liaison');
    }
}
