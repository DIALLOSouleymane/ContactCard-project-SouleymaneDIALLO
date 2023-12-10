<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <title>Carnet de Contact by Souleymane DIALLO</title>
</head>
<body>
    <!-- Ajout contact -->
    <div class="modal fade" id="contactAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="savecontact">
                <div class="modal-body">

                    <div id="errorMessage" class="alert alert-warning d-none"></div>

                    <div class="mb-3">
                        <label for="">Prénom</label>
                        <input type="text" name="prenom" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Categorie</label>
                        <input type="text" name="categorie" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Numéro</label>
                        <input type="text" name="numero" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer Contact</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Edition contact -->
    <div class="modal fade" id="contactEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatecontact">
                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="contact_id" id="contact_id" >
                    <div class="mb-3">
                        <label for="">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Categorie</label>
                        <input type="text" name="categorie" id="categorie" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Numéro</label>
                        <input type="text" name="numero" id="numero" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Modifier Contact</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Affichage contact -->
    <div class="modal fade" id="contactViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afficher Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="">ID</label>
                        <p name="contact_id" id="afficher_contact_id" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Prénom</label>
                        <p name="prenom" id="afficher_prenom" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Nom</label>
                        <p name="nom" id="afficher_nom" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Categorie</label>
                        <p name="categorie" id="afficher_categorie" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">numero</label>
                        <p name="numero" id="afficher_numero" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <p name="email" id="afficher_email" class="form-control"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Carnet de Contact avec PHP, JQUERY, HTML, CSS, JAVASCRIPT et MYSQL
                            
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#contactAddModal">
                                Ajouter Contact
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="myContactTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Numéro</th>
                                    <th>Email</th>
                                    <th>Fonctionnalités</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'dbConnexion.php';

                                $query = "SELECT * FROM contact";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $contact)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $contact['ID'] ?></td>
                                            <td><?= $contact['Prenom'] ?></td>
                                            <td><?= $contact['Nom'] ?></td>
                                            <td><?= $contact['Categorie'] ?></td>
                                            <td><?= $contact['Numero'] ?></td>
                                            <td><?= $contact['Email'] ?></td>
                                            <td>
                                                <button type="button" value="<?=$contact['ID'];?>" 
                                                    class="viewcontactBtn btn btn-info btn-sm">Afficher</button>
                                                <button type="button" value="<?=$contact['ID'];?>" 
                                                    class="editcontactBtn btn btn-success btn-sm">Modifier</button>
                                                <button type="button" value="<?=$contact['ID'];?>" 
                                                    class="deletecontactBtn btn btn-danger btn-sm">Supprimer</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- Inclusion du fichier ajax.php -->
    <?php
        require 'ajax.php';
    ?>

</body>
</html>

