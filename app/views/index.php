<div class="container">

    <h1>Users</h1>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add new user</button>

    <div class="wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="users">

            </tbody>
        </table>
    </div>

</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add user</h4>
            </div>
            <form method="post" id="formUser">

                <div class="modal-body">

                    <div class="alert alert-success" id="userAdd" style="display: none;">
                        User Added
                    </div>

                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>

    </div>
</div>


<!-- JS -->
<?php
helpers\assets::js(array(
    BASE.'/js/jquery.js',
    BASE.'/js/users.js',
    BASE.'/js/bootstrap.min.js'
))
?>
