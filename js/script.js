jQuery(document).ready(function () {
    readRecords();
});


function addNewUser() {

    var username                = (jQuery("#username").val()).trim();
    var age                     = (jQuery("#age").val()).trim();
    var email                   = (jQuery("#email").val()).trim();
    var favourite_sports_team   = (jQuery("#favourite_sports_team").val()).trim();

    // Some basic validations
    if (username == "")                     alert("You have to fill out the Username");
    else if (age == "")                     alert("You have to fill out the Age");
    else if (email == "")                   alert("You have to fill out the Email");
    else if (favourite_sports_team == "")   alert("You have to fill out the Favourite Sports Team");
    else {
        jQuery.post("ajax/create.php", {
            username                : username,
            age                     : age,
            email                   : email,
            favourite_sports_team   : favourite_sports_team
        }, function (data, status) {
            // close the popup
            jQuery("#modal_add").modal("hide")

            // read records again
            readRecords();

            // Reset fields
            jQuery("#username").val("");
            jQuery("#age").val("");
            jQuery("#email").val("");
            jQuery("#favourite_sports_team").val("");
        });
    }
}

function DeleteUser(id) {

    var conf = confirm("");
    if (conf == true) {
        jQuery.post("ajax/delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}


function readRecords() {

    jQuery.get("ajax/read.php", {
        // No params
    }, function (data, status) {
        jQuery("#all-users").html(data);
    });
}


function GetUserDetails(id) {

    jQuery("#hidden_user_id").val(id);

    jQuery.post("ajax/details.php", {
            id: id
        },
        function (data, status) {

            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            jQuery("#update_username").val(user.username);
            jQuery("#update_age").val(user.age);
            jQuery("#update_email").val(user.email);
            jQuery("#update_favourite_sports_team").val(user.favourite_sports_team);
        }
    );
    // Open modal popup
    jQuery("#modal_update").modal("show");
}


function UpdateUserDetails() {

    var username                = (jQuery("#update_username").val()).trim();
    var age                     = (jQuery("#update_age").val()).trim();
    var email                   = (jQuery("#update_email").val()).trim();
    var favourite_sports_team   = (jQuery("#update_favourite_sports_team").val()).trim();

    // Some basic validations
    if (username == "")                     alert("You have to fill out the Username");
    else if (age == "")                     alert("You have to fill out the Age");
    else if (email == "")                   alert("You have to fill out the Email");
    else if (favourite_sports_team == "")   alert("You have to fill out the Favourite Sports Team");
    else {
        var id = jQuery("#hidden_user_id").val();

        jQuery.post("ajax/update.php", {
                id                      : id,
                username                : username,
                age                     : age,
                email                   : email,
                favourite_sports_team   : favourite_sports_team
            },
            function (data, status) {
                // hide modal popup
                jQuery("#modal_update").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}