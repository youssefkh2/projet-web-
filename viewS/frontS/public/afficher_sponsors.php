<?php
include_once('C:\xampp\htdocs\Projet_Web_Diversity\controllerS\sponsorsC.php');
$sponsorsC = new sponsorsC();
$listesponsors=$sponsorsC->affichersponsors(); 

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Diversify | Design Agency Landing Page UI</title>


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
      <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31"
            alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Evenement</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="afficher_sponsors.php">Sponsors</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Reservation</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Reclamation</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing"> Profil</a></li>
          </ul>
          <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a
              class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
        </div>
      </div>
    </nav>

    <!--**********************
   -->
    <!-- <video width="320" height="240" controls>
      <source src="C:\Users\sassi\Desktop"  type=video/ogg> <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
    </video> -->
    <!-- <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fgfycat.com%2Fdeterminedunsunganhinga&psig
    =AOvVaw1wir5SDOEWucDAlfizRGgy&ust=1649808705077000&source=images&cd=vfe&ved=0CAoQjRxqFwoTCIia48OejfcCFQAAAAAdAAAAABAK">
     -->
   
    <img 
    src="https://s2.static-footeo.com/uploads/rcsavasson/Medias/Les20Sponsors1___p7bger.gif" height="50%" width="50%">

    <!-- <video controls>
      <source src="C:\Users\sassi\Desktop" type="video/mp4">
      <source src="C:\Users\sassi\Desktop" type="video/webm">
      <p>Votre navigateur ne prend pas en charge les vidéos HTML5.
         Voici <a href="myVideo.mp4">un lien pour télécharger la vidéo</a>.</p>
    </video> -->

    <!--****************************************************  -->


    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5" id="validation">

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="text-secondary">Sponsoring site web : Définition</h2>
            <h5 class="mb-2 fs-7 fw-bold">Définition : Sponsoring site web</h5>
            <p class="mb-4 fw-medium text-secondary">
              <font color ="red">Le sponsoring</font> site web ou parrainage désigne la pratique qui consiste à ce qu’un annonceur sponsorise un site ou une catégorie du site.
               Cette solution présente plusieurs différences avec une campagne publicitaire classique.
            </p>
            
          </div>
        
          
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->
    <!-- 
    <table>
      <tr>
          <th><div  align="left" >sp-adidas</div></th>
          <th><div  align="left" >sp-castrol-NFL</div></th>
          <th><div  align="left" >sp-itau</div></th>
      </tr>   
      <tr>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\adidas.png" height="30%" width="12%" alt="image1"> </td>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\castrol-NFL.PNG"   height="15%" width="12%"alt="image2"> </td>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\itau.PNG" height="15%" width="12%"alt="image2" alt="image3"> </td>
     
     </tr>   
     <tr>
         <td>  Adidas est une firme allemande fondée en 1949 par Adolf Dassler,<br> spécialisée dans la fabrication d'articles de sport, <br>basée à Herzogenaurach en Allemagne.<br> Elle est mondialement connue sous l'appellation<br> « la marque aux trois bandes »,<br> des trois bandes parallèles qui constituent son logo.<br></td>
         <td> view </td>
         <td> view </td>
     
     
     
     </tr>
       
     </table>-->
     <?php
$bdd= new PDO('mysql:host=localhost;dbname=ali;charset=utf8','root','');
$commandeParPage =1;
$commandeTotalReq=$bdd->query('SELECT id  FROM sponsors');
$commandeTotal=$commandeTotalReq->rowCount();

$pagesTotales=ceil($commandeTotal/$commandeParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
$_GET['page']=intval($_GET['page']);
$pageCourante=$_GET['page'];
}else{
    $pageCourante=1;                                      
}
$depart=($pageCourante-1)*$commandeParPage;

?> 
 <center><button onclick="makePDF()" class="btn btn-primary" >Print</button> </center>

     <center><h3>Les sponsors dispo</h3></center>
     <hr>
     <?php
    $listecommande=$bdd->query('SELECT * FROM sponsors ORDER BY id DESC LIMIT '.$depart.','.$commandeParPage);

    foreach($listecommande as $sponsors){
      
  ?>
     <table  class="table table-hover">
      <table border="1" align="center" id="imprimer">
        
        <!--<td rowspan="4">image</td>-->
        <td class="centre" headers="legende_1" style="width:500px; height:50px;">
     
</td>
        
          <tr>
            
      <tr>
        
				<th><?php echo $sponsors['nom']; ?></th>
        
        <td><?php echo'<img src="../photosp/'.$sponsors['image'].'"width="100;" height="120" alt="image">'  ?></td>
   
        
			</tr>
      
     
			<tr>
        <td><?php echo $sponsors['numero']; ?></td>
      </tr>
      <tr>
        <td><?php echo $sponsors['descrip']; ?></td>
      </tr>
      <tr>
        <td><?php echo $sponsors['type']; ?></td>
        
     
        
        
        
       
      </table>
      </table>
      
      </tr>
      
      <br>
      
      <?php
				}
			?>
                   <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
            echo $i.' ';
            }else{
            echo '<a href="afficher_sponsors.php?page='.$i.'">'.$i.'</a> ';
        }
    }
        ?>





















<br>

<center><a class="btn btn-warning ms-3" href="demande_partenariat.php">demande partenariat</a></center>





    <!-- ============================================-->
    <!-- <section> begin ============================-->

  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>
  <script>
            function makePDF(){
                var printMe=document.getElementById('imprimer');
                var wme=window.open("","","width:700,height:900");
                wme.document.write(printMe.outerHTML);
                wme.document.close();
                wme.focus();
                wme.print();
                wme.close();
            }
        </script>

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
    rel="stylesheet">
</body>

</html>