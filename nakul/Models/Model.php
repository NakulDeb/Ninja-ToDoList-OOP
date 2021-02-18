<?php

namespace Nakul\Models;

use App\Config\DbConfig;
use Nakul\Models\Query\Create;
use Nakul\Models\Query\Delete;
use Nakul\Models\Query\Get;
use Nakul\Models\Query\Update;

class Model extends DbConfig
{
    use Connect;
    use Create;
    use Get;
    use Update;
    use Delete;

    protected $conn;
    protected $model;



    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->connect();
        $this->model = $this->getModelName();
    }




    function __destruct()
    {
        $this->conn->close();
    }




    protected function getModelName()
    {
        if (!empty($this->table_name))
            return $this->model = $this->table_name;

        if ($pos = strrpos(get_class($this), '\\'))
            return strtolower(substr(get_class($this), $pos + 1)).'s';
        return strtolower($pos).'s';
    }
}