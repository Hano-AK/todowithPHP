<?php
include_once('bdd.php');
include_once("Todo.php");
if (isset($_POST['next'])){
    extract($_POST);
    $Todo = new Todo;
     $Todo->ajouterTodo($description);
  



}
if (isset($_GET['p'])){

$Todo = new Todo;
$Todo->supprimerTodo();


}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h1>Todo app</h1>
        <div>
            <div class="form-control">
                <form action="" method="post">
                <input type="text" name="description" class="forminput"  id="" placeholder="Add your new todo" maxlength="10" >
                <button id="" name='next'>Next</button>

               
                

                </form>
                <?php

                $Todo=new Todo;
                $Todo->afficherTodo();
               
               
                

               
                ?>
                
               

            </div>
            <ul>

            </ul>
        </div>

    </div>
   

    <script src="server.js"></script>
</body>


</html>