<?php

namespace MyFramework\Framework\Database\ORM;

use MyFramework\Framework\Database\Database;
use PDO;

class Query implements QueryInterface
{
    protected string $table;
    private $connection;
    private $data;
    private $query;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function create(array $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $query = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";

        $statement = $this->connection->prepare($query);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();
        $this->data = $data;
        return $this;

    }

    public function update(array $where, array $data)
    {
        $wherePlaceholders = array_map(function ($key) {
            return $key . '=:' . $key;
        }, array_keys($where));
        $whereColumns = "WHERE " . implode(' AND ', $wherePlaceholders);

        $dataPlaceholders = array_map(function ($key) {
            return $key . '=:' . $key;
        }, array_keys($data));
        $dataColumns = implode(', ', $dataPlaceholders);

        $query = "UPDATE $this->table SET $dataColumns $whereColumns";

        $statement = $this->connection->prepare($query);

        foreach (($data + $where) as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        $rowCount = $statement->rowCount();

        $this->query = '';
        $this->data = '';

        return $rowCount > 0;
    }

    public function delete()
    {
        $query = "DELETE FROM $this->table $this->query";
        $statement = $this->connection->prepare($query);

        foreach ($this->data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        $rowCount = $statement->rowCount();

        $this->query = '';
        $this->data = '';

        return $rowCount > 0;
    }

    public function all()
    {
        $query = "SELECT * FROM $this->table";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function get()
    {
        $query = "SELECT * FROM $this->table $this->query";
        $statement = $this->connection->prepare($query);

        foreach ($this->data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $this->data = '';
        $this->query = '';

        return $result;
    }

    public function where(array $whereData)
    {
//        $query = implode(' AND ', getShieldedData($whereData));
        $placeholders = array_map(function ($key) {
            return $key . '=:' . $key;
        }, array_keys($whereData));
        $this->query = "WHERE " . implode(' AND ', $placeholders);
        $this->data = $whereData;

        return $this;
    }
}
