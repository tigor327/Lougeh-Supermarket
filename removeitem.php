        <?php     
        include('conf.php');
        
                            if (isset($_GET['deleteitem'])) {
                               $id = $_GET['deleteitem']; 
                               
                                mysqli_query($conn, "DELETE FROM items WHERE item_id=$id ") or die("Connection failed: " . $conn->connect_error);                                
                                                       header("location: items.php");

                                }
                            if (isset($_GET['deletecustomer'])) {
                               $id = $_GET['deletecustomer']; 
                               
                                mysqli_query($conn, "DELETE FROM customers WHERE Cus_id=$id ") or die("Connection failed: " . $conn->connect_error);                                
                            
                                header("location: customer.php");
                            }
                            
                            if (isset($_GET['deletesupplier'])) {
                               $id = $_GET['deletesupplier']; 
                               
                                mysqli_query($conn, "DELETE FROM suppliers WHERE sup_id=$id ") or die("Connection failed: " . $conn->connect_error);                                
                            
                                header("location: Suppliers.php");
                            }
                            
                            if (isset($_GET['deletesale'])) {
                               $id = $_GET['deletesale']; 
                               
                                mysqli_query($conn, "DELETE FROM sales WHERE sale_id=$id ") or die("Connection failed: " . $conn->connect_error);                                
                            
                                header("location: salestransactions.php");
                            }
                            
                            if (isset($_GET['deletedelivery'])) {
                               $id = $_GET['deletedelivery']; 
                               
                                mysqli_query($conn, "DELETE FROM deliveries WHERE delivery_id=$id ") or die("Connection failed: " . $conn->connect_error);                                
                            
                                header("location: deliverytransactions.php");
                            }
                        ?>