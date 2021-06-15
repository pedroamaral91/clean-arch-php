<?php

declare(strict_types=1);

namespace Clean\Api\Infra\Db\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615010859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE IF NOT EXISTS customers (
            id serial PRIMARY KEY,
            name varchar null,
            email varchar null,
            cpf varchar null,
            password text null,
            birthday date null,
            phone varchar null
        )
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE customers");
    }
}
