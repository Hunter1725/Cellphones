<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318082245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09E238517C');
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, or_orders_id INT DEFAULT NULL, it_items_id INT NOT NULL, de_quantity INT NOT NULL, de_price INT NOT NULL, de_totalprice INT NOT NULL, INDEX IDX_72260B8AE6B58D99 (or_orders_id), INDEX IDX_72260B8A1CC5C3F9 (it_items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, us_user_id INT NOT NULL, or_date DATE NOT NULL, or_deliverydate DATE NOT NULL, or_phone VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, or_address LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, or_totalprice NUMERIC(10, 0) NOT NULL, or_status VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E52FFDEE8CC0343B (us_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, us_username VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, us_password LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, us_fullname VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, us_mail VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, us_phone VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, us_address LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, us_role VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8AE6B58D99 FOREIGN KEY (or_orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A1CC5C3F9 FOREIGN KEY (it_items_id) REFERENCES items (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE8CC0343B FOREIGN KEY (us_user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE user1');
    }
}
