<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180902061932 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company_profile (id INT AUTO_INCREMENT NOT NULL, employer_id INT NOT NULL, vc_url VARCHAR(100) NOT NULL, vc_description VARCHAR(500) NOT NULL, vc_company_url VARCHAR(100) DEFAULT NULL, vc_video_url VARCHAR(100) DEFAULT NULL, vc_facebook VARCHAR(100) DEFAULT NULL, vc_twitter VARCHAR(100) DEFAULT NULL, vc_linked_in VARCHAR(100) DEFAULT NULL, vc_imagepath VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_A105B0D841CD9E7A (employer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_profile ADD CONSTRAINT FK_A105B0D841CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE company_profile');
    }
}
