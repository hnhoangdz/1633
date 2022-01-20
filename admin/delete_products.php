<?php
require_once "header.php";
$id = $_POST['id'];
$_query = "DELETE FROM products WHERE products_id = '$id'";
$run = execute_query($_query);
if($run){ ?>
    <script>
        alert("Delete succeed");
        window.location.href = "manage_products.php";
    </script>
<?php } else {?>
   <script>
       alert("Something went wrong! Can't delete");
       window.location.href = "manage_products.php";
   </script>
<?php } ?>