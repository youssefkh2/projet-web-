<?php
 include('../../../model/evenement.php');
 include('../../../controller/evenementC.php');
 include('../../../model/categorie.php');
 include('../../../controller/CategorieC.php');



 $error = "";

 
 // create adherent
 $evenement=null;
 $evenementC = new evenementC();

 // create an instance of the controller
 $CategorieC=new CategorieC();
$cmpt=0;

 $listecategorie=$CategorieC->afficherCategories(); 
 
 if (
     isset($_POST["nom_event"]) &&
     isset($_POST["date"]) &&		
     isset($_POST["lieu"]) &&
     isset($_POST["heure"]) &&
     isset($_POST["id_cat"]) &&
     isset($_POST["image"])
 ) {
     if (
         !empty($_POST["nom_event"]) && 
         !empty($_POST["date"]) &&
         !empty($_POST["lieu"]) && 
         !empty($_POST["heure"])  && 
         !empty($_POST["id_cat"]) && 
         !empty($_POST["image"])
     ) {
         $evenement = new evenement(
            
             $_POST["nom_event"],
             $_POST["date"],
             $_POST["lieu"], 
             $_POST["heure"], 
             $_POST["id_cat"],
             $_POST["image"]
         );
         $evenementC->ajouterEvenement($evenement);
         header('Location:afficher_evenement.php');
     }
     else
         $error = "Missing information";
 }
 
?>

<style>
  .error{
    color: red;
}
</style>



<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Ajouter votre event</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="afficherrec.php">Reclamation</a></li>
               
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
          </div>
        </div>
      </nav>
      

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        

      
        
        <hr>
        <center> <h5>ajouter_evenement</h5></center>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST" id="maForm">

            <table border="1" align="center">
               <tr>
                    <td>
                        <label for="nom_event">Nom du evenement:</label>
                    </td>
                    <td>
                        <input type="text" name="nom_event" id="nom_event" maxlength="20" required="" onblur="saisirNom()" >
                        <p id="errorName" class="erreur" ></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date de l'evenement:</label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" required="" onblur="saisirdate_recuperation()" >
                        <p id="errorDF" class="erreur" ></p>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="lieu">lieu:</label>
                    </td>
                    <td>
                        <input type="text" name="lieu" id="lieu" maxlength="20" required="" onblur="saisirNom2()">
                        <p id="errorName2" class="erreur" ></p>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="heure">heure:</label>
                    </td>
                    <td>
                        <input type="text" name="heure" id="heure" required="">
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <label for="id_cat">categorie:</label>
                    </td>
                    <td>
                    <select name="id_cat" id="id_cat" required="">
                    <option value=""></option>
                        <?php
				            foreach($listecategorie as $categorie){
			            ?>
			
                            <option value="<?php echo $categorie['id_cat']; ?>"><?php echo  $categorie['Nom']; ?>-<?php echo $categorie['id_cat']; ?></option>
                        <?php
			                	}
			            ?>
                    </select>
                    </td>
                </tr> 
                <tr>
                <td>
                        <label for="image">upload image:</label>
                    </td>
                    <td>
                    <input type="file" class="form-control" id="image" name="image" required="">
                            </td>
                            </tr>  
                            <tr>
                                <td>
                                <label for="numero">ton numero de telephone:</label>
                                </td>
                                <td>
                                <input type="text" name="numero" id="numero" required="" onblur="numBer()">
                                <p id="errorNBM" class="erreur" ></p>

                            </td>
                            </tr>     
                <tr>
                    <td> 
                        
                    </td>
                    <td>
                        <button class="btn btn-light" type="submit" onclick="ajout(event);envoie_sms()"> Ajouter </button>

                    </td>
                    
                    
                </tr>
            </table>
            <br>
            <br>
           <center> <button class="btn btn-light"><a href="afficher_evenement.php">Retour</a></button></center>
        </form>
  


    

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">




    <script>
 function numBer() {
    var nbm = document.getElementById('numero').value;

    if (nbm.length !== 8) {
        document.getElementById("errorNBM").textContent = "il faut avoir 8 chiffres";
        document.getElementById("errorNBM").style.color = "red";
        return 0;
    }
    else
    {
        document.getElementById("errorNBM").textContent = "Number Verified";
        document.getElementById("errorNBM").style.color = "green";
            return 1;
    }}

function saisirNom() {
                var name = document.getElementById('nom_event').value;
                var regex = /^[A-Za-z]+$/;


                if (!(regex.test(name))) {
                    document.getElementById("errorName").textContent = "Name has to be composed of letters only!";
                    document.getElementById("errorName").style.color = "red";
                    return 0;
                } 
                else if (name[0] == name[0].toLowerCase()) {
                    document.getElementById("errorName").textContent = "Name has to start by a capital letter!";
                    document.getElementById("errorName").style.color = "red";
                    return 0;
                }
                 else {
                    document.getElementById("errorName").textContent = "Name Verified";
                    document.getElementById("errorName").style.color = "green";
                    return 1;
                }
    }
    function saisirdate_recuperation() {
    var DateFond = document.getElementById("date").value;
    var dat=new Date();

    if (new Date(DateFond).getTime() <= dat.getTime())
    {
        document.getElementById("errorDF").textContent = "date superiour a la date actuel ";
        document.getElementById("errorDF").style.color = "red";
        return 0;
    }
    else
    {
        document.getElementById("errorDF").textContent = "date verified";
        document.getElementById("errorDF").style.color="green";
        return 1;
    }
}
function saisirNom2() {
                var name = document.getElementById('lieu').value;
                var regex = /^[A-Za-z]+$/;


                if (!(regex.test(name))) {
                    document.getElementById("errorName2").textContent = "Name has to be composed of letters only!";
                    document.getElementById("errorName2").style.color = "red";
                    return 0;
                } 
                else if (name[0] == name[0].toLowerCase()) {
                    document.getElementById("errorName2").textContent = "Name has to start by a capital letter!";
                    document.getElementById("errorName2").style.color = "red";
                    return 0;
                }
                 else {
                    document.getElementById("errorName2").textContent = "Name Verified";
                    document.getElementById("errorName2").style.color = "green";
                    return 1;
                }
    }

    

    function envoie_sms()
    {
         
        var nbm = document.getElementById('numero').value;
        message="Félicitations votre evenement est bien Poster dans Diversify";  
        const url="https://api.twilio.com/2010-04-01/Accounts/ACe5f01f2604e6c79921a828f318371afb/Messages.json"
        var myheaders = new Headers({
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Authorization' : 'basic '+btoa("ACe5f01f2604e6c79921a828f318371afb:44d79a815101da36ac94a065bdd54c34")
        })
        
        var myBody='To=+216'+nbm+'&From=+19794919653&Body='+message;
        var myData={
            method : 'POST',
            headers : myheaders,
            body : myBody
        }
        fetch(url, myData);
        alert("SVP !! Consulter votre télèphone pour la confirmation");
    }

    function ajout(event) 
    {if(numBer()==0 || saisirNom2()==0 || saisirdate_recuperation()==0 || saisirNom()==0)
        {
                    event.preventDefault();          
        }
                
    }
   
    
    




        </script>
  </body>

</html>