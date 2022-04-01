<style>
    <?php include '../Styles/timeline.css'; ?>
</style>
<?php
include('../models/get-posts.php');
include('../templates/timeline.php');
timeline(getPosts(22));
