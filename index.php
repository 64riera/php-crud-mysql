<?php include('db.php') ?>
<?php include('includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>   
            <div class="card card-body">
                <h5 class="card-title">Add a task</h5>
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="description" class="form-control" rows="2" placeholder="Task description" required></textarea>
                    </div>
                    <input type="submit" name="save_task" value="Save task" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tasks";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">Edit</a>
                            <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-block">Delete</a>
                        </td>
                    </tr>
                    <?php }?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>
