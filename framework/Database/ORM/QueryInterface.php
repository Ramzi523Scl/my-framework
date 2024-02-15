<?php

namespace MyFramework\Framework\Database\ORM;

interface QueryInterface
{
    public function create(array $data);
    public function update(array $where, array $data);
    public function delete();
    public function all();
    public function find(int $id);
    public function where(array $whereData);
}