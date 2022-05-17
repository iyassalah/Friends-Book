<?php
function showCommentCard(mysqli_result $data)
{
    echo "<div class='d-flex flex-column flex-wrap flex-width'>";
    ['fname' => $fname, 'lname' => $lname, 'content' => $content, 'date_added' => $date,] = $commentData;
    echo "<div class='d-flex flex-column rounded-border card-body dark-card post-width'>";
    echo "<div class='d-flex flex-row justify-content-between text-center'>";
    echo "<span><h5 class='card-title pfont heading-color'> $fname $lname </h5></span>";
    echo "<span class='card-subtitle mb-2 text-muted small-font pfont'>on $date</span></br>";
    echo "<p class='card-text text-color'>$content</p>";
    echo "</div>";
}
