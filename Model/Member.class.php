<?php

class Member extends DB {
    function getMember() {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }
    
    function getMemberByID($id) {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function createMember($data) {
        print_r($data);
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO members VALUES 
                    (null, '$name', '$email', '$phone', '$join_date')";
                    
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
    
        $query = "UPDATE members SET 
                    name = '$name', 
                    email = '$email', 
                    phone = '$phone', 
                    join_date = '$join_date' 
                  WHERE id = '$id'";

        return $this->execute($query);
    }
    
}
