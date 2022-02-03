<?php
class Todo
{
    private $id;
    private $descripton;
    private $etat;
    public function setid($id)
    {
        $this->id = $id;
    }
    public function setDesc($descripton)
    {
        $this->descripton = $descripton;
    }
    public function setetat($etat)
    {
        $this->etat = $etat;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getD()
    {
        return $this->description;
    }
    public function getE()
    {
        return $this->etat;
    }
    public function ajouterTodo($descripton)
    {
        require('bdd.php');
        Todo::setDesc($descripton);
        $req = $connexion->prepare('INSERT INTO `todo`( `descr`, `etat`) VALUES (?,?)');
        $req->execute([ $this->descripton, 1]);
        echo 'reussi';
    }
    public function afficherTodo()
    {
        require('bdd.php');
      
        $req = $connexion->prepare('SELECT `id`, `descr`, `etat` FROM `todo`');
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
?>

            <div>
                <form action="" method="post" class='todolist'>
                    <span name='id'><?php echo $row['id'] ?></span>
                    <span><?php echo $row['descr'] ?></span>
                    <div class="lienP"> <a class='li' href='index.php?p=<?php echo $row['id'] ?>'>delete </a>
                    <a class='li' href='editbtn.php?A=<?php echo $row['id']?>'>update </a>
                
                
                </div>




                </form>
            </div>

<?php

        }
    }
    public function supprimerTodo()
    {
        require('bdd.php');
        if (isset($_GET['p'])) {
            $id = $_GET['p'];
            $req = $connexion->prepare("DELETE FROM `todo` WHERE id = $id");
            $req->execute();
        } else {
            echo 'no';
        }
    }
   public function update($title){
    require('bdd.php');
     if (isset($_GET['A'])) {
        $iD=$_GET['A'];
        $req=$connexion->prepare("UPDATE todo SET descr = ? WHERE id =  ?");
        $req->execute(array($title, $iD));
     }
     else{
         echo 'no';
     }


    

   }
}

