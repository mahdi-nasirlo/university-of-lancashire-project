<?php
/*
     * Returns rows from the database 
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
function select($conditions = array(), $tableName)
{
    global $conn;
    $sql = 'SELECT * FROM ' .  $tableName;
    if (!empty($conditions) && is_array($conditions)) {
        $sql .= ' WHERE ';
        $i = 0;
        foreach ($conditions as $key => $value) {
            $pre = ($i > 0) ? ' AND ' : '';
            $sql .= $pre . $key . " = '" . $value . "'";
            $i++;
        }
    }

    $stm = $conn->prepare($sql);
    $stm->execute();
    if ($stm) {
        // return $sql;
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

/*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
function insert($tableName, $data)
{
    global $conn;
    if (!empty($data) && is_array($data)) {
        $columns = '';
        $values  = '';
        $i = 0;
        foreach ($data as $key => $val) {
            $pre = ($i > 0) ? ', ' : '';
            $columns .= $pre . $key;
            $values  .= $pre . "'" . $val . "'";
            $i++;
        }
        $query = "INSERT INTO " .  $tableName . " (" . $columns . ") VALUES (" . $values . ")";
        $stm = $conn->prepare($query);
        $stm->execute();
        return $stm;
    } else {
        return false;
    }
}

function filterProduct($search, $type)
{
    global $conn;

    $sql = "select * from " . constant("PRODUCT");
    $types = ['UCLan Hoodie', 'UCLan Logo Tshirt', 'UCLan Logo Jumper'];

    $sql = $sql . ' where';
    $search = !empty($search) ? $search : "";
    $like = strlen($search) > 0 ? ' product_title LIKE "%' . $search . '%"' : '';
    $type = !empty($type) ?
        in_array($_GET['type'], $types) ? " product_type='" . $type . "'" : " product_type=''" : "";
    $sql = $sql . $like . $type;

    $stm = $conn->prepare($sql);
    $stm->execute();
    if ($stm) {
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } else
        return $sql;
}
