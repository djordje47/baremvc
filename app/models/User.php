<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers()
    {
        $this->db->query('SELECT * FROM employees LIMIT 10');
        return $this->db->resultSet();
    }
}