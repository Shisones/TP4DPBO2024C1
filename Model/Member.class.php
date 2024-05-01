<?php

class Member extends DB {
    function getMember() {
        $query = "SELECT members.*, position.name AS position_name 
            FROM members 
            INNER JOIN position ON members.position = position.id";
        return $this->execute($query);
    }
    
    function getMemberByID($id) {
        $query = "SELECT members.*, position.name AS position_name 
            FROM members 
            INNER JOIN position ON members.position = position.id 
            WHERE members.id = $id";
        return $this->execute($query);
    }

    function createMember($data) {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $position = $data['position'];
        
        $query = "INSERT INTO members VALUES 
                    (null, '$name', '$email', '$phone', '$join_date', '$position')";
                    
                    return $this->execute($query);
                }
                
    function deleteMember($data) {
        $id = $data['id'];
        $query = "DELETE FROM members WHERE id = $id";
        
        return $this->execute($query);
    }
    
    function updateMember($data) {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $position = $data['position'];
    
        $query = "UPDATE members SET 
                    name = '$name', 
                    email = '$email', 
                    phone = '$phone', 
                    join_date = '$join_date',
                    position = $position
                   WHERE id = $id";

        return $this->execute($query);
    }
    
}
