<!DOCTYPE html>
<?php
require_once("../conexion/conexion.php");
include("../header/nav.php");
$sql =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");
$sql1 =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h2>PENDIENTES</h2>
            <div class="row">
              <?php  
                while ($date = mysqli_fetch_assoc($sql)){
                  $a = $date['nombre_area']; 
                  
                  $sql_num =  mysqli_query($con,"SELECT * FROM `pendientes` WHERE `area` = '$a' AND `status` = 0 AND `razon` IS NULL");
                  $cant = mysqli_num_rows($sql_num);
                  
              ?>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="ver_pendientes.php?id=<?php echo $a ?>"><div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $date['nombre_area']; ?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                      <?php if( $cant>0){ ?>
                        <div class="icon icon-box-success ">
                          <p class="text-success ml-2 mb-0 font-weight-medium"><?php echo $cant; ?></p>                      
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                        <?php }else{?>
                        <div class="icon icon-box-info">
                          <p class="text-white ml-2 mb-0 font-weight-medium"><?php echo $cant; ?></p>
                          <span class="mdi mdi-arrow-compress-all icon-item"></span>
                        </div>
                        <?php }?>
                      </div>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
            <h2>PENDIENTES MOROSOS</h2>
            <div class="row">
              <?php  
                while ($date1 = mysqli_fetch_assoc($sql1)){
                  $a1 = $date1['nombre_area']; 
                  
                  $sql_num1 =  mysqli_query($con,"SELECT * FROM `pendientes` WHERE `area` = '$a1' AND `status` = 0 AND `razon` IS NOT NULL");
                  $cant1 = mysqli_num_rows($sql_num1);
                  
              ?>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <a href="pendiente_moroso.php?id=<?php echo $a1 ?>"><div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $date1['nombre_area']; ?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                      <?php if( $cant1==0){ ?>
                        <div class="icon icon-box-info ">
                          <p class="text-white ml-2 mb-0 font-weight-medium"><?php echo $cant1; ?></p>                      
                          <span class="mdi mdi-arrow-compress-all icon-item"></span>
                        </div>
                        <?php }else{?>
                        <div class="icon icon-box-danger">
                        <span class=" mdi mdi-alert-outline  icon-item"></span>
                          <p class="text-danger ml-2 mb-0 font-weight-medium"><?php echo $cant1; ?></p>
                        </div>
                        <?php }?>
                      </div>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>

            </div>
            
<?php
include("../header/footer.php");
?>