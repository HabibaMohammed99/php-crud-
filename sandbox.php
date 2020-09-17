<?php 

$file = 'test.txt';
// if(file_exists($file)){
//     //copy file
//     // copy($file,'me.txt');
//     echo readfile($file)."<br>";
//     echo realpath($file)."<br>";
//     echo filesize($file);
//     // echo rename($file,'emo.txt');  
// }
// else
// {
//     echo "file not exists";
// }
// mkdir('quote');
////////////////////////
//open file for reading
$handle= fopen($file,'a+');
// read file
// echo fread($handle,filesize($file));
// echo fread($handle,10);
// echo fgets($handle);
// echo fgets($handle);
// echo fgetc($handle);
// echo fgetc($handle);
// fwrite($handle,"\nEverything popular is wrong");
// fclose($handle);
// unlink($file);


/////////////////////
// if(isset($_POST['submit'])){
// session_start();

// //set cookie
// setcookie('gender',$_POST['gender'],time()+86400);
// $_SESSION['name']= $_POST['name'];
// header('location: index.php');

// }

//  $score = 40;

//  if($score >40){
//      echo "high school";
//  }
//  else{
//      echo "low school";
//  }

//  $value = $score >40 ? 'high school':'low school';
// echo $value;

// echo $_SERVER['SERVER_NAME']."<br>";
// echo $_SERVER['REQUEST_METHOD']."<br>";
// echo $_SERVER['SCRIPT_FILENAME']."<br>";
// echo $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ninja</title>
</head>
<body>
<!-- <form action="<//?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<input type="text" name="name">
<select name="gender" >
    <option value="male">male</option>
    <option value="female">female</option>
</select>
<input type="submit" name="submit" value="submit">
</form> -->

</body>
</html>