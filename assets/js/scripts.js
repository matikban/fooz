jQuery(document).ready(function ($) {
  function fetchBooks() {
    $.ajax({
      url: fooz_ajax_object.ajax_url,
      type: "POST",
      dataType: "json",
      data: {
        action: "get_books",
      },
      success: function (response) {
        if (response.success) {
          console.log("Books:", response.data);
        } else {
          console.error("No books found");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      },
    });
  }

  fetchBooks();
});
