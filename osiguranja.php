<div class="container mt-5">
       <div class="row">
           <div class="col-md-5">
               <h3>Osiguranje</h3><hr>
               <form action="" method="POST">
                   <div class="form-group">
                       <input type="text" name="punoime" class="form-control" placeholder="Unesite puno ime i prezime" value="<?php if($validation->input('punoime')): echo $validation->input('punoime'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['punoime'])): echo $validation->errors['punoime']; endif; ?>
                       </div>
                   </div>

                   <div class="form-group">
                       <input type="date" name="drodj" class="form-control" placeholder="Unesite datum rođenja" value="<?php if($validation->input('drodj')): echo $validation->input('drodj'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['drodj'])): echo $validation->errors['drodj']; endif; ?>
                       </div>
                   </div>
                   
                   <div class="form-group">
                       <input type="text" name="pasos" class="form-control" placeholder="Unesite broj pasoša" value="<?php if($validation->input('pasos')): echo $validation->input('pasos'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['pasos'])): echo $validation->errors['pasos']; endif; ?>
                       </div>
                   </div>
                   
                   <div class="form-group">
                       <input type="text" name="tel" class="form-control" placeholder="Unesite broj telefona" value="">
                   </div>

                   <div class="form-group">
                       <input type="email" name="email" class="form-control" placeholder="Unesite email" value="<?php if($validation->input('email')): echo $validation->input('email'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['email'])): echo $validation->errors['email']; endif; ?>
                       </div>
                   </div>

                   <div class="form-group">
                       <input type="date" name="od" class="form-control" placeholder="Unesite datum putovanja" value="<?php if($validation->input('od')): echo $validation->input('od'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['od'])): echo $validation->errors['od']; endif; ?>
                       </div>
                   </div>
                   <div class="form-group">
                       <input type="date" name="do" class="form-control" placeholder="Unesite datum povratka" value="<?php if($validation->input('do')): echo $validation->input('do'); endif; ?>">
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['do'])): echo $validation->errors['do']; endif; ?>
                       </div>
                   </div>

                   <div class="form-group">
                       <select name="tip" class="form-control" value="<?php if($validation->input('tip')): echo $validation->input('tip'); endif; ?>">
                        <option value="1">Individualno</option>
                        <option value="0">Grupno</option>
                      </select>
                       <div class="error text-danger">
                           <?php if(!empty($validation->errors['tip'])): echo $validation->errors['tip']; endif; ?>
                       </div>
                   </div>

                  <div id="grupno">

                  </div>

                   <div class="form-group">
                       <input type="submit" name="btn" class="btn btn-info" value="Sačuvaj">
                       <input type="button" id="add" class="btn btn-secondary" value="Dodaj" style="display:none;">
                   </div>
               </form>
           </div>
       </div>
   </div> 