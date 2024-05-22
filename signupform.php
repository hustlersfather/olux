<?php
include_once("includes/config.php");
 
db_connection();

session_start();

if (is_login()) {
    header("Location: index.php");
    exit();
}

$respond = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password'], $_POST['jabber'], $_POST['captcha'])) {
        if ($_POST['captcha'] === $_SESSION["captcha"]) {
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $jabber = clean($_POST['jabber']);
            $jabber = htmlspecialchars($jabber);

            if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
                $respond = ['type' => 'danger', 'text' => 'Bad Username, use only A-z,0-9 symbols'];
            } elseif (strlen($username) < 3) {
                $respond = ['type' => 'danger', 'text' => 'Username at least 3 characters'];
            } elseif (strlen($username) > 20) {
                $respond = ['type' => 'danger', 'text' => 'Username no more than 20 characters'];
            } elseif (strlen($password) < 6) {
                $respond = ['type' => 'danger', 'text' => 'Password at least 6 characters'];
            } elseif (!filter_var($jabber, FILTER_VALIDATE_EMAIL)) {
                $respond = ['type' => 'danger', 'text' => 'Invalid Jabber address'];
            } else {
                $sql = "SELECT username FROM users WHERE username=? OR jabber=?";
                $stmt = $data_sql->prepare($sql);
                $stmt->bind_param('ss', $username, $jabber);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows >= 1) {
                    $user = $result->fetch_assoc();
                    if ($username === $user['username']) {
                        $respond = ['type' => 'danger', 'text' => 'This username has been used'];
                    } else {
                        $respond = ['type' => 'danger', 'text' => 'This Jabber address has been used'];
                    }
                } else {
                    $sql = "INSERT INTO users (username, password, jabber, regDate) VALUES (?, ?, ?, ?)";
                    $stmt = $data_sql->prepare($sql);
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $regDate = time();
                    $stmt->bind_param('sssi', $username, $hashed_password, $jabber, $regDate);

                    if ($stmt->execute()) {
                        $respond = ['type' => 'success', 'text' => "Hello <b>$username</b>, your account has been created"];
                    } else {
                        $respond = ['type' => 'danger', 'text' => 'Error creating account: ' . $stmt->error];
                    }
                }

                $stmt->close();
            }
        } else {
            $respond = ['type' => 'danger', 'text' => 'Wrong captcha'];
        }
    }
}

db_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Adjust the path to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if (!empty($respond)): ?>
            <div class="alert alert-<?= htmlspecialchars($respond['type']) ?>">
                <?= htmlspecialchars($respond['text']) ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required​⬤