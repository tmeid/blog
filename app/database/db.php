<?php
include 'connect.php';


function executeQuery($sql, $data){
    global $connect;

    // concat all type of parameters
    $values = array_values($data);
    $types = str_repeat('s', count($values));

    $stm = $connect->prepare($sql);
    $stm->bind_param($types, ...$values);
    $stm->execute();

    return $stm;
}

// select with many conditions, return records
function selectAll($table, $condition = [], $limit = 0, $except = 0){
    global $connect;
    $sql = "SELECT * FROM $table";

    if(empty($condition)){      
        $stm = $connect->prepare($sql);
        $stm->execute();
        $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
       
    }else{
        //return a record that matches the below condition
        // $sql = "SELECT * FROM $table WHERE admin = 1 AND username = 'thuy'";

        $i = 0;
        foreach($condition as $key => $value){
            if($i === 0){
                $sql = $sql . " WHERE $key = ?";
            }else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }
        if($limit > 0){
            $sql = $sql ." LIMIT ?";
            $condition['limit'] = $limit;
        }
        if($except > 0){
            $sql = $sql ." LIMIT ?";
            $condition['limit'] = $limit;
        }
        
        $stm = executeQuery($sql, $condition);
        $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);

    }
    return $records;

}

// return only a record
function selectOne($table, $data){
    $sql = "SELECT * FROM $table";   

    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql . " WHERE $key = ?";
        }else{
            $sql = $sql . " AND $key = ?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    
    $stm = executeQuery($sql, $data);
    $record = $stm->get_result()->fetch_assoc();

    return $record;

}


function create($table, $data){
    // use ? to prevent sql injection
    // $sql = "INSERT INTO table SET admin = ?, username = ?, email = ?, password = ?"
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach($data as $key => $value){
        if($i === 0)
            $sql = $sql . "$key = ?";
        else
            $sql = $sql . ", $key = ?";
        $i++;
    }
    $stm = executeQuery($sql, $data);
    $id = $stm->insert_id;
    // $id is used in selectOne function to display a user infor 
    return $id;
}


function update($table, $id, $data){
    // use ? to prevent sql injection
    // $sql = "UPDATE table SET admin = ?, username = ?, email = ?, password = ? WHERE id = ?"
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach($data as $key => $value){
        if($i === 0)
            $sql = $sql . "$key = ?";
        else
            $sql = $sql . ", $key = ?";
        $i++;
    }

    $sql = $sql . " WHERE id = ?";

    // add 'id' into $data to bind_params
    $data['id'] = $id;
    $stm = executeQuery($sql, $data);
    
    return $stm->affected_rows;
}

// $condition = [
//     'admin' => 1,
//     'username' => 'test3',
//     'email' => 'test1@gmail.com',
//     'password' => '123'
// ];

function delete($table, $id){
    global $connect;
    // $sql = "DELETE FROM $table WHERE id = ?"
    $sql = "DELETE FROM $table WHERE id = ?";

    // $stm = $connect->prepare($sql);
    // $stm->bind_param('i', $id);
    // $stm->execute();

    $stm = executeQuery($sql, ['id' => $id]);
    return $stm->affected_rows;
}

// $id = create('users', $condition);
// $id = delete('users', 2);
// echo $id;
// print_r(selectAll('users', $condition));

function joinTables($table1, $table2, $table3, $id1, $id2a, $id2b, $id3, $key, $id){
    $sql = "SELECT $table3.$key
            FROM $table1
            JOIN $table2
                ON $table1.$id1 = $table2.$id2a
            JOIN $table3
                ON $table2.$id2b = $table3.$id3
            WHERE $table1.$id1 = ?";
    $stm = executeQuery($sql, ['id' => $id]);
    $records =  $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}