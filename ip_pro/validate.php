<?php
function validateName($name)
{
    $name = trim($name);
    $name = htmlspecialchars($name);

    $pattern = "/^[a-zA-Z ]+$/";

    if (!preg_match($pattern, $name)) {
        echo "
        <script>
        document.getElementById(\"error_name\").innerHTML=(\"*invalid name please provide a valid name\");
        </script>
        ";
        return false;
    } else return true;
}
function validateEmail($email)
{
    $email = trim($email);
    $email = htmlspecialchars($email);
    $pattern = '/^[^@\s]+@[^@\s]+\.[^@\s]+$/';

    /*if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
        <script>
        document.getElementById(\"error_email\").innerHTML=(\"*invalid email address please provide a valid email address\");
        </script>
        ";
        return false;
    } else if (preg_match($pattern, $email)) {
        echo "
        <script>
        document.getElementById(\"error_email\").innerHTML=(\"*invalid email please input a valid email address\");
        </script>
        ";
        return false;*/
   
        include 'connect.php';
        $sql = "SELECT * FROM admins WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "
                <script>
                document.getElementById(\"error_email\").innerHTML=(\"*email already exists\");
                </script>
                ";
                return false;
            } else {
                return true;
            }
        } else
            echo "couldn't access database right now";
    }


function validatePass($password)
{
    if (strlen($password) < 8) {
        echo "
        <script>
        document.getElementById(\"error_pass\").innerHTML=(\"*password must be 8 characters or more\");
        </script>
        ";
        return false;
    } else if (strlen($password) > 32) {
        echo "
        <script>
        document.getElementById(\"error_pass\").innerHTML=(\"*password must be 32 characters or less\");
        </script>
        ";
        return false;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).*$/', $password)) {
        if (!preg_match('/[a-z]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one lower case letter\");
            </script>
            ";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one upper case letter\");
            </script>
            ";
        }
        if (!preg_match('/\d/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one digit\");
            </script>
            ";
        }
        if (!preg_match('/[\W_]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one special character\");
            </script>
            ";
        }

        return false;
    } else return true;
}
function passCompare($pass1, $pass2)
{
    if ($pass1 != $pass2) {
        echo "
        <script>
        document.getElementById(\"error_passcomp\").innerHTML=(\"*passwords do not match\");
        </script>
        ";
        return false;
    } else return true;
}
