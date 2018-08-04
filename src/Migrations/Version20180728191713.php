<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180728191713 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE jobseeker (id INT AUTO_INCREMENT NOT NULL, vc_login VARCHAR(100) NOT NULL, vc_email VARCHAR(255) NOT NULL, vc_password VARCHAR(255) NOT NULL, vc_firstname VARCHAR(100) NOT NULL, vc_secondname VARCHAR(100) DEFAULT NULL, vc_surname VARCHAR(100) NOT NULL, vc_profilepic VARCHAR(255) DEFAULT NULL, vc_phone VARCHAR(100) DEFAULT NULL, vc_facebooklogin VARCHAR(255) DEFAULT NULL, bo_sex TINYINT(1) DEFAULT NULL, dt_dob DATETIME DEFAULT NULL, vc_location VARCHAR(255) DEFAULT NULL, db_latitude DOUBLE PRECISION DEFAULT NULL, db_longitude VARCHAR(255) DEFAULT NULL, vc_about VARCHAR(255) DEFAULT NULL, bo_allowinsearches TINYINT(1) DEFAULT NULL, it_jobseekerstatus SMALLINT DEFAULT NULL, bo_subscriptionletter TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobseeker_resume (id INT AUTO_INCREMENT NOT NULL, jobseeker_id INT NOT NULL, vc_coverletter VARCHAR(255) DEFAULT NULL, vc_cvpath VARCHAR(255) NOT NULL, it_priority SMALLINT NOT NULL, it_cvstatus SMALLINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_1918C5F04CF2B5A9 (jobseeker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobseeker_social_links (id INT AUTO_INCREMENT NOT NULL, jobseeker_id INT NOT NULL, vc_facebook VARCHAR(255) DEFAULT NULL, vc_googleplus VARCHAR(255) DEFAULT NULL, vc_linkedin VARCHAR(255) DEFAULT NULL, vc_twitter VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_3FE0A0434CF2B5A9 (jobseeker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jobseeker_resume ADD CONSTRAINT FK_1918C5F04CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES jobseeker (id)');
        $this->addSql('ALTER TABLE jobseeker_social_links ADD CONSTRAINT FK_3FE0A0434CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES jobseeker (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jobseeker_resume DROP FOREIGN KEY FK_1918C5F04CF2B5A9');
        $this->addSql('ALTER TABLE jobseeker_social_links DROP FOREIGN KEY FK_3FE0A0434CF2B5A9');
        $this->addSql('DROP TABLE jobseeker');
        $this->addSql('DROP TABLE jobseeker_resume');
        $this->addSql('DROP TABLE jobseeker_social_links');
    }
}
