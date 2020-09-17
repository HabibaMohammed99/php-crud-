<?php

require_once 'config/db-connect.php';

$email = $title = $ingredients = '';
$error = array('email'=>'','title'=>'','ingredients'=>'');
if(isset($_POST['submit']))
{
    if(empty($_POST['email'])){
        $error['email'] = "an emial is required </br>";
    }else{
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email']= "email must be a validate Email Address</br>";
        }
    }
    
    if(empty($_POST['title'])){
        $error['title']= "a title is required</br>";
    }else{
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $error['title']= "title must be letter and space only</br>";
        }
    }

    if(empty($_POST['ingredients'])){
        $error['ingredients']= "an ingredients is required<br>";
    }else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $error['ingredients']= "ingredients must be a letter and space only</br>";
        }
    }
    if(array_filter($error)){

    }else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $ingredients = mysqli_real_escape_string($conn,$_POST['ingredients']);

        $sql = "INSERT INTO pizzas(email,title,ingredients) VALUE('$email','$title','$ingredients')";
        $result = mysqli_query($conn , $sql);
        if($result)
        {

            header('location:index.php');
        }
        else
        {
            echo "query error :".mysqli_error($conn);
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'templates/header.php'; ?>

<section class="container grey-text" >
    <h4 class="center">Add a Pizza</h4>
    <form action="<?php echo$_SERVER['PHP_SELF']?>" method="POST" class="white">
    <label>Your Email:</label>
    <input type="text" name="email" value="<?php echo $email ?>">
    <div class="red-text"><?php echo $error['email'] ?></div>
    <label>Title:</label>
    <input type="text" name="title" value="<?php echo $title ?>">
    <div class="red-text"><?php echo $error['title'] ?></div>
    <label>ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
    <div class="red-text"><?php echo $error['ingredients'] ?></div>
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
    </form>
</section>

<?php require_once 'templates/footer.php'; ?>