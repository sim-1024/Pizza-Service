<?php
declare(strict_types=1);

abstract class BaseModel
{
    protected readonly MySQLi $db;

    public function __construct()
    {
        // This code switches from the the local installation (XAMPP) to the docker installation
        $host = gethostbyname('mariadb') !== 'mariadb' ? 'mariadb' : 'localhost';

        $user = 'public';
        $password = 'public';
        $database = 'pizzaservice';

        if ($database !== 'pizzaservice') {
            echo '<h2>⚠️ Please set your database credentials in BaseModel.php before continuing.</h2>';
            exit;
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