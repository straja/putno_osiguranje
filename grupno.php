<?php
$id = $_REQUEST['grupno'];
$res = $validation->selectAllGrupna($id);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Ime i prezime</th>
      <th scope="col">Broj pasoša</th>
    </tr>
  </thead>
  <tbody>
        <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['punoime'];?></td>
                <td><?php echo $row['pasos'];?></td> 
            </tr>
        <?php } ?>
  </tbody>
</table>