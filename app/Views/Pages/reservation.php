<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITYI Hotel</title>
    <!-- Inclusion de la feuille de style CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Styles CSS */
        @import url('https://fonts.googleapis.com/css?family=Advent+Pro|Dancing+Script&display=swap');

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Advent Pro', sans-serif;
            padding: 0;
            margin: 0;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style-type: none;
        }

        h2 {
            text-transform: uppercase;
            text-align: center;
            padding-top: 30px;
            font-size: 2em;
        }

        a {
            text-decoration: none;
            color: white;
        }

        /* ******************* NAVBAR ******************* */
        nav {
            overflow: hidden;
            background-color: #F17832;
            position: fixed;
            width: 100%;
            opacity: 0.9;
        }

        header li {
            float: right;
            font-size: 1.2em;
        }

        header li a {
            text-decoration: none;
            display: block;
            text-align: center;
            padding: 18px 16px;
        }

        #logo {
            font-family: 'Dancing Script', cursive;
            font-weight: bold;
            float: left;
        }

        /* **************** IMAGE PRINCIPALE ************* */
        #imagePrincipale {
            padding-top: 60px;
            background: url(https://images6.alphacoders.com/349/thumb-1920-349835.jpg) no-repeat fixed 50% 50%;
            background-size: cover;
            height: 799px;
        }

        h1 {
            font-family: 'Dancing Script', cursive;
            text-align: center;
            color: antiquewhite;
            font-size: 6em;
            margin-top: 100px;
            text-shadow: 1px 3px 2px black;
        }

        #premierTrait {
            height: 1px;
            width: 25%;
            margin: -3px auto;
            background-color: #FFFAE1;
            box-shadow: 1px 3px 2px black;
        }

        h3 {
            text-align: center;
            color: antiquewhite;
            font-size: 3em;
            text-shadow: 1px 3px 2px black;
        }

        /* *************** PRESENTATION ********************** */
        #presentation {
            background-color: #FFFAE1;
            padding: 10px 0px 100px 0;
        }

        #texteIntro {
            padding: 0px 20%;
        }

        #prestations {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 30px 10%;
        }

        .imagesPrestations h4 {
            font-family: 'Dancing Script', cursive;
            text-align: center;
            font-size: 1.8em;
            margin: 15px;
            font-weight: 300;
        }

        .imagesPrestations img {
            border-radius: 10px;
            box-shadow: 5px 5px 3px 1px rgba(0,0,0,0.7);
        }

        .imagesPrestations img:hover {
            opacity: 1;
            transform: scale(1);
            transition: 0.6s ease-in-out;
        }

        /* ******************* SECTION RÉSERVATION ******************** */
        #reserverSection {
            text-align: center;
            padding: 50px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.2em;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #F17832;
            color: #FFF;
            padding: 12px 20px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e55039;
        }

        .form-group div {
            display: inline-block;
            margin-right: 20px; /* ajustez selon votre préférence */
        }

        /* ******************* FOOTER ******************** */
        footer {
            background-color: #5289E4;
            color: #FFFAE1;
            padding: 20px 0 10px 0;
        }

        table {
            font-size: 1.2em;
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid #FFFAE1;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        footer table {
            font-size: 1.2em;
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        footer th, footer td {
            border: 1px solid #FFFAE1;
            padding: 10px;
            text-align: center;
        }

        /* Style pour augmenter la taille de la police et centrer la table */
        .bigTextCenteredTable {
            font-size: 1.5em;
            margin: 0 auto;
        }

        /* Style pour augmenter la taille de la police */
        .bigText {
            font-size: 1.4em;
        }

        /* Style pour centrer la table */
        .centeredTable {
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header>
    <nav>
    <ul>
        <li id="logo"><a href="<?= site_url('/')?>">ITYI Hotel</a></li>
        <?php if (session()->has('user')): ?>
            <li><a href="#">Bonjour, <?= session('user')['username'] ?></a></li>
            <li><a href="<?= site_url('logout')?>">Se déconnecter</a></li>
            <li><a href="<?= site_url('profil')?>">Profil</a></li>
        <?php else: ?>
            <li><a href="<?= site_url('login')?>">Se connecter</a></li>
        <?php endif; ?>
        <li><a href="#contact">Nous contacter</a></li>
    </ul>
</nav>

        <div id="imagePrincipale">
            <h1>Reservation</h1>
            <div id="premierTrait"></div>
            <h3>Chambres d'hôtes</h3>
        </div>
    </header>
    
    <section id="presentation">
        <div id="texteIntro">
            <h2>Choisir la chambre à réserver : </h2>
        </div>
        <div id="prestations">
            <div class="imagesPrestations">
                <h4>Chambre bateau</h4>
                <a href="#reserverSection"><img src="https://www.lebaillidesuffren.com/wp-content/uploads/sites/174/2020/06/Bailli-Suffren_2019-05-19_Photo_Chambres-1-2200x1200.jpg" alt="carte" width="300" height="200"></a>
            </div>
            <div class="imagesPrestations">
                <h4>Chambre piloti</h4>
                <a href="#reserverSection"><img src="https://global-uploads.webflow.com/61b694c59f46238057609302/63a47c293e5c9a72b8204a42_4.1%20COVER%20villas%20sur%20pilotis%20Cara%C3%AFbes.jpg" alt="chambre" width="300" height="200"></a>
            </div>
            <div class="imagesPrestations">
                <h4>Chambre plage</h4>
                <a href="#reserverSection"><img src="https://www.auxandra.com/wp-content/uploads/2019/03/maison-bord-mer-floride.jpg" alt="repas" width="300" height="200"></a>
            </div>
        </div>
    </section>

      <section id="reserverSection">
        <h2>Réserver</h2>
        <form action="<?= site_url('reservation/traiterReservation') ?>" method="post">

            <div class="form-group">
                <label>Chambre choisie :</label>
                <div>
                    <label for="piloti">Piloti</label>
                    <input type="radio" id="piloti" name="chambre" value = "Piloti" required>
                </div>
                <div>
                    <label for="plage">Plage</label>
                    <input type="radio" id="plage" name="chambre" value = "Plage" required>
                </div>
                <div>
                    <label for="bateau">Bateau</label>
                    <input type="radio" id="bateau" name="chambre" value = "Bateau" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="dateReservation">Date de réservation :</label>
                <input type="date" id="dateReservation" name="dateReservation" required>
            </div>
            
            <div class="form-group">
                <label for="datefinReservation">Date de fin de réservation :</label>
                <input type="date" id="datefinReservation" name="datefinReservation" required>
            </div>
            <button type="submit">Réserver</button>
        </form>
    </section>

    <footer>
        <h2 id="contact">Demandes de Réservation en cours : </h2>
        <div class="bigText">
            <table class="centeredTable">
                <tr>
                    <th>ID</th>
                    <th>Date de Demande</th>
                    <th>Date de fin de demande</th>
                    <th>Chambre</th>
                </tr>
                <?php foreach ($reservations as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['date_de_demande'] ?></td>
                        <td><?= $row['date_de_fin'] ?></td>
                        <td><?= $row['chambre'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </footer>
    
</body>
</html>
