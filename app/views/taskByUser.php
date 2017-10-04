<div class="container">

    <h1>Tasks of <?=$data->name?></h1>
    <a href="<?=BASE?>/"><button class="btn btn-primary">Back to users</button></a>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add new Task</button>

    <div class="wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>desciption</th>
                    <th>date</th>
                    <th>status</th>
                </tr>
            </thead>

            <tbody id="tasks">

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
            <form method="post" id="formTask">

                <div class="modal-body">

                    <input type="hidden" name="id_user" value="<?=$data->id?>">

                    <div class="alert alert-success" id="TaskAdd" style="display: none;">
                        Task Added
                    </div>

                    <div class="form-group">
                        <label>title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea name="description" class="form-control"required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="TODO">TODO</option>
                            <option value="DOING">DOING</option>
                            <option value="DONE">DONE</option>
                        </select>
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
    BASE.'/js/tasks.js',
    BASE.'/js/bootstrap.min.js'
))
?>

