<?php

require 'dbConnexion.php';

if(isset($_POST['save_contact']))
{
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if($prenom == NULL || $nom == NULL  || $categorie == NULL || $numero == NULL || $email == NULL )
    {
        $res = [
            // input error code
            'status' => 422,
            'message' => 'Attention, tous les champs sont obligatoire !'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO contact (prenom,nom,categorie,numero,email) VALUES ('$prenom', '$nom','$categorie',
        '$numero','$email')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            // La creation a bien reussie
            'status' => 200,
            'message' => 'Contact ajouté avec succès !'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            // code error type
            'status' => 500,
            'message' => 'Echec de création de contact !'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_contact']))
{
    $contact_id = mysqli_real_escape_string($con, $_POST['contact_id']);

    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if($prenom == NULL || $nom == NULL  || $categorie == NULL || $numero == NULL || $email == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'Attention, tous les champs sont obligatoires !'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE contact SET prenom='$prenom', nom='$nom', categorie='$categorie', numero='$numero', 
        email='$email' WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Contact mis à jour avec succès !'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Echec de mis à jour'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['contact_id']))
{
    $contact_id = mysqli_real_escape_string($con, $_GET['contact_id']);

    $query = "SELECT * FROM contact WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $contact = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'contact bien récupéré par id',
            'data' => $contact
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'id contact non trouvé'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_contact']))
{
    $contact_id = mysqli_real_escape_string($con, $_POST['contact_id']);

    $query = "DELETE FROM contact WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'contact supprimé avec succès !'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Echec de suppression du contact'
        ];
        echo json_encode($res);
        return;
    }
}

?>

