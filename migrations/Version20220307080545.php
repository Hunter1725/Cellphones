<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307080545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, or_orders_id INT DEFAULT NULL, it_items_id INT NOT NULL, de_quantity INT NOT NULL, de_price INT NOT NULL, de_totalprice INT NOT NULL, INDEX IDX_72260B8AE6B58D99 (or_orders_id), INDEX IDX_72260B8A1CC5C3F9 (it_items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE items (id INT AUTO_INCREMENT NOT NULL, cat_category_id INT NOT NULL, it_name VARCHAR(50) NOT NULL, it_imange VARCHAR(50) NOT NULL, it_description LONGTEXT NOT NULL, it_price NUMERIC(10, 0) NOT NULL, INDEX IDX_E11EE94DD821BD43 (cat_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, us_user_id INT NOT NULL, or_date DATE NOT NULL, or_deliverydate DATE NOT NULL, or_phone VARCHAR(12) NOT NULL, or_address LONGTEXT NOT NULL, or_totalprice NUMERIC(10, 0) NOT NULL, or_status VARCHAR(200) NOT NULL, INDEX IDX_E52FFDEE8CC0343B (us_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, us_username VARCHAR(50) NOT NULL, us_password LONGTEXT NOT NULL, us_fullname VARCHAR(50) NOT NULL, string VARCHAR(50) DEFAULT NULL, us_phone VARCHAR(12) NOT NULL, us_address LONGTEXT NOT NULL, us_role VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8AE6B58D99 FOREIGN KEY (or_orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A1CC5C3F9 FOREIGN KEY (it_items_id) REFERENCES items (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DD821BD43 FOREIGN KEY (cat_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE8CC0343B FOREIGN KEY (us_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DD821BD43');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8A1CC5C3F9');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8AE6B58D99');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE8CC0343B');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE details');
        $this->addSql('DROP TABLE items');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE `user`');
    }
}
