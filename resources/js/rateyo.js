$(function () {
  $("#rateYo").rateYo({
  rating: 0,
  fullStar: true,
  onSet: function (rating, rateYoInstance) {
    $('#voteStar').val(rating);
  }
  });
});

$(function () {
  $("#rateYoEdit").rateYo({
  rating: 0,
  fullStar: true,
  onSet: function (rating, rateYoInstance) {
    $('#voteStarEdit').val(rating);
    }
  });
});

$(function () {
  $("#rateYoUser").rateYo({
  rating: $('#number_star').val(),
  readOnly: true,
  });
});
