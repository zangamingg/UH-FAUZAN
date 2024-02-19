<?php
// Dummy data for demonstration purposes only
$users = [
    [
        'email' => 'ozangaming@gmail.com',
        'password' => 'ozan1',
    ],
    [
        'email' => 'ozangaming@gmail.com',
        'password' => 'ozann2',
    ],
];

// Fetch user data based on email
$user = null;
foreach ($users as $possibleUser) {
    if ($possibleUser['email'] === $_POST['email']) {
        $user = $possibleUser;
        break;
    }
}

// Check if the user exists and password is correct
if ($user && $user['password'] === $_POST['password']) {
    // Password is correct, user is logged in
    session_start();
    $_SESSION['email'] = $user['email'];
    header('Location: dashboard.php');
} else {
    // Password is incorrect or user not found
    header('Location: index.php?error=1');
}