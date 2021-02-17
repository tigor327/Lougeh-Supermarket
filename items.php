<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Item</title>
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
    <?php require_once 'edit.php';?>
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
            <a class="nav-link" href="items.php">Items</a>
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
                               
                               <form  name="addItem" method="POST" action="items.php" onsubmit="return validateForm()" >
                                   <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                    <h4>Add Item</h4>
                                        <div class="form-group">
                                            <input type="text" name="Barcode"  value="<?php echo $barcode?>" class="form-control" placeholder="Barcode" maxlength="11" >
                                        </div>
                                            <div class="form-group">
                                        <input type="text" name="Product_description"  value="<?php echo $productdescription?>" class="form-control" placeholder="Product description" maxlength="100">
                                        </div>
                                            <div class="form-group">
                                        <input type="text" name="Quantity"  value="<?php echo $quantity?>" class="form-control" placeholder="Quantity" maxlength="11" >
                                        </div>
                                        <div class="form-group">
                                        <input id="address" type="text" name="Cost_per_unit"  value="<?php echo $cost?>" class="form-control" placeholder="Cost per unit" maxlength="11" >
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                            if ($update == true):
                                            ?>
                                            <button type="submit" name="update" class="btn btn-info">update</button>
                                            <?php else: ?>
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <?php endif;?>
                                            
                                            
                                        </div>
                                        </form>
                               
                           </div>
                        
                           <div class="col-md-9">
                   
                            <?php
                            
                            $result = mysqli_query($conn, "SELECT * FROM items") or die("Connection failed: " . $conn->connect_error);
                            //pre_r($result);
                            ?>
                               
                               
                                    <div>
                                        <table id="itemView" class="table table-striped table-bordered dt-responsive">
                                                 <thead class="thead-dark">
                                                     <tr>
                                                         <th>Barcode</th>
                                                         <th>Product description</th>
                                                         <th>Quantity</th>
                                                         <th>Cost per unit</th>
                                                         <th>Action</th>
                                                          </tr>
                                                            </thead>
                                                            <?php
                                                            while ($row = $result->fetch_assoc()): ?>
                                                            <tr>
                                                                <td><?php echo $row['item_barcode'];?></td>
                                                                <td><?php echo $row['item_product_description'];?></td>
                                                                <td><?php echo $row['item_quantity'];?></td>
                                                                <td><?php echo $row['item_cost_per_unit'];?></td>
                                                                <td>
                                                                    <a href="items.php?edititem=<?php echo $row[ 'item_id' ]; ?>"
                                                                       class="btn btn-info">Edit</a>
                                                                       <a href="removeitem.php?deleteitem=<?php echo $row[ 'item_id' ]; ?>" onclick="return confirm('Remove item form the database?')"
                                                                       class="btn btn-danger">Delete</a>
                                                                </td>
                                                            </tr>
                                                 <?php  endwhile; ?>
                                                </table>
                                        <script>
                               $(document).ready(function() {
                               $('#itemView').DataTable();
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
             
        
        
        
     
          
    
                 <!-- add item to database -->
        <?php

                            function convert($toConvert){
                                return number_format($toConvert, 2);
                            }

                            if (isset($_POST['save'])) {
                               $barcode = $_POST['Barcode'];
                               $productdescription = $_POST['Product_description'];
                               $quantity = $_POST['Quantity'];
                               $cost = $_POST['Cost_per_unit'];
                               
                               
                               
                                mysqli_query($conn, "INSERT INTO items (item_barcode, item_product_description, item_quantity, item_cost_per_unit) 
                                        VALUES ('$barcode', '$productdescription', '$quantity', '$cost')") or die("Connection failed: " . $conn->connect_error);
                                
                                 echo "<meta http-equiv='refresh' content='0'>";
                            }
                        ?>
                 <?php
                            if (isset($_POST['update'])) {
                                $id = $_POST['id'];
                               $barcode = $_POST['Barcode'];
                               $productdescription = $_POST['Product_description'];
                               $quantity = $_POST['Quantity'];
                               $cost = $_POST['Cost_per_unit'];
                               
                               
                               
                                mysqli_query($conn, "UPDATE items SET item_barcode='$barcode', item_product_description='$productdescription', item_quantity='$quantity', item_cost_per_unit='$cost' WHERE item_id='$id'") or die("Connection failed: " . $conn->connect_error);
                                
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