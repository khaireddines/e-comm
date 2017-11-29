<?php 
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>commande_imprimer.php</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<table class="table">
		<tr>
			<td width="30px">
				<img src="../images/home/logo.png" alt="Logo" />
			</td>
			<td>
				<h3>Commande n° 999999</h3>
				<h4>Du jj/mm/aaaa</h4>
			</td>
			<td>
				<h5>Nom & Prénom client</h5>
				<h5>adresse@email.com</h5>
				<h5>Adresse postale</h4>
			</td>
		</tr>
	</table>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Produit</th>
				<th>PU</th>
				<th>Qté</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>9</td>
				<td>Foobar</td>
				<td>99</td>
				<td>9</td>
				<td>999.99</td>
			</tr>
			<tr>
				<td>9</td>
				<td>Foobar Two</td>
				<td>99</td>
				<td>9</td>
				<td>999.99</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Total HT</td>
				<td>999.99</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Montant TVA</td>
				<td>999.99</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total TTC</strong></td>
				<td><strong>999.99</strong></td>
			</tr>
		</tbody>
	</table>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();

exit($html);

require '../vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('hello world');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('commande-999999.pdf');
?>
