<?php 
      include_once 'funciones/sessiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';
      include_once 'templastes/barra.php';
      include_once 'templastes/sidebar.php';
?>


  <!-- =============================================== -->


  <!-- =============================================== -->

  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Informaión sobre el evento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <h2 class="page-header">Grafica</h2>
        <div class="row">
            
             <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
            </div>
            
        </div>
        
        <h2 class="page-header">Resumen de Registros</h2>
        <div class="row">
            
      
    
     <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
         $resultado = $conn->query($sql);
         $registrados = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $registrados['registros'];?></h3>

              <p>Total registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
            
          <!-- Quienes Pagaron -->
         <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados where pagado= 1";
         $resultado = $conn->query($sql);
         $registrados = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $registrados['registros'];?></h3>

              <p>Total Pagados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
          
           <!-- Quienes No Pagaron -->
         <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados where pagado= 0";
         $resultado = $conn->query($sql);
         $registrados = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $registrados['registros'];?></h3>

              <p>Total Sin Pagar</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-times"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
           
           
        <!-- Total pagado box -->   
        <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados where pagado= 1";
         $resultado = $conn->query($sql);
         $registrados = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$ <?php echo $registrados['ganancias'];?></h3>

              <p>Ganancias Totales</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
</div>    
        
        <h2 class="page-header">Regalos</h2>
        <div class="row">
            
            <!--Regalo -->   
        <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(total_pagado) AS pulsera FROM registrados where regalo= 1";
         $resultado = $conn->query($sql);
         $regalo = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $regalo['pulsera'];?></h3>

              <p>Pulseras</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
            
            
              <!--Regalo -->   
        <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados where regalo= 2";
         $resultado = $conn->query($sql);
         $regalo = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo $regalo['etiquetas'];?></h3>

              <p>Etiquetas</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
              
              
              
               <!--Regalo -->   
        <div class="col-lg-3 col-xs-6">
         
         <?php 
         $sql = "SELECT COUNT(total_pagado) AS pluma FROM registrados where regalo= 3";
         $resultado = $conn->query($sql);
         $regalo = $resultado->fetch_assoc();
         
         ?>
         
          <!-- small box -->
          <div class="small-box bg-purple-active">
            <div class="inner">
              <h3><?php echo $regalo['pluma'];?></h3>

              <p>Plumas</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más informacion <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
            
            
      
      
            
  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once '../admin/templastes/footer.php'; ?>