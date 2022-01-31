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
    public function addNew($descripton)
    {
        require('bdd.php');
        Todo::setDesc($descripton);
        $req = $connexion->prepare('INSERT INTO `todo`( `descr`, `etat`) VALUES (?,?)');
        $req->execute([$this->descripton, 1]);
        echo 'reussi';
    }
    public function ajouter()
    {
        require('bdd.php');
        $req = $connexion->prepare('SELECT `id`, `descr`, `etat` FROM `todo`');
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            ?>
        
            <div >
             <form action="" method="post" class='todolist'>
            <span name='id'><?php echo $row['id'] ?></span> 
            <span><?php echo $row['descr'] ?></span>
            <a class='li'href='index.php?p=<?php echo $row['id'] ?>'><button class="delete"  >Delete</button> </a>
           
            
            </form>
             </div>
             
<?php

        }
    }
    public function supprimer(){
   
        require('bdd.php');
        
        if (isset($_GET['p'])){
            $id = $_GET['p'];
            $req = $connexion->prepare("DELETE FROM `todo` WHERE id=?");
            $req->execute(array($id));
            echo'reussi';

        }
        else{
            echo 'no';
        }
        
    }
    
}
