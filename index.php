<?php
include 'foo.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>GARAGE</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create">ADD CAR</button>
            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#create_user">ADD USER</button>
            <table class="table table-striped table-hover mt-2">
            <thead class="table-dark">
            <th>ID</th>
            <th>User</th>
            <th>Cars</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php foreach($all_cars as $res) { ?>
            <tr>
                <td><?php echo $res->id;?></td>
                <td><?php echo $res->name;?></td>
                <td><?php echo $res->cars;?></td>
                <td>
                <a href="?id=<?php echo $res->id;?>" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $res->id;?>"><i class="fa fa-edit"></i></a>
                <a href="?id=<?php echo $res->id;?>" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->id;?>"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
                <!-- Modal edit-->
                <div class="modal fade" id="edit<?php echo $res->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="?id=<?php echo $res->id;?>" method="post">
                                    <div class="form-group">
                                        <small>Name</small>
                                        <select name="name" value="<?php echo $res->user_id; ?>" size="3" class="form-control" id="exampleFormControlSelect1">
                                            <?php foreach ($all_users as $user_res) {?>
                                                <option <?php if($user_res->name == $res->name){ ?> selected <?php } ?> value="<?php echo $user_res->user_id; ?>"><?php echo $user_res->name; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <small>Cars</small>
                                        <input type="text" class="form-control" name="cars" value="<?php echo $res->cars;?>">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal edit-->
                <!-- Modal delete-->
                <div class="modal fade" id="delete<?php echo $res->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete record №<?php echo $res->id;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-footer">
                                <form action="?id=<?php echo $res->id;?>" method="post">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal delete-->
            <?php } ?>
            </tbody>
            </table>

        </div>

    </div>

</div>

<!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>Name</small>
                        <select name="name" value="<?php echo $res->user_id; ?>" size="3" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($all_users as $user_res) {?>
                                <option value="<?php echo $user_res->user_id; ?>"><?php echo $user_res->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <small>Cars</small>
                        <input type="text" class="form-control" name="cars">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal create-->
<!-- Modal create user-->
<div class="modal fade" id="create_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>Name</small>
                        <input type="text" class="form-control" name="name">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add_user">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal create user-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>