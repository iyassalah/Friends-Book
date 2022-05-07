function handleSuccess(data, acc, id) {
  const message = acc ? "request accepted" : "request denied";
  $("#confirm" + id).replaceWith("<h2 class='response'>" + message + " </h2>");
}

function sendConfirm(id1, id2, acc) {
  $.ajax({
    url: "/friends.php",
    dataType: "json",
    type: "Post",
    async: true,
    data: { friend1_id: id1, friend2_id: id2, acc: acc },
    success: (data) => handleSuccess(data, acc, id1),
    error: function (xhr, exception) {
      var msg = "";
      if (xhr.status === 0) {
        msg = "Not connect.\n Verify Network." + xhr.responseText;
      } else if (xhr.status == 404) {
        msg = "Requested page not found. [404]" + xhr.responseText;
      } else if (xhr.status == 500) {
        msg = "Internal Server Error [500]." + xhr.responseText;
      } else if (exception === "parsererror") {
        msg = "Requested JSON parse failed.";
      } else if (exception === "timeout") {
        msg = "Time out error." + xhr.responseText;
      } else if (exception === "abort") {
        msg = "Ajax request aborted.";
      } else {
        msg = "Error:" + xhr.status + " " + xhr.responseText;
      }
    },
  });
}
