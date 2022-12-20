<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221220074240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates admin account';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO user (username, roles, password) VALUES ("admin", \'["ROLE_ADMIN"]\', "$2y$13$MFUfbtQZk3sP4wnVJ84ELOYqGugTlbirKcphHblUL8i5HM5Dm34oq")');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM user WHERE username="admin"');
    }
}
