<?php


namespace Nakul\Models\Query;


trait Delete
{

    private function serveDelete($query)
    {
        $result = $this->conn->query($query);
        if ($result === false) {
            die('Shomthing worng ' . $query. ' ' . $this->conn->error);
        }
    }





    public function delete($condition)
    {
        $conditionSets = array();

        foreach($condition as $key => $value) {
            $conditionSets[] = "`".$key . "` = '" . $value . "'";
        }

        $query = "DELETE FROM $this->model WHERE " . join(" AND ", $conditionSets);
        $this->serveDelete($query);
    }




    
    public function deleteWithFullQuery($query)
    {
        $this->serveDelete($query);
    }

}