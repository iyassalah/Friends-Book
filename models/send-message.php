<?php
require_once '../helpers/db.php';

function addMessage(string $sender, string $recipient, string $content)
{
    try {
        $sender = mysqli_real_escape_string(db(), $sender);
        $recipient = mysqli_real_escape_string(db(), $recipient);
        $content = mysqli_real_escape_string(db(), $content);
        $query = "INSERT INTO messages (msg_id, sender_id, recipient_id, content) VALUES (NULL, '$sender', '$recipient', '$content');";
        $conn = db(); // you need to store it for some reason  other wise it would not work
        $result = mysqli_query($conn, $query); // FIXME figure out why you have to store db() instead of calling it twice
        return mysqli_insert_id($conn);
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}

function getMessages(string $sender, string $recipient)
{
    try {
        $query = "SELECT * FROM messages WHERE sender_id = $sender AND recipient_id = $recipient OR sender_id = $recipient AND recipient_id = $sender";
        $result = mysqli_query(db(), $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}
