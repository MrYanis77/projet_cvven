    <!DOCTYPE html>

<!-- Navigation -->
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      <div class="collapse navbar-collapse" id="navbarResponsive">
          
        <ul class="navbar-nav ml-auto">
             <!-- page search -->
           
          
          <li class="nav-item">
            <?php if(isset($idadmin)){                               
                echo anchor('GestionReservation', ' ','class="nav-link fa fa-database fa-2x text-primary"'); 
            } 
            ?>
          </li>
          
          <li class="nav-item">
                <?php if(isset($idadmin)){                               
                    echo anchor('GestionUser', ' ','class="nav-link fa fa-user fa-2x text-primary"');  
                } 
                ?>           
          </li>
        
          <!-- Creation utilisateur -->
          <li class="nav-item">
            <?php if(isset($idadmin)){                
                echo anchor('PageAdmin/addadmin', ' ','class="nav-link fa fa-user-plus fa-2x text-primary"'); 
            } 
            ?>
          </li>
          
     

          <li class="nav-item">
            <?php if(isset($idadmin)){
                echo anchor('Connexion/deconnexion', ' ','class="nav-link fa fa-sign-out fa-2x text-danger"'); 
            }
            ?>
          </li>
          <i class="bi bi-bookmark-check"></i>

        </ul>
      </div>
  </nav>