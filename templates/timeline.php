<?php
function timeline(mysqli_result $data)
{
    echo "<div class='timeline'>";
    while ($row = mysqli_fetch_assoc($data)) {
        showPost($row);
    }
    echo "</div>";
}
