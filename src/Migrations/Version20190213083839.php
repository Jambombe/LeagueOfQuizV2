<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190213083839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE question ADD parent_game_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD parent_question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7750BE4CF FOREIGN KEY (parent_question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7750BE4CF ON reponse (parent_question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE question DROP parent_game_id');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7750BE4CF');
        $this->addSql('DROP INDEX IDX_5FB6DEC7750BE4CF ON reponse');
        $this->addSql('ALTER TABLE reponse DROP parent_question_id');
    }
}
