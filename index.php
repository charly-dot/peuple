<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
    <title>authontication</title>
    <style>
        .errer{
            background-color:rgba(180, 82, 82, 0.7);
            font-size: 1.5rem;
            color:black;
            font-family:arial;
            width:95%;
            border-radius: 5%;
            text-align:center;
            margin-left:20%;
        }
        label{
            font-size: 2.5rem;
            font-family:arial;
            margin-left: 40%;
        }
        input{
            height:7vh;
            width: 120%;
            margin-left: 20px;
            border-radius: 5px;
            padding:2%;
        }
        .fahatelo{
            background-color: rgba(0, 0, 0, 0.2);
            width:60%;
            margin-left:18%;
            margin-top:9%;
            padding:3%;
            padding-bottom: 5%;
        }
        a{color: blue;}
    </style>
</head>
<body>
    <header>
        <container>
            <p>
                <div class="row fahatelo">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <?php if(isset($_GET['error'])) {?>
                            <p class="errer"><?php echo"votre information est incomplet ";  ?></p>
                        <?php }?>
                        <?php if(isset($_GET['faux'])) {?>
                            <p class="errer"><?php echo"votre information est incorrect ";  ?></p>
                        <?php }?>
                        <form action="confirmation.php" class="control-group" method="POST">
                            <label for="compte">compte</label><br>
                            <input type="text" class="compte" name="compte"><br>
                            <label for="pss">password</label><br>
                            <input type="password" class="pss" name="pss">
                            <button class="btn" type="submit" style="margin:10% !important;" name="formulair">envoyer</button><br>
                            <a href="">crée un compte</a>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                
            </container>
            </p>
    </header>
</body>
</html>