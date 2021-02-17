<?php

namespace App\Config;


class DbConfig
{
    protected $db_host;

    protected $db_username;

    protected $db_name;

    protected $db_pass;

    
    public function __construct()
    {
        $this->db_host     = $_ENV['DB_HOSTNAME'];
        $this->db_username = $_ENV['DB_USERNAME'];
        $this->db_name     = $_ENV['DB_NAME'];
        $this->db_pass     = $_ENV['DB_PASSWORD'];

    }
}