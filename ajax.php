<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Carnet</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="css/ajax.css">

    <script>
        $(document).on('submit', '#savecontact', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_contact", true);

            $.ajax({
                type: "POST",
                url: "contact.class.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#contactAddModal').modal('hide');
                        $('#savecontact')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myContactTable').load(location.href + " #myContactTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editcontactBtn', function () {

            var contact_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "contact.class.php?contact_id=" + contact_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#contact_id').val(res.data.ID);
                        $('#prenom').val(res.data.Prenom);
                        $('#nom').val(res.data.Nom);
                        $('#categorie').val(res.data.Categorie);
                        $('#numero').val(res.data.Numero);
                        $('#email').val(res.data.Email);

                        $('#contactEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updatecontact', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_contact", true);

            $.ajax({
                type: "POST",
                url: "contact.class.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#contactEditModal').modal('hide');
                        $('#updatecontact')[0].reset();

                        $('#myContactTable').load(location.href + " #myContactTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewcontactBtn', function () {

            var contact_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "contact.class.php?contact_id=" + contact_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        console.log(res);
                        $('#afficher_contact_id').text(res.data.ID);
                        $('#afficher_prenom').text(res.data.Prenom);
                        $('#afficher_nom').text(res.data.Nom);
                        $('#afficher_categorie').text(res.data.Categorie);
                        $('#afficher_numero').text(res.data.Numero);
                        $('#afficher_email').text(res.data.Email);

                        $('#contactViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deletecontactBtn', function (e) {
            e.preventDefault();

            if(confirm('Voulez-vous vraiment supprimer ce contact ?'))
            {
                var contact_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "contact.class.php",
                    data: {
                        'delete_contact': true,
                        'contact_id': contact_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myContactTable').load(location.href + " #myContactTable");
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>