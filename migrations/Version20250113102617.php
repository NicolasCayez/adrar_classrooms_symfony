<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250113102617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_8F91ABF079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapitres (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, titre VARCHAR(50) NOT NULL, contenu LONGTEXT NOT NULL, position INT NOT NULL, INDEX IDX_508679FC2E149425 (id_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, id_langage_id INT NOT NULL, id_niveau_id INT NOT NULL, titre VARCHAR(50) NOT NULL, synopsis VARCHAR(100) NOT NULL, niveau SMALLINT NOT NULL, temps_estime INT NOT NULL, image VARCHAR(100) DEFAULT NULL, date DATE NOT NULL, cree SMALLINT NOT NULL, INDEX IDX_FDCA8C9C30F135EB (id_langage_id), INDEX IDX_FDCA8C9C8B0B20A6 (id_niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langages (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_chapitre (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_chapitre_id INT NOT NULL, chapitre_date_inscription DATETIME NOT NULL, chapitre_termine TINYINT(1) NOT NULL, INDEX IDX_921949BA79F37AE5 (id_user_id), INDEX IDX_921949BA7AC228C (id_chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs_chapitres (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF079F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE chapitres ADD CONSTRAINT FK_508679FC2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C30F135EB FOREIGN KEY (id_langage_id) REFERENCES langages (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C8B0B20A6 FOREIGN KEY (id_niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE utilisateur_chapitre ADD CONSTRAINT FK_921949BA79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE utilisateur_chapitre ADD CONSTRAINT FK_921949BA7AC228C FOREIGN KEY (id_chapitre_id) REFERENCES chapitres (id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF079F37AE5');
        $this->addSql('ALTER TABLE chapitres DROP FOREIGN KEY FK_508679FC2E149425');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C30F135EB');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C8B0B20A6');
        $this->addSql('ALTER TABLE utilisateur_chapitre DROP FOREIGN KEY FK_921949BA79F37AE5');
        $this->addSql('ALTER TABLE utilisateur_chapitre DROP FOREIGN KEY FK_921949BA7AC228C');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE chapitres');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE langages');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP TABLE utilisateur_chapitre');
        $this->addSql('DROP TABLE utilisateurs_chapitres');
        $this->addSql('ALTER TABLE `user` DROP nom, DROP prenom, DROP image');
    }
}
