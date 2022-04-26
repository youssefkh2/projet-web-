<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php';
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';


$reservationC=new ReservationC();
$listeReservation="SELECT * FROM reservaton WHERE cin_client=:cin_client";


if(isset($_GET['recherche']) and !empty($_GET['recherche']))
    {
        //$listeReservation = $reservationC->rechercher($_POST["cin_client"]);
       $rechercher=htmlspecialchars_decode($_GET['recherche']);
       $listeReservation="SELECT * from reservation where cin_client like "%'.$rechercher.'%"";
        }

?>
<!doctype html>
<html>
    <head>

    </head>
    <body>
<form method="GET" >
						<input type="search" name="recherche" placeholder="rechercher par cin">
            <input type="submit">
					</form>
                    <section>
<?php
if($listeReservation->rowCount() > 0)
{
    while($reservation = $listeReservation->fetch()){
        ?>
        echo '<tr>
            <td>'.$reservation['cin_client'].'</td>
            <td>'.$reservation['date_res'].'</td>
            <td>'.$reservation['adulte'].'</td>
            <td>'.$reservation['enfant'].'</td>
            <td>'.$reservation['id_event'].'</td>
        </tr>
        ' 
<?php
}
    ?>
<?php
}
?>
    </section>
<!-- <table > 
                            <thead>
                                <tr>			
                                    <td>cin_client</td>
                                    <td>date_res</td>
                                    <td>adulte</td>
                                    <td>enfant</td>
                                    <td>id_event</td>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table> -->
                                    </body>
                        </html>