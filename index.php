<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Just another sample project</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="all-users"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_add"><i class="fa fa-user-plus" aria-hidden="true"></i> New User</button>
            </div>
        </div>
    </div>
</div>
<!-- Add User Modal-->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New User Creation Modal</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" id="username" placeholder="User Name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" id="age" placeholder="Age" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" placeholder="Email Address" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="favourite_sports_team">Favourite Sports Team</label>
                    <input type="text" id="favourite_sports_team" placeholder="Favourite Sports Team" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- Update User -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="update_username">UserName</label>
                    <input type="text" id="update_username" placeholder="User Name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="update_age">Age</label>
                    <input type="text" id="update_age" placeholder="Age" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="update_email">Email Address</label>
                    <input type="text" id="update_email" placeholder="Email Address" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="update_favourite_sports_team">Favourite Sports Team</label>
                    <input type="text" id="update_favourite_sports_team" placeholder="Favourite Sports Team" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
</body>
</html>