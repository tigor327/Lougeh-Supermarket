<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Customer Record</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <?php include('conf.php');?>
    <?php    require_once 'edit.php'; ?>
    <body>
        
        <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container">
        <a class="navbar-brand" href="customer.php">Lou Geh</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer.php">Customers</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="suppliers.php">Suppliers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Items.php">Items</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="salestransactions.php">Sales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="deliverytransactions.php">Deliveries</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
        
        
        <!-- Contents -->
        
     <div class="container" >
          
                <div class="row">
                    <div class="col-sm-12">
                    <div class="row">
                           <div class="col-md-3">
                               
                               <form  name="Supplier" method="POST" action="suppliers.php" onsubmit="return validateForm()" >
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                    <h4>Add Supplier</h4>
                                        <div class="form-group">
                                            <input type="text" name="Supplier_ID"  value="<?php echo $newid?>" class="form-control" placeholder="Supplier id" maxlength="25" >
                                        </div>
                                            <div class="form-group">
                                        <input type="text" name="Company_Name"  value="<?php echo $Comname?>" class="form-control" placeholder=" Company name" maxlength="50">
                                        </div>
                                            <div class="form-group">
                                        <input type="text" name="Contact_Number"  value="<?php echo $Comcontactnumber?>" class="form-control" placeholder="Contact number" maxlength="30" >
                                        </div>
                                        <div class="form-group">
                                        <input id="address" type="text" name="Address"  value="<?php echo $Comaddress?>" class="form-control" placeholder="Address" maxlength="150" >
                                        </div>
                                        
                                         <?php 
                                            if ($update == true):
                                            ?>
                                            <button type="submit" name="update" class="btn btn-info">update</button>
                                            <?php else: ?>
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <?php endif;?>
                                        </form>
                               
                           </div>
                        
                           <div class="col-md-9">
                   
                            <?php
                            
                            $result = mysqli_query($conn, "SELECT * FROM suppliers") or die("Connection failed: " . $conn->connect_error);
                            //pre_r($result);
                            ?>
                               
                               
                                    <div>
                                        <table id="supplierView" class="table table-striped table-bordered dt-responsive">
                                                 <thead class="thead-dark">
                                                     <tr>
                                                         <th>Company ID</th>
                                                         <th>Company name</th>
                                                         <th>Contact number</th>
                                                         <th>Address</th>
                                                         <th>Action</th>
                                                          </tr>
                                                            </thead>
                                                            <?php
                                                            while ($row = $result->fetch_assoc()): ?>
                                                            <tr>
                                                                <td><?php echo $row['sup_id_'];?></td>
                                                                <td><?php echo $row['sup_company_name'];?></td>
                                                                <td><?php echo $row['sup_contact_num'];?></td>
                                                                <td><?php echo $row['sup_address'];?></td>
                                                                <td>
                                                                    <a href="suppliers.php?editsupplier=<?php echo $row[ 'sup_id' ]; ?>"
                                                                       class="btn btn-info">Edit</a>
                                                                    <a href="removeitem.php?deletesupplier=<?php echo $row[ 'sup_id' ]; ?>" onclick="return confirm('Remove item form the database?')"
                                                                       class="btn btn-danger">Delete</a>
                                                                </td>
                                                            </tr>
                                                 <?php  endwhile; ?>
                                                </table>
                                        <script>
                               $(document).ready(function() {
                               $('#supplierView').DataTable();
                               } );
                               </script>
                                    </div>
                                    </div>
                            <?php
                            function pre_r( $array ) {
                                echo '<pre>';
                                print_r($array);
                                echo'</pre>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                </div>    
             
        
        
        
     
          
    
        <!-- add cutomer to database -->
        <?php
                            function convert($toConvert){
                                return number_format($toConvert, 2);
                            }

                            if (isset($_POST['save'])) {
                               $newid = $_POST['Supplier_ID'];
                               $Comname = $_POST['Company_Name'];
                               $Comcontactnumber = $_POST['Contact_Number'];
                               $Comaddress = $_POST['Address'];
                               
                                mysqli_query($conn, "INSERT INTO suppliers (sup_id_, sup_company_name, sup_contact_num, sup_address) 
                                        VALUES ('$newid', '$Comname', '$Comcontactnumber', '$Comaddress')") or die("Connection failed: " . $conn->connect_error);
                                     echo "<meta http-equiv='refresh' content='0'>";
                            }
                        ?>
        
        <?php
                            if (isset($_POST['update'])) {
                                $newid = $_POST['Supplier_ID'];
                               $Comname = $_POST['Company_Name'];
                               $Comcontactnumber = $_POST['Contact_Number'];
                               $Comaddress = $_POST['Address'];
                               
                                mysqli_query($conn, "UPDATE suppliers SET sup_id_='$newid', sup_company_name='$Comname' , sup_contact_num='$Comcontactnumber' , sup_address='$Comaddress' WHERE sup_id='$id'") or die("Connection failed: " . $conn->connect_error);
                                     echo "<meta http-equiv='refresh' content='0'>";
                                    
                            }
                        ?>
        
        <!-- Form Contents Check -->
        <script>
        function validateForm() {
         var x = document.forms[0];
         var txt = "";
         var i;
                  for (i = 0; i < x.length-1; i++) {
                     txt = txt + x.elements[i].value + "<br>";
                        if(x.elements[i].value === ""){
                            alert(x.elements[i].name + ' can not be left blank');
                            return false;
                            i = i + x.length;
                            }
                  }
         }

        </script>
    </body>
</html>