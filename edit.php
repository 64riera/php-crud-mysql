
<?php include('db.php') ?>
<?php include('includes/header.php') ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = mysqli_fetch_array(mysqli_query($conn, $query));
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

    $query = "UPDATE tasks SET description = '$description', title = '$title' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if($result){
        $_SESSION['message'] = "Task updated successfully";
        $_SESSION['message_type'] = "info";
        header("Location: index.php");
    } else {
        die("Update error");
    }
    }
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card card-body">
                <h5 class="card-title">
                    Edit Task
                </h5>
                <form action="edit.php?id=<?php echo $result['id'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" required placeholder="Title" value="<?php echo $result['title'] ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" required placeholder="Description"><?php echo $result['description'] ?></textarea>
                    </div>
                    <input type="submit" value="Edit task" class="btn btn-info btn-block" name="update">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>