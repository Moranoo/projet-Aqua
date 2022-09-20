<!-- <!-- <php 

include './sendemail.php';
 ?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

    
 
  <body>
    <div class="container" id="blocForm">
        <div class="d-flex justify-content-center">
            <div class="col-8 m-4">
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <div class="text-center">
                            <h1 id="border">Contactez-nous ! </h1>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="surname" placeholder="Nom" autocomplete="off" class="form-control"/ required>
                            <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" class="form-control" required/>
                        </div>
                        <br/>
                        <input type="email" name="email" placeholder="Email" pattern="['#[a-z0-9]{1,}[\-\_\.a-z0-9]{0,}@[a-z]{2,}[\-\_\.a-z0-9]{0,}\.[a-z]{2,6}$#';]"autocomplete="off" class="form-control" required/>
                        <br/>
                        <textarea rows="10" name="message" placeholder="Votre message" class="form-control"></textarea>
                        <br/>
                        <button type="submit" class="btn btn-lg btn-primary send-btn" value="send">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>
</html> -->
