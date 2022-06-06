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
// optional: limit, execpt for some values
function selectAll($table, $condition = [], $limit = 0, $except = [], $desc = false){
    global $connect;
    $sql = "SELECT * FROM $table";

    if(empty($condition)){      
        $stm = $connect->prepare($sql);
        $stm->execute();
        $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
       
    }else{
        //return a record that matches the below condition
        // $sql = "SELECT * FROM $table WHERE admin = 1 AND username = 'abc'";

        $i = 0;
        foreach($condition as $key => $value){
            if($i === 0){
                $sql = $sql . " WHERE $key = ?";
            }else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }
        if(!empty($except)){
            foreach($except as $key => $value){
                $sql = $sql . " AND $key != ?";
                $condition[$key] = $value;
            }
        }
        if($limit > 0){
            $sql = $sql ." LIMIT ?";
            $condition['limit'] = $limit;
        }
        if($desc === true){
            $sql = $sql ." ORDER BY ID DESC";
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
            WHERE $table1.$id1 = ?
            ORDER BY $table3.id DESC";
    $stm = executeQuery($sql, ['id' => $id]);
    $records =  $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}

function search($data){
    $item = '%' .$data .'%';
    $sql = "SELECT title, description, slug FROM post WHERE published = ? AND (title LIKE ? OR content LIKE ?) ORDER BY id DESC";
    $stm = executeQuery($sql, ['published' => 1, 'title' => $item, 'content' => $item]);
    $records =  $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// SELECT * FROM `post` p JOIN `category` c ON p.category_id = c.id WHERE c.id = 2 AND p.published = 1;
function selectPostSameCategory($table1, $table2, $id1, $id2, $condition){
    $sql = "SELECT t1.id, t1.title, t1.description, t1.slug, t1.img, t1.author_id, t1.created_at 
                FROM $table1 t1 JOIN $table2 t2 ON t1.$id1 = t2.$id2";
    $i = 0;
    foreach($condition as $key => $value){
        if($i === 0){
            $sql = $sql . " WHERE t1.$key = ?";
        }else{
            $sql = $sql . " AND t2.$key = ?";
        }
        $i++;
    }
    $stm = executeQuery($sql, $condition);
    $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
   

}