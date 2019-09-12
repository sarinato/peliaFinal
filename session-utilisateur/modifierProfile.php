
<?php
 session_start();
 require("connect.php");
 $id_user = $_SESSION['id'];
 if (isset($_POST['modificationUtilisateur'])){
    print_r($_POST);

    if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
        $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

        if(in_array($extensionUpload, $extensionsValides)) {
            $nameuploaded = $_FILES['photo']['name'];
            $titlePhoto = strtolower(substr($nameuploaded, 0));
            $photo = strtolower(str_replace(" ","",$titlePhoto));    
            $chemin="img/utilisateurs/". $photo;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
        }

    }

        $requete_temps = $bdd->prepare("UPDATE users 
        SET prenom=:prenom, nom= :nom, email= :email, phone= :phone, sex= :sex, age=:age, photo_utilisateur=:photoUtilisateur
        WHERE id=:id_this_user");
            $requete_temps->execute(array(
                'prenom' => $_POST["PrenomUtilisateur"],
                'nom' => $_POST["NomUtilisateur"],
                'age' => $_POST["AgeUtilisateur"],
                'email' => $_POST["EmailUtilisateur"],
                'photoUtilisateur' => $photo, 
                 'phone' => $_POST["NumUtilisateur"], 
                'sex' => $_POST["SexeUtilisateur"],
                'id_this_user' => $id_user
        ));
 }