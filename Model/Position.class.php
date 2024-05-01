<?php

class Position extends DB {
    function getPosition() {
        $query = "SELECT * FROM position";
        return $this->execute($query);
    }
    
    function getPositionByID($id) {
        $query = "SELECT * FROM position WHERE id=$id";
        return $this->execute($query);
    }

    function createPosition($data) {
        $name = $data['name'];

        $query = "INSERT INTO position VALUES 
                    (null, '$name')";
                    
        return $this->execute($query);
    }

    function deletePosition($data) {
        $id = $data['id'];
        $query = "DELETE FROM position WHERE id = $id";

        return $this->execute($query);
    }

    function updatePosition($data) {
        $id = $data['id'];
        $name = $data['name'];
    
        $query = "UPDATE position SET 
                    name = '$name'
                   WHERE id = $id";

        return $this->execute($query);
    }
}
