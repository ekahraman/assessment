$(document).ready(function () {
    readRecords();
});


function readRecords() {

    $.post("api/book.php", {
        // No params
        method: "GET",
    }, function (data, status) {

        var json        = JSON.parse(data);
        var skeleton    = '<table id="records" class="table table-hover table-responsive"> <tr><th>Book Name</th><th>Author Name</th><th>ISBN No</th><th>Update / Delete</th></tr>';

        $( ".records_content" ).append(skeleton);

        if (json.length == 0) {
            $( "#records" ).append('<tr class="child">' +
                '<td colspan="4">' +
                    '<p class="bg-danger">Not a single book in the database yet. Why don\'t you create one?</p>' +
                '</td></tr>');
        } else {
            for(i=0; i< Object.keys(json).length; i++) {
                $( "#records" ).append('<tr class="child">' +
                    '<td>' + json[i]["book_name"] + '</td>' +
                    '<td>' + json[i]["author_name"] + '</td>' +
                    '<td>' + json[i]["isbn"] + '</td>' +
                    '<td>' +
                        '<button onclick="bookDetails(' + json[i]['id'] +')" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i></button>' +
                        '<button onclick="deleteBook(' + json[i]['id'] +')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button> ' +
                    '</td>'
                );
            }
        }

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
        $.post("api/book.php", {
            book_name   : book_name,
            author_name : author_name,
            isbn        : isbn,
            method      : "POST"
        }, function (data, status) {
            $("#add_new_book").modal("hide");

            clearTable();
            readRecords();
            // Clear Fields
            $("#book_name").val("");
            $("#author_name").val("");
            $("#isbn").val("");
        });
    }
}


function deleteBook(id) {

    $.post("api/book.php", {
            id: id,
            method:"DELETE"
        },
        function (data, status) {
            clearTable();
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

        $.post("api/book.php", {
                id          : id,
                book_name   : book_name,
                author_name : author_name,
                isbn        : isbn,
                method      : "PUT"
            },
            function (data, status) {
                $("#update_book").modal("hide");
                clearTable();
                readRecords();
            }
        );
    }
}


function bookDetails(id) {

    $("#book_id").val(id);
    $.post("api/book.php", {
            id      : id,
            method  : "SELECT"
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


function clearTable() {
    $( ".records_content" ).empty();

}