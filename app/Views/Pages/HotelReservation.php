<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITYI Hotel</title>
    <!-- Inclusion de la police Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Dancing+Script&display=swap" rel="stylesheet">
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

        /* **************** TOURISME ********************** */
        #tourisme {
            height: 1400px;
            background-color: #f1f2f6;
            padding: 1px 2%;
        }

        #tourisme h2 {
            padding-top: 60px;
        }

        #ocean {
            background: url(media/ocean.jpg);
        }

        #chateau {
            background: url(media/chateau.JPG);
        }

        #phare {
            background: url(media/phare.JPG);
        }

        #vignoble {
            background: url(media/vignes.jpg);
        }

        #tourisme li {
            margin: 65px 100px 0 100px;
            height: 226px;
            width: 55%;
            max-width: 550px;
            float: left;
            box-shadow: 6px 6px 28px -1px rgba(0,0,0,0.75);
        }

        #tourisme p {
            height: 45px;
            width: 235px;
            background-color: #01DF74;
            float:right;
            margin: 50px -180px 0 0;
            font-size: 1.5em;
            text-align: center;
            padding-top: 15px;
            box-shadow: 4px 4px 0 1px rgba(90,161,43,1);
        }

        #tourisme #chateau, #tourisme #vignoble {
            float: right;
        }

        #chateau p, #vignoble p {
            float: left;
            background-color: cyan;
            margin-left: -180px;
            box-shadow: -4px 4px 0 1px rgba(15,154,156,1);
        }

        /* ******************* FOOTER ******************** */
        footer {
            background-color: #5289E4;
            color: #FFFAE1;
            padding: 20px 0 10px 0;
        }

        table {
            font-size: 1.2em; /* Augmentez la taille de la police selon vos besoins */
            margin: 0 auto; /* Centrez la table horizontalement */
            border-collapse: collapse;
            width: 80%; /* Ajustez la largeur de la table selon vos besoins */
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
            margin: 20px auto; /* Ajoutez une marge pour centrer la table */
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
            font-size: 1.5em; /* Ajustez la taille de la police selon vos besoins */
            margin: 0 auto; /* Centrez la table horizontalement */
        }

        /* Style pour augmenter la taille de la police */
        .bigText {
            font-size: 1.4em; /* Ajustez la taille de la police selon vos besoins */
        }

        /* Style pour centrer la table */
        .centeredTable {
            margin: 0 auto; /* Centrez la table horizontalement */
        }

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
    </style>
</head>
<body>
    <header>
    <nav>
    <ul>
        <li id="logo"><a href="#">ITYI Hotel</a></li>
        <?php if (session()->has('user')): ?>
            <li><a href="#">Bonjour, <?= session('user')['username'] ?></a></li>
            <li><a href="<?= site_url('logout')?>">Se déconnecter</a></li>
            <li><a href="<?= site_url('profil')?>">Profil</a></li>
            <li><a href="<?= site_url('reservation')?>">Réserver</a></li>
        <?php else: ?>
            <li><a href="<?= site_url('login')?>">Se connecter</a></li>
        <?php endif; ?>
        <li><a href="#contact">Nous contacter</a></li>
    </ul>
</nav>

        <div id="imagePrincipale">
            <h1>ITYI Hotel</h1>
            <div id="premierTrait"></div>
            <h3>Chambres d'hôtes</h3>
        </div>
    </header>
    <section id="presentation">
      <div id="texteIntro">
        <h2>Un lieu unique, pour un séjour unique</h2>
       <p>Découvrez une expérience inoubliable alliant sophistication et confort à l'Hôtel ITYI. Niché au cœur d'un paysage enchanteur, notre établissement offre un refuge exclusif où le luxe rencontre l'hospitalité chaleureuse.

L'Hôtel ITYI vous propose des chambres élégantes, des équipements de classe mondiale et une cuisine raffinée qui ravira vos papilles. Que vous voyagiez pour affaires ou pour le plaisir, notre équipe dévouée est là pour anticiper vos besoins et rendre votre séjour aussi mémorable que possible.</p>
       
      </div>
        <div id="prestations">
            <div class="imagesPrestations">
                <h4>Accueil</h4>
                <a href="<?= site_url('reservation')?>">
                    <img src="https://www.travellers-society.com/wp-content/uploads/Chateau-vue-drone-2-scaled.jpg" alt="carte" width="300" height="200">
                </a>
            </div>
            <div class="imagesPrestations">
                <h4>chambres</h4>
                <a href="<?= site_url('reservation')?>">
                    <img src="https://www.yonder.fr/sites/default/files/destinations/Royal-Champagne-Hotel-Spa_Suite-Royal_Overview.jpg" alt="chambre" width="300" height="200">
                </a>
            </div>
            <div class="imagesPrestations">
                <h4>cuisine</h4>
                <a href="<?= site_url('reservation')?>">
                    <img src="https://www.challenges.fr/drupal/files/2022-02/restaurant-3.jpg" alt="repas" width="300" height="200">
                </a>
            </div>
        </div>

    </section>
   
    <footer>
      <h2 id="contact">Contactez-nous</h2>
      <form>
        <input placeholder="Nom">
        <input placeholder="E-mail">
        <input placeholder="Votre message ici...">
        <button>Envoyer</button>
      </form>
      <div id="deuxiemeTrait"></div>
      <div id="copyrightEtIcons">
        <div id="copyright">
          
        </div>
        <div id="icons">
          <a href="http://www.twitter.fr"><i class="fa fa-twitter"></i></a>
          <a href="http://www.facebook.fr"><i class="fa fa-facebook"></i></a>
          <a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>

        </div>
      </div>

    </footer>
</body>
</html>
