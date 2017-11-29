<?php 	
require_once('verifier_access.php'); 
require_once("../classes/Categorie.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Liste des commandes</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <?php require_once('header.php'); ?>

  

    <div class="container2">

      <div class="clear"><p>&nbsp;</p></div>

      <div id="result">
       <table class="table table-striped">   
        <thead> 
          <tr>
            <th>Id</th>
            <th>nomprenom</th>
            <th>email</th>
            <th>adresse</th>
             
             <th>Details</th>
              <th>Imprimer</th>

          </tr>
        </thead>
        <tbody id="resultat-diporama"> 
          <?php 
require_once("../classes/Commande.php");
          $cat = new Commande();	
          $liste = $cat->liste();
          foreach($liste as $data )
          {

           ?>
           <tr>
            <td><?php echo $data->_id; ?></td>
            <td><?php echo $data->_nomprenom; ?></td>
             <td><?php echo $data->_email; ?></td>
            <td><?php echo $data->_adresse; ?></td>

            <td>
              <a class="btn btn-primary" href="details.php?id=<?php echo $data->_id; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Details
              </a>
            </td>
            <td>
              <a class="btn btn-primary" href="commande_imprimer.php?id=<?php echo $data->_id; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Imprimer
              </a>
            </td>
         </tr>
         <?php  } ?>
       </tbody>
     </table>
   </div>        

   <div style="text-align: center;">
    <div id="bootstrap-pagination"></div>
  </div>

</div>
<hr>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-paginator.js"></script>
<script src="js/bootstrap.validate.js"></script>
<script src="js/bootstrap.validate.en.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
  function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer cette cat ? ?")) {
     document.location = delUrl;
   }
 }
</script>
</body>
</html>