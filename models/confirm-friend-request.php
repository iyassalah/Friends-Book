<?php
function deleteFriend($id1, $id2)
{
    require_once('../helpers/db.php');
    $query = "DELETE FROM friendships WHERE friend2_id = $id2 AND friend1_id = $id1 OR friend2_id = $id1 AND friend1_id = $id2";
    $result = mysqli_query(db(), $query);
    if ($result)    
    {
        return $result;
    }
    else
    {
        throw new Exception('Database error');
    }
}
