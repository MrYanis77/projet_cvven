<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
    <h2>Inscription</h2>
    <form action="<?= site_url('signup/processSignup') ?>" method="post">
        <?= csrf_field() ?>
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" ><br>
        <?php if(isset($validation) && $validation->hasError('username')): ?>
            <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
        <?php endif; ?>
        <label for="email">Adresse e-mail:</label><br>
        <input type="email" id="email" name="email" ><br>
        <?php if(isset($validation) && $validation->hasError('email')): ?>
            <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
        <?php endif; ?>
        <label for="password">Mot de passe:</label><br>
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
        <button type="submit">S'inscrire</button> 
    </form>
</div>

</body>
</html>
