<?php 
require_once('verifier_access.php'); 

@$id = $_GET['id'];

  require_once("../classes/Produit.php");
  require_once("../classes/Commande.php");
  //$prod= new Produit();
  //$prod = $prod->details($id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gestion des produits</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/bootstrap.min.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/prettify.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
  <style>input, textarea, select, .uneditable-input{height:auto;}#loadimg{display:none;}</style>      
</head>
<body>

  <?php require_once('header.php'); ?>
<br>
  <div class="container2">
   <center> <h1>Détail Commande :</h1></center>
  </div>

  <div class="container2">

   <div class="clear"><p>&nbsp;</p></div>
   <div id="resultat-bien"></div>
   <form id="form_bien" class="form_valid" method="POST" action="imprimer.php" enctype="multipart/form-data">
    <table class="table table-striped">   
      <?php $cat = new Commande(); 
          $liste = $cat->liste();
          foreach($liste as $data )
          {
            if($data->_id==$id){
            ?>
            <tr>
            <th>
          id Commande :<span style="color:red;"></span>            
        </th>
        <th>
          Produit :<span style="color:red;"></span>            
        </th>
        <th>
         Quantité :<span style="color:red;"></span>            
        </th>
        <th>
          PrixUnitaire :<span style="color:red;"></span>            
        </th>
        </tr>
       <tr>
        
            <td><?php echo $data->_id; ?></td>
       
       
       
            <td><?php echo $data->_nomprenom; ?></td>
        
     
        
            <td><?php echo $data->_email; ?></td>
        
       
            <td><?php echo $data->_adresse; ?></td>
       </tr>
     </table>
     <br>
<?php  }} ?>

 
     <br>
    
   
     <div id="loadimg"><img src="../images/loading.gif" width="25" height="25" /></div>
   </form>

 </div>

 <hr>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/bootstrap.validate.js"></script>
 <script src="js/bootstrap.validate.en.js"></script>
 <script type="text/javascript" src="js/jquery.form.js"></script>

 <script src="bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
 <script src="bootstrap-wysihtml5/lib/js/prettify.js"></script>
 <script src="bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

 <script>
   $('.textarea').wysihtml5();
   $(prettyPrint);

   function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer ce Partenaire ?")) {
     document.location = delUrl;
   }
 }
</script>

</body>
</html>