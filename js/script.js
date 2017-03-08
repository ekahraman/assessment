$(document).ready(function () {
    readRecords();
});


function readRecords() {

    $.get("ajax/read.php", {
        // No params
    }, function (data, status) {
        $(".records_content").html(data);
    });
}


function addBook() {

    var book_name   = ($("#book_name").val()).trim();
    var author_name = ($("#author_name").val()).trim();
    var isbn        = ($("#isbn").val()).trim();

    // Some basic validation
    if (book_name == "")            alert("First name field is required!");
    else if (author_name == "")     alert("Last name field is required!");
    else if (isbn == "")            alert("isbn field is required!");
    else {
        $.post("ajax/create.php", {
            book_name   : book_name,
            author_name : author_name,
            isbn        : isbn
        }, function (data, status) {
            $("#add_new_book").modal("hide");

            readRecords();
            // Clear Fields
            $("#book_name").val("");
            $("#author_name").val("");
            $("#isbn").val("");
        });
    }
}


function deleteBook(id) {

    $.post("ajax/delete.php", {
            id: id
        },
        function (data, status) {
            readRecords();
        }
    );
}


function updateBook() {

    var book_name = ($("#update_book_name").val()).trim();
    var author_name = ($("#update_author_name").val()).trim();
    var isbn = ($("#update_isbn").val()).trim();

    // Some basic validation
    if (book_name == "")            alert("First name field is required!");
    else if (author_name == "")     alert("Last name field is required!");
    else if (isbn == "")            alert("isbn field is required!");
    else {
        var id = $("#book_id").val();

        $.post("ajax/update.php", {
                id          : id,
                book_name   : book_name,
                author_name : author_name,
                isbn        : isbn
            },
            function (data, status) {
                $("#update_book").modal("hide");

                readRecords();
            }
        );
    }
}


function bookDetails(id) {

    $("#book_id").val(id);
    $.post("ajax/details.php", {
            id: id
        },
        function (data, status) {
            var json = JSON.parse(data);

            $("#update_book_name").val(json.book_name);
            $("#update_author_name").val(json.author_name);
            $("#update_isbn").val(json.isbn);
        }
    );
    $("#update_book").modal("show");
}