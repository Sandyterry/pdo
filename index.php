<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$host = "localhost"; // Remplacez par l'hôte de votre base de données
$dbname = "afci"; // Remplacez par le nom de votre base de données
$user = "root"; // Remplacez par votre nom d'utilisateur
$pass = ""; // Remplacez par votre mot de passe


    // Création d'une nouvelle instance de la classe PDO
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Configuration des options PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // echo "Connexion réussie !";

    // Lire des données dans la BDD
    $sql = "SELECT * FROM apprenants";
    $requete = $bdd->query($sql);
    $results = $requete->fetchAll(PDO::FETCH_ASSOC);
    

    // foreach( $results as $value ){
    //     foreach($value as $data){
    //         echo $data;
    //         echo "<br>";

    //     }
    //     echo "<br>";
    // }

    foreach( $results as $value ){
        echo "<h2>" . $value["nom_apprenant"] . "</h2>";
        echo "<br>";
    }


    // Insérer des données dans la BDD

?>

<form method="POST">
    <input type="text" name="nomRole">
    <input type="submit" name="submitRole">

</form>

<?php 
    if (isset($_POST['submitRole'])){
        $nomRole = $_POST['nomRole'];

        $sql = "INSERT INTO `role`(`nom_role`) VALUES ('$nomRole')";
        $bdd->query($sql);

        echo "data ajoutée dans la bdd";

    }

?>


<form method="POST">
    <h1>Ajout Centre</h1>
    <label for="villeCentre">Ville</label><input type="text" name="villeCentre">
    <label for="adresseCentre">Adresse</label><input type="text" name="adresseCentre">
    <label for="codePostaleCentre">Code Postale</label><input type="text" name="codePostaleCentre">
    <input type="submit" name="submitCentre">

</form>

<?php 
if (isset($_POST['submitCentre'])){
    $villeCentre = $_POST['villeCentre'];
    $adresseCentre = $_POST['adresseCentre'];
    $codePostaleCentre = $_POST['codePostaleCentre'];
    
    $sql = "INSERT INTO `centres`(`ville_centre`, `adresse_centre`, `code_postal_centre`) VALUES ('$villeCentre','$adresseCentre','$codePostaleCentre')";
    $bdd->query($sql);

    echo "data ajoutée dans la bdd";

}
?>

<form method="POST">
    <h1>Ajout Formation</h1>
    <label for="nomFormation">Intitulé</label><input type="text" name="nomFormation">
    <label for="dureeFormation">Durée</label><input type="text" name="dureeFormation">
    <label for="niveauSortieFormation">Niveau à la sortie</label><input type="text" name="niveauSortieFormation">
    <label for="descriptionFormation">Description</label><input type="text" name="descriptionFormation">
    <input type="submit" name="submitFormation">

</form>

<?php 
if (isset($_POST['submitFormation'])){
    $nomFormation = $_POST['nomFormation'];
    $dureeFormation = $_POST['dureeFormation'];
    $niveauSortieFormation = $_POST['niveauSortieFormation'];
    $descriptionFormation = $_POST['descriptionFormation'];

    $sql = "INSERT INTO `formations`( `nom_formation`, `duree_formation`, `niveau_sortie_formation`, `description`) VALUES ('$nomFormation','$dureeFormation','$niveauSortieFormation','$descriptionFormation')";
    $bdd->query($sql);

    echo "data ajoutée dans la bdd";

}

?>

<form method="POST">
    <h1>Ajout Pedagogie</h1>
    <label for="nomPedagogie">Nom</label><input type="text" name="nomPedagogie">
    <label for="prenomPedagogie">Prenom</label><input type="text" name="prenomPedagogie">
    <label for="mailPedagogie">Mail</label><input type="text" name="mailPedagogie">
    <label for="numPedagogie">Numero de tel</label><input type="text" name="numPedagogie">
    <input type="submit" name="submitPedagogie">

</form>

<?php 
if (isset($_POST['submitPedagogie'])){
    $nomPedagogie = $_POST['nomPedagogie'];
    $prenomPedagogie = $_POST['prenomPedagogie'];
    $mailPedagogie = $_POST['mailPedagogie'];
    $numPedagogie = $_POST['numPedagogie'];

    $sql = "INSERT INTO `pedagogie`(`nom_pedagogie`, `prenom_pedagogie`, `mail_pedagogie`, `num_pedagogie`) VALUES ('$nomPedagogie','$prenomPedagogie','$mailPedagogie','$numPedagogie')";
    $bdd->query($sql);

    echo "data ajoutée dans la bdd";

}

?>

<form method="POST">
    <h1>Ajout Session</h1>
    <label for="dateDebut">Date de Début</label><input type="text" name="dateDebut">
    <label for="idPedagogie"></label><input type="text" name="idPedagogie">
    <input type="text" name="IdFormation">
    <input type="submit" name="submitSession">
</form>

<?php 
if (isset($_POST['submitSession'])){
    $dateDebut = $_POST['dateDebut'];
    $idPedagogie = $_POST['idPedagogie'];
    $idFormation = $_POST['IdFormation'];
   

    $sql = "INSERT INTO `session`(`date_debut`, `id_pedagogie`, `id_formation`) VALUES ('$dateDebut','$idPedagogie','$idFormation')";
    $bdd->query($sql);

    echo "data ajoutée dans la bdd";

}
?>

<form method="POST">
    <h1>Ajout Apprenant</h1>
    <input type="text" name="nomApprenant">
    <input type="text" name="prenomApprenant">
    <input type="text" name="mailApprenant">
    <input type="text" name="adresseApprenant">
    <input type="text" name="villeApprenant">
    <input type="text" name="codePostaleApprenant">
    <input type="text" name="telApprenant">
    <input type="text" name="dateDeNaissanceApprenant">
    <input type="text" name="niveauApprenant">
    <input type="text" name="numPEApprenant">
    <input type="text" name="numSecuApprenant">
    <input type="text" name="ribApprenant">
    <input type="text" name="idRoleApprenant">
    <input type="text" name="idSessionApprenant">
    <input type="submit" name="submitSession">
</form>

<?php 
if (isset($_POST['submitApprenant'])){
    $nomApprenant = $_POST['nomApprenant'];
    $prenomApprenant = $_POST['prenomApprenant'];
    $mailApprenant = $_POST['mailApprenant'];
    $adresseApprenant = $_POST['adresseApprenant'];
    $villeApprenant = $_POST['villeApprenant'];
    $codePostaleApprenant = $_POST['codePostaleApprenant'];
    $telApprenant = $_POST['telApprenant'];
    $dateDeNaissanceApprenant = $_POST['dateDeNaissanceApprenant'];
    $niveauApprenant = $_POST['niveauApprenant'];
    $numPEApprenant = $_POST['numPEApprenant'];
    $numSecuApprenant = $_POST['numSecuApprenant'];
    $ribApprenant = $_POST['ribApprenant'];
    $idRoleApprenant = $_POST['idRoleApprenant'];
    $idSessionApprenant = $_POST['idSessionApprenant'];
    $mailApprenant = $_POST['mailApprenant'];
   

    $sql = "INSERT INTO `apprenants`(`nom_apprenant`, `prenom_apprenant`, `mail_apprenant`, `adresse_apprenant`, `ville_apprenant`, `code_postal_apprenant`, `tel_apprenant`, `date_naissance_apprenant`, `niveau_apprenant`, `num_PE_apprenant`, `num_secu_apprenant`, `rib_apprenant`, `id_role`, `id_session`) VALUES ('$nomApprenant','$prenomApprenant','$mailApprenant','$adresseApprenant','$villeApprenant','$codePostaleApprenant','$telApprenant','$dateDeNaissanceApprenant','$niveauApprenant','$numPEApprenant','$numSecuApprenant','$ribApprenant','$idRoleApprenant','$idSessionApprenant')";
    $bdd->query($sql);

    echo "data ajoutée dans la bdd";

}

?>
</body>
</html>