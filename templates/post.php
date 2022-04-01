<?php
function showPost(array $postData)
{
    ['fname' => $fname, 'lname' => $lname, 'content' => $content, 'postdate' => $date] = $postData;
    echo "<div class='post'>";
    echo "<span class='username'> $fname $lname </span>";
    echo "<span class='dateposted'>on $date</span>";
    echo "<p>$content</p>";
    echo "</div>";
}
