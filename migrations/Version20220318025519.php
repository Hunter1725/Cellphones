<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318025519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE details');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, or_orders_id INT DEFAULT NULL, it_items_id INT NOT NULL, de_quantity INT NOT NULL, de_price INT NOT NULL, de_totalprice INT NOT NULL, INDEX IDX_72260B8AE6B58D99 (or_orders_id), INDEX IDX_72260B8A1CC5C3F9 (it_items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A1CC5C3F9 FOREIGN KEY (it_items_id) REFERENCES items (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8AE6B58D99 FOREIGN KEY (or_orders_id) REFERENCES orders (id)');
    }
}
