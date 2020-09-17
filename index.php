<!DOCTYPE html>
<html lang="en">

<?php
require_once 'config/db-connect.php';
// make query
$sql = "SELECT * FROM pizzas";

// get result
$result = mysqli_query($conn,$sql);

// fetch the result
$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result from memory 
mysqli_free_result($result);

//close connection
mysqli_close($conn);
explode(',',$pizzas[0]['ingredients']);

?>

<?php require_once 'templates/header.php'; ?>
<h5 class=" grey-text center ">Pizza!</h5>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
            <div class="col md3 s6">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
                        <ul>
                            <?php foreach (explode(',',$pizza['ingredients']) as $ingred): ?>
                            <li><?php echo $ingred ?></li>
                            <?php endforeach;?>       
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

        
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>