        <?php     
        include('conf.php');
        session_start();
        $update = false;
        $id = 0;
        $barcode = '';
        $productdescription = '';
         $quantity = '';
         $cost = '';
         $fname = '';
         $mi = '';
         $lname = '';
         $address = '';
         $contact = '';
         $Comname = '';
         $Comcontactnumber = '';
         $Comaddress = '';
         $newid = '';
         $ScusName = '';
         $SitemBought = '';
         $SitemQuantity = '';
         $SitemCost = '';
         $DsupName = '';
         $DitemBought = '';
         $DitemQuantity = '';
         $DitemCost = '';
         if (isset($_GET['edititem'])) {
                               $id = $_GET['edititem']; 
                               $update = true;
                                $result = mysqli_query($conn, "SELECT * FROM items WHERE item_id=$id ") or die("Connection failed: " . $conn->connect_error);
                                if ($result->num_rows !==0){
                                    $row = $result->fetch_array();
                                    $barcode = $row['item_barcode'];
                                    $productdescription = $row['item_product_description'];
                                    $quantity = $row['item_quantity'];
                                    $cost = $row['item_cost_per_unit'];
                                    
                                }
                            }
                            
                             if (isset($_GET['editcustomer'])) {
                               $id = $_GET['editcustomer']; 
                               $update = true;
                                $result = mysqli_query($conn, "SELECT * FROM customers WHERE Cus_id=$id ") or die("Connection failed: " . $conn->connect_error);
                                if ($result->num_rows !==0){
                                    $row = $result->fetch_array();
                                    $fname = $row['Cus_FirstName'];
                                    $mi = $row['Cus_MI'];
                                    $lname = $row['Cus_LastName'];
                                    $address = $row['Cus_Address'];
                                    $contact = $row['Cus_ContactNum'];
                                    
                                }
                            }
                            
                           if (isset($_GET['editsupplier'])) {
                               $id = $_GET['editsupplier']; 
                               $update = true;
                                $result = mysqli_query($conn, "SELECT * FROM suppliers WHERE sup_id=$id ") or die("Connection failed: " . $conn->connect_error);
                                if ($result->num_rows !==0){
                                    $row = $result->fetch_array();
                                    $id = $row['sup_id'];
                                    $newid = $row['sup_id_'];
                                    $Comname = $row['sup_company_name'];
                                    $Comcontactnumber = $row['sup_contact_num'];
                                    $Comaddress = $row['sup_address'];
                                    
                                }
                            }
                            
                            if (isset($_GET['editsale'])) {
                               $id = $_GET['editsale']; 
                               $update = true;
                                $result = mysqli_query($conn, "SELECT * FROM sales WHERE sale_id=$id ") or die("Connection failed: " . $conn->connect_error);
                                if ($result->num_rows !==0){
                                    $row = $result->fetch_array();
                                    $ScusName = $row['Cus_name'];
                                    $SitemBought = $row['item_name'];
                                    $SitemQuantity = $row['item_quantity'];
                                    $SitemCost = $row['item_cost_per_unit'];
                                    
                                }
                            }
                            
                            if (isset($_GET['editdelivery'])) {
                               $id = $_GET['editdelivery']; 
                               $update = true;
                                $result = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id=$id ") or die("Connection failed: " . $conn->connect_error);
                                if ($result->num_rows !==0){
                                    $row = $result->fetch_array();
                                    $DsupName = $row['sup_name'];
                                    $DitemBought = $row['item_name'];
                                    $DitemQuantity = $row['item_quantity'];
                                    $DitemCost = $row['item_cost_per_unit'];
                                    
                                }
                            }
                            
                        ?>