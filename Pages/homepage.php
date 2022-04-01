<style>
    <?php include '../Styles/timeline.css'; ?>
</style>
<?php
session_start();
include('../models/get-posts.php');
include('../templates/timeline.php');
echo implode($_SESSION["data"]);
timeline(getPosts($_SESSION["data"]["user_id"]));
