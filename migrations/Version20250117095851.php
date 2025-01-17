<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117095851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours_langages (cours_id INT NOT NULL, langages_id INT NOT NULL, INDEX IDX_E5BB4C17ECF78B0 (cours_id), INDEX IDX_E5BB4C1C88BBA17 (langages_id), PRIMARY KEY(cours_id, langages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours_langages ADD CONSTRAINT FK_E5BB4C17ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_langages ADD CONSTRAINT FK_E5BB4C1C88BBA17 FOREIGN KEY (langages_id) REFERENCES langages (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours_langages DROP FOREIGN KEY FK_E5BB4C17ECF78B0');
        $this->addSql('ALTER TABLE cours_langages DROP FOREIGN KEY FK_E5BB4C1C88BBA17');
        $this->addSql('DROP TABLE cours_langages');
    }
}
