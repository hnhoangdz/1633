<?php
require_once "header.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query1 = "SELECT * FROM products WHERE models_id = '$id'";
    $run = execute_query($query);
    if($run->num_rows>0){
        ?>
        <script>
            alert("This model have products!Can't delete");
            window.location.href = "manage_models.php";
        </script>
    <?php } else { 
        $query2 =  "DELETE FROM models WHERE models_id = '$id'";
        $run2 = execute_query($query2);
        ?>
        <script>
            alert("Delete model successful");
            window.location.href = "manage_models.php";
        </script>
<?php  } } ?>