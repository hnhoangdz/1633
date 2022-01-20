<?php
require_once "header.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query1 = "SELECT * FROM products WHERE products_type_id = '$id'";
    $run = execute_query($query);
    if($run->num_rows>0){
        ?>
        <script>
            alert("This type have products!Can't delete");
            window.location.href = "manage_types.php";
        </script>
    <?php } else { 
        $query2 =  "DELETE FROM products_type WHERE products_type_id = '$id'";
        $run2 = execute_query($query2);
        ?>
        <script>
            alert("Delete type successful");
            window.location.href = "manage_types.php";
        </script>
<?php  } } ?>