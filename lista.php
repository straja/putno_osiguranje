<?php
$res;
if($_REQUEST['lista'] != '') {
    $res = $validation->selectAllSort($_REQUEST['lista']);
} else {
    $res = $validation->selectAll();
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"><a href="index.php?lista=kreirana">Datum unosa polise</a></th>
      <th scope="col"><a href="index.php?lista=punoime">Ime i prezime nosioca</a></th>
      <th scope="col"><a href="index.php?lista=drodj">Datum rođenja</a></th>
      <th scope="col"><a href="index.php?lista=pasos">Broj pasoša</a></th>
      <th scope="col"><a href="index.php?lista=email">Email</a></th>
      <th scope="col"><a href="index.php?lista=od">Datum putovanja</a></th>
      <th scope="col"><a href="index.php?lista=do">Datum povratka</a></th>
      <th scope="col">Broj dana</th>
      <th scope="col">Tip polise</th>
    </tr>
  </thead>
  <tbody>
        <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['kreirana'];?></td>
                <td><?php echo $row['punoime'];?></td>
                <td><?php echo $row['drodj'];?></td>
                <td><?php echo $row['pasos'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['od'];?></td>
                <td><?php echo $row['do'];?></td>
                <td><?php 
                $date1 = $row['od'];
                $date2 = $row['do'];
                
                $diff = abs(strtotime($date2) - strtotime($date1));
                
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                
                printf("%d godina, %d meseci, %d dana\n", $years, $months, $days);
                ?></td>
                <td>
                    <?php 
                    if($row['individualno']) 
                        echo "Individualno"; 
                     if($row['individualno'] == '0') {?>
                         <a href="index.php?grupno=<?php echo $row['id'];?>">Grupno</a>
<?php
                     }
                    ?>
                    </td>
            </tr>
        <?php } ?>
  </tbody>
</table>