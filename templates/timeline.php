<?php
function timeline(mysqli_result $data)
{
    require_once('../templates/post.php');
    echo "<div class='timeline'>";
    while ($row = mysqli_fetch_assoc($data)) {
        showPost($row);
    }
    echo "</div>";
}
