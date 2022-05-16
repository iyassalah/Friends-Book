function handleSent(count, res) {
  const { post_id, OP } = res;
  if (OP === "ADD") {
    $("#like-button" + post_id)
      .addClass("liked")
      .text(`Like (${count + 1})`);
  } else if (OP === "DEL") {
    $("#like-button" + post_id)
      .removeClass("liked")
      .text(`Like (${count})`);
  }
}

function postLike(post_id, user_id, count) {
  const OP = $("#like-button" + post_id).hasClass("liked") ? "DEL" : "ADD";
  $.ajax({
    type: "post",
    url: `/api-send-like.php`,
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    data: { OP: OP, post_id: post_id, user_id: user_id },
    dataType: "json",
    success: (res) => handleSent(count, res),
    error: function (xhr, exception) {
      console.error("failed to fetch messages");
    },
  });
}
