
<?php 
include('db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if($result){
        $_SESSION['message'] = "Task deleted successfully";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");
    } else {
        die("Delete error");
    }
}

?>
