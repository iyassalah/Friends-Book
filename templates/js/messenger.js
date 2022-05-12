$(document).ready(() => {
  $.ajax({
    type: "method",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {},
  });
});

function addMessage(msgId, content, sender, timestamp) {
  $("#timeline").prepend(/*html*/ `
  <div class="msg" id="msg${msgId}">
    <span class="sender">${sender}</span>
    <span class="timestamp">${timestamp}</span>
    <div class="msg-content">${content}</div>
  </div>
`);
}
