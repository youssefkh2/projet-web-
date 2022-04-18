<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php';
	$reservationC=new ReservationC();
	$listeReservation=$reservationC->afficherReservation(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterRES.php">Ajouter une reservation</a></button>
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>cin_client</th>
				<th>date_res</th>
				<th>adulte</th>
				<th>enfant</th>
				<th>id_event</th>
			</tr>
			<?php
				foreach($listeReservation as $reservation){
			?>
			<tr>
				<td><?php echo $reservation['cin_client']; ?></td>
				<td><?php echo $reservation['date_res']; ?></td>
				<td><?php echo $reservation['adulte']; ?></td>
				<td><?php echo $reservation['enfant']; ?></td>
				<td><?php echo $reservation['id_event']; ?></td>
				<td>
					<form method="POST" action="modifierRES.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
