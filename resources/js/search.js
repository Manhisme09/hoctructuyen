$(document).ready(function() {
  $('#show_search').hide();
  $('#search-ajax').keyup(function() {
    var search = $('#search-ajax').val();
    if (search != '') {
      $.ajax({
        url: '/ajax-search-product/?key=' + search,
        type: "GET",
        data: {
          search: search
        },
        success: function(data) {
          $('#show_search').show(100);
          $('#show_search').html(data);
        }
      })
    }else {
      $('#show_search').hide();
      $('#show_search').html('');
    }
  })
})
