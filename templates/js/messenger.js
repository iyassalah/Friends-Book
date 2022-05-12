function addMessage(msgId, content, sender, timestamp, recieved) {
  $("#timeline").prepend(/*html*/ `
  <div class="msg ${recieved ? "inbox" : "sent"}" id="msg${msgId}">
    <span class="sender">${sender}</span>
    <span class="timestamp">${timestamp}</span>
    <div class="msg-content">${content}</div>
  </div>
`);
}
$(document).ready(() => {
  $.ajax({
    type: "post",
    url: `http://localhost:8080/api-get-messages.php`,
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    data: { sender: sender, recipient: recipient },
    dataType: "json",
    success: function (response) {
      console.log(response);
      for (const msg of response.data) {
        console.log(msg);
        console.log(recipient);
        console.log(msg.sender_id);

        addMessage(
          msg.msg_id,
          msg.content,
          msg.sender_id,
          msg.timestamp,
          msg.sender_id == recipient
        );
      }
    },
    error: function (xhr, exception) {
      console.error("failed to fetch messages");
    },
  });
});
