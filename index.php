
<?php
error_reporting( E_ALL );
include "db.php";
include "validation.php";

$validation = new validation;
if(isset($_POST['btn'])){

  $validation->validate('punoime', 'Puno ime', 'required');
  $validation->validate('drodj', 'Datum rođenja', 'required');
  $validation->validate('pasos', 'Broj pasoša', 'required');
  $validation->validate('od', 'Datum putovanja', 'required');
  $validation->validate('do', 'Datum povratka', 'required');
    $validation->validate('email', 'Email', 'uniqueEmail|users|required');
    if($validation->run()){
        $punoime = $validation->input('punoime');
        $drodj = $validation->input('drodj');
        $pasos = $validation->input('pasos');
        $tel = $validation->input('tel');
        $email = $validation->input('email');
        $od = $validation->input('od');
        $do = $validation->input('do');
        $tip = $validation->input('tip');
        $osiguranje_id = $validation->insert($punoime, $drodj, $pasos, $tel, $email, $od, $do, $tip);
        
        if($tip != '1') {
          $i = 1;
          while($validation->input('punoime'.$i)) {
            $punoime = $validation->input('punoime'.$i);
            $pasos = $validation->input('pasos'.$i);
            $validation->insertGrupno($osiguranje_id, $punoime, $pasos);
            $i++;
          }
        }

        $msg = "Hvala Vam na odabranoj polisi.";
        $headers = 'From:strahinja.s.banovic@gmail.com';
        mail($email,"Putno osiguranje",$msg, $headers);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Putno osiguranje</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/script.js"></script>
  </head>
<body>
  <?php include './navigacija.php';?>
   <?php
   if(strpos($_SERVER["REQUEST_URI"], 'grup')) {
    include './grupno.php';
  } elseif(strpos($_SERVER["REQUEST_URI"], 'list')) {
     include './lista.php';
   } else {
     include './osiguranja.php';
   }
   ?>
</body>
</html>