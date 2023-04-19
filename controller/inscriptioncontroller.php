<?php

require("./entity/inscription.php");

class inscriptioncontroller
{
    private $db;
    
    public function __construct()
    {
        try {
            (new DotEnv(__DIR__ . '/../.env'))->load();
            $this->db = new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    
    public function create(inscription $inscription)
    {
        $req = $this->db->prepare("INSERT INTO `inscription` ( nom, prenom, adresseemail, numerodetelephone) VALUE ( :nom, :prenom, :adresseemail, :numerodetelephone)");
        $req->bindValue(":nom", $inscription->getnom(), PDO::PARAM_STR);
        $req->bindValue(":prenom", $inscription->getprenom(), PDO::PARAM_STR);
        $req->bindValue(":adresseemail", $inscription->getadresseemail(), PDO::PARAM_STR);
        $req->bindValue(":numerodetelephone", $inscription->getnumerodetelephone(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(inscription $inscription)
    {
        $req = $this->db->prepare("UPDATE `inscription` ( nom, prenom, adresseemail, numerodetelephone) VALUE ( :nom, :prenom, :adresseemail, :numerodetelephone)");
        $req->bindValue(":nom", $inscription->getnom(), PDO::PARAM_STR);
        $req->bindValue(":prenom", $inscription->getprenom(), PDO::PARAM_STR);
        $req->bindValue(":adresseemail", $inscription->getadresseemail(), PDO::PARAM_STR);
        $req->bindValue(":numerodetelephone", $inscription->getnumerodetelephone(), PDO::PARAM_STR);

        $req->execute();
    }


    public function getAll()
    {
        $inscriptions = [];
        $req = $this->db->query("SELECT * FROM `inscription` ORDER BY nom");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $inscription = new inscription($data);
            $inscriptions[] = $inscription;
        }
        $req->closeCursor();
        return $inscriptions;
    }

    public function get( $nom): inscription
    {
        $req = $this->db->prepare("SELECT * FROM `inscription` WHERE nom = :nom");
        $req->bindParam(":nom", $nom, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $inscription = new inscription($data);
        return $inscription;
    }

    public function getid( $id): inscription
    {
        $req = $this->db->prepare("SELECT * FROM `inscription` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $inscription = new inscription($data);
        return $inscription;
    }


 public function delete (int $id) {
    $req = $this->db->prepare ("DELETE FROM `inscription` WHERE id= :id");
    $req->bindValue("id", $id ());
    $req->execute();
 }
}
