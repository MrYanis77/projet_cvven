<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CVVEN INSCRIPTION</title>
<link rel="stylesheet" href="<?= base_url('css/form.css'); ?>"> 
</head>
<body>
<div class="register-form ">
    <form action="<?= base_url('index.php/CreateUser/enregistrement');?>" method="post">
        <h2 class="text-center">Inscription</h2>   
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Prenom" id="user" name="prenom" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nom " id="user" name="nom" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="login" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" id="user" name="email" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="tel:+33" id="user" name="num_tel" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirmation mot de passe" id="mdp" name="c_password" required="required">
        </div>
        <div class="form-group">
            <input type="submit" id="Inscription" class="btn btn-primary btn-block" value="Connexion"/>
        </div>
        
    </form>
    <p class="text-center"><?php echo anchor('Connexion', 'Ce connecter'); ?></p>
</div>
</body>
</html>

