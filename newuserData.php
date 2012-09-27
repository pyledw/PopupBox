<?php
include 'Header.php';
echo $_POST["username"];
echo $_POST["password1"];
echo $_POST["password2"];
echo $_POST["fname"];
echo $_POST["lname"];
echo $_POST["email1"];
echo $_POST["email2"];
echo $_POST["phone"];
echo $_POST["address"];
echo $_POST["DOB"];
echo $_POST["city"];
echo $_POST["state"];
echo $_POST["zip"];
echo $_POST["SSN"];


if(isset($_POST['ck']) &&
   $_POST['ck'] == 'Yes')
{
    echo "Checkbox Checked";
}
else
{
    echo "Checkbox Not Checked";
}


include 'footer.php';
?>
