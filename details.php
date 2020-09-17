<?php 
require_once 'config/db-connect.php';

if(isset($_POST['delete']))
{

    $id_to_delete =mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    //get query
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    $result= mysqli_query($conn ,$sql);
    if($result){
        header('location: index.php');
    }else{
        echo "query error".mysqli_error($conn);
    }
}

if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($conn , $_GET['id']);
    
    // get query
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    
    //get the query results 
    $result = mysqli_query($conn,$sql);
    
    // fetch result in arry formate 
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php require_once 'templates/header.php'; ?>

<div class="container center ">
    <?php if($pizza): ?>
    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p><?php echo htmlspecialchars($pizza['email']); ?></p>
    <p><?php echo date($pizza['created-at']); ?></p>
    <h5>Ingredients</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>


<form method="POST" action="details.php">
<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
</form>
    <?php else: ?>
    <h4>No such pizza exists!</h4>
    <?php endif; ?>
</div>

<?php require_once 'templates/footer.php'; ?>


</html>