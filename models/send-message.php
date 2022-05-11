<?php
function addMessage(string $sender, string $recipient, string $content)
{
    require_once '../helpers/db.php';
    header('Content-Type: application/json; charset=utf-8');
    try {
        $query = "INSERT INTO messages (msg_id, sender_id, recipient_id, content) VALUES (NULL, '$sender', '$recipient', '$content');";
        $result = mysqli_query(db(), $query);
        return boolval($result);
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}

function getMessages(string $sender, string $recipient)
{
    require_once '../helpers/db.php';
    try {
        $query = "SELECT * FROM messages WHERE sender_id = $sender AND recipient_id = $recipient OR sender_id = $recipient AND recipient_id = $sender";
        $result = mysqli_query(db(), $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        throw new Exception("Database error");
    }
}
