<?php
declare(strict_types=1);

abstract class BaseModel
{
    protected readonly MySQLi $db;

    public function __construct()
    {
        $host = "mariadb";
        $user = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");
        $database = getenv("DB_NAME");

        if ($database !== 'pizzaservice') {
            throw new RuntimeException('Database configuration is missing.');
        }

        $this->db = new MySQLi($host, $user, $password, $database);

        if ($this->db->connect_error) {
            throw new Exception('DB connection failed: ' . $this->db->connect_error);
        }

        if (!$this->db->set_charset('utf8mb4')) {
            throw new Exception('Error setting charset: ' . $this->db->error);
        }
    }

    public function __destruct()
    {
        if (isset($this->db)) {
            $this->db->close();
        }
    }
}