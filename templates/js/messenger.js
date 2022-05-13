let msgs = new Set();
/**
 * render message on the timeline
 * @param {*} msgId globally unique message ID
 * @param {*} content message text content
 * @param {*} sender message author
 * @param {*} timestamp when the message was sent
 * @param { boolean } recieved if this message was recieved or sent from the client
 */
function addMessage(msgId, content, sender, timestamp, recieved, failed) {
  if (msgs.has(msgId)) return;
  msgs.add(msgId);
  // TODO find sensible names for sender and recieved
  $("#timeline").append(/*html*/ `
  <div class="msg ${recieved ? "inbox" : "sent"} ${
    failed ? "failed" : "succeeded"
  }" id="msg${msgId}"> 
    <span class="sender">${sender}</span>
    <span class="timestamp">${timestamp}</span>
    <div class="msg-content">${content}</div>
  </div>
`).animate({ scrollTop: $('#timeline').prop("scrollHeight")}, 100);;
}

function handleSent(response) {
  addMessage(
    response.msg_id,
    response.content,
    sender,
    date("Y-m-d H:i:s"),
    false,
    false
  );
}

function postMessage(content) {
  $.ajax({
    type: "post",
    url: `http://localhost:8080/api-send-message.php`,
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    data: { sender: sender, recipient: recipient, content: content },
    dataType: "json",
    success: handleSent,
    error: function (xhr, exception) {
      console.error("failed to fetch messages");
    },
  });
}

function handleClick() {
  const input = document.getElementById("in");
  postMessage(input.value);
  input.value = "";
}

function handleFetch(response) {
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
      msg.sender_id == recipient,
      false
    );
  }
}

function fetchMessages() {
  $.ajax({
    type: "post",
    url: `/api-get-messages.php`,
    headers: { "Content-Type": "application/x-www-form-urlencoded" }, // set to form data type
    data: { sender: sender, recipient: recipient }, // chat ID, those values must exist before calling this by setting them via PHP
    dataType: "json", // tell jquery to expect JSON, removing this causes it to think that the request failed even if it succeeds
    success: handleFetch,
    error: function (xhr, exception) {
      console.error("failed to fetch messages");
    },
  });
}

$(document).ready(function () {
  fetchMessages();
  setInterval(fetchMessages, 2000);
});
