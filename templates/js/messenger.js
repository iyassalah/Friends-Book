/**
 * render message on the timeline 
 * @param {*} msgId globally unique message ID
 * @param {*} content message text content
 * @param {*} sender message author
 * @param {*} timestamp when the message was sent
 * @param { boolean } recieved if this message was recieved or sent from the client
 */
function addMessage(msgId, content, sender, timestamp, recieved) {
  $("#timeline").prepend(/*html*/ `
  <div class="msg ${recieved ? "inbox" : "sent"}" id="msg${msgId}"> // TODO find sensible names for sender and recieved
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
    headers: { "Content-Type": "application/x-www-form-urlencoded" }, // set to form data type
    data: { sender: sender, recipient: recipient }, // chat ID, those values must exist before calling this by setting them via PHP
    dataType: "json", // tell jquery to expect JSON, removing this causes it to think that the request failed even if it succeeds
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
