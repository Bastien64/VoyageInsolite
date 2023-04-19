<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style1.css" media="screen" type="text/css" />
    <title>Voyage Insolite INSCRIPTION</title>
</head>

<body class="d-flex flex-column">
    <!-- FIRST SCREEN -->
    <div class="firstscreen">
        <!-- BANDEAU 1 -->

        <div class="band1 pt-1">
            <p class="proband mr-5">Visiteurs professionnels</p>
            <p class="proband mr-5">Devenir exposant</p>
            <p class="proband mr-5">Medias</p>
            <p class="proband mr-2">Contact</p>
        </div>

        <!-- BANDEAU 2-->
        <?php
    include('elementphp/secondnavbar.php');
    ?>
 

 <?php
    function loadClass(string $class)
    {
        if ($class === "DotEnv") {
            require_once "config/$class.php";
        } else if (str_contains($class, "controller")) {
            require_once "controller/$class.php";
        } else {
            require_once "entity/$class.php";
        }
    }

    
    spl_autoload_register("loadcLass");
    $inscription = new inscriptioncontroller();
    $inscriptions = $inscription ->getall();

    if ($_POST) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresseemail = $_POST["adresseemail"];
        $numerodetelephone = $_POST["numerodetelephone"];
        echo " la inscription a ete soumis";   

        $newinscription = new inscription([
            "nom" => $nom,
            "prenom" => $prenom,
            "adresseemail" => $adresseemail,
            "numerodetelephone" => $numerodetelephone,
        ]);
        $inscription->create($newinscription);
    } 
    ?>
    <!-- tester si l'adresseemail est connecté -->
    <main>

        <!-- MENU DROIT  -->
        <div class="">
            <div class="mainmenu">
                <div class="container mt-5" style="max-width:50%;">
                    <h3>Votre Incription </h3>
                    <form method="post" enctype="multipart/form-data">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text"  name="prenom" id="prenom" class="form-control" required>
                        <label for="adresseemail" class="form-label">Adresse email</label>
                        <input type="text" name="adresseemail" id="adresseemail" class="form-control" required>
                        <label for="numerodetelephone" class="form-label">Numero de telephone</label>
                        <input type="text" name="numerodetelephone" id="numerodetelephone" class="form-control" required>
                        <input type="submit" class="btn btn-warning mt-3" value="Inscription">
                    </form>
                </div>
            </div>
    </main>











    <!-- PROGRAM-->
    <?php
    include('elementphp/program.php');
    ?>
    <!-- FOOTER-->
    <?php
    include('elementphp/footer.php');
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script/script1.js"></script>

</html>