<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.8em;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profil</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div> 
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error'); ?>
        </div> 
    <?php endif; ?>
    <form action="<?= site_url('profil/enregistrement') ?>" method="post">
        <?= csrf_field() ?>

        <label for="username_a">Votre nom d'utilisateur:</label><br>
        <input type="text" disabled="disabled" id="username_a" placeholder="<?= session('user')['username'] ?>" ><br>
        
        <label for="username">Nouveau nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" ><br>
        <?php if(isset($validation) && $validation->hasError('username')): ?>
            <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
        <?php endif; ?>
            
        <label for="email_a">Votre adresse email:</label><br>
        <input type="email" disabled="disabled" id="email_a" placeholder="<?= session('user')['email'] ?>" ><br>
        
        <label for="email">Nouvelle adresse e-mail:</label><br>
        <input type="email" id="email" name="email" ><br>
        <?php if(isset($validation) && $validation->hasError('email')): ?>
            <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
        <?php endif; ?>
            
        <label for="password">Nouveau mot de passe:</label><br>
        <input type="password" id="password" name="password" ><br>
        <?php if(isset($validation) && $validation->hasError('password')): ?>
            <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
        <?php endif; ?>
            
        <label for="confirm_password">Confirmer le mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" ><br>
        <?php if(isset($validation) && $validation->hasError('confirm_password')): ?>
            <div class="invalid-feedback"><?= $validation->getError('confirm_password') ?></div>
        <?php endif; ?>
        <br>
        <button type="submit">Enregistrer</button> 
    </form>
     <form action="<?= site_url('profil/suppression') ?>" method="post">
        <button type="submit">Supprimer</button>
    </form>
</div>

</body>
</html>
