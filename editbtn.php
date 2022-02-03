<?php
include_once('bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containEdit">
    <h1>update todo</h1>
    <form action="" method="post" >
         <input type="text" name="title" id="title">
         
         <button type="submit" class="edit" name='sub'>Submit</button>
     </form>
    </div>
    <?php
    
    if ((isset($_POST['sub']))){
        include_once("Todo.php");
        extract($_POST);
        $Todo = new Todo;
        $Todo->update($title);

    }
   
    ?>
    
</body>
</html>