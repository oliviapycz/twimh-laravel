$(document).ready(function() {
      $("#search_text").autocomplete({
            source: "search/autocomplete",
            minLength: 2,
            select: function(event, ui) {
                  $('#search_text').val(ui.item.value);
            }
      });

      $(".add_an_ingredient").hide();
      $(".add_ingredient").click(function() {
            $(".add_an_ingredient").show();
            $(".add_ingredient").hide();
      });

});



