<?php
    function checkUser($username, $password, $queryResult) {
        while ($row = mysqli_fetch_array($queryResult)) {
            if ($row[0] == $username and $row[1] == $password) 
                return 1;
        }
        return 0;
    }
?>