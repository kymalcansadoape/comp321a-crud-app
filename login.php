<?php
include "connection.php";
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['uname'] = $row['username'];
        }
        header('location:index.php');
    } else {
?>
        <script>
            alert("Invalid username or password, Please try again");
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <h1 class="text-center">Login</h1>
        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="text-center">
            <input class="btn btn-outline-dark w-50 mx-auto form-control mt-3" type="submit" value="login" name="login">
        </div>
    </form>
</body>

</html>