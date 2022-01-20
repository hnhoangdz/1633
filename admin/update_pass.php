<?php
require_once "header.php";
$id = $_POST['id'];
if (isset($_POST['change'])) {
    $pass = $_POST['pass'];
    $retype = $_POST['retype'];
    if ($pass != $retype) { ?>
        <script>
            alert("Password & retype password don't match");
            window.location.href = "update_pass.php";
        </script>
        <?php } else {
        $token = encrypt_password($pass); 
        $sql = "UPDATE user SET passwordd = '$token' WHERE user_id = '$id'";
        $run = execute_query($sql);
        if ($run) { ?>
            <script type="text/javascript">
                alert("Update password successfully !");
                window.location.href = "customer.php";
            </script>
<?php }
    }
}
?>

<form action="" method="POST" style="color: white;width:fit-content">
    <fieldset>
        <legend>Update Password</legend>
        Password: <input type="password" name="pass" required> <br><br>
        Retype : <input type="password" name="retype" required> <br><br>
        <input type="hidden" name="id" value='<?= $id ?>'>
        <input type="submit" value="Change" name="change">
    </fieldset>
</form>