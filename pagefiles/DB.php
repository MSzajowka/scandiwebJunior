<?php

namespace nameOne;

class DB
{
    private \PDO $dbh;
    private $stmt;
    private string $host;
    private string $name;
    private string $user;
    private string $pass;    

    public function __construct(string $host, string $name, string $user, string $pass) 
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbh = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->name, $this->user, $this->pass);
    }

    public function query(string $query): void
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind(string $param, mixed $value, ?int $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(): void
    {
        $this->stmt->execute();
    }

    public function resultSet(): array
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function lastInsertId(): ?string
    {
        return $this->dbh->lastInsertId();
    }

    public function single(): mixed
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function rowsAffected(): int
    {
        return $this->stmt->rowCount();
    }
}