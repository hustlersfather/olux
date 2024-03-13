<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}

// Assuming input has been sanitized earlier in the script
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$method = mysqli_real_escape_string($dbcon, $_POST['methodpay']);
$amount = mysqli_real_escape_string($dbcon, htmlspecialchars($_POST['amount'])); 

if ($_POST['methodpay'] == "BitcoinPayment") {
    if ($amount < 5) {
        echo "01"; // Minimum amount not met
    } else {
        // Use Coinbase Commerce API to create a new charge
        $apiUrl = 'https://api.commerce.coinbase.com/charges';
        $headers = [
            'Content-Type: application/json',
            'X-CC-Api-Key: <Your_Coinbase_Commerce_API_Key>',
            'X-CC-Version: 2018-03-22'
        ];
        $postData = json_encode([
            'name' => 'Transaction Name',
            'description' => 'Transaction Description',
            'pricing_type' => 'fixed_price',
            'local_price' => [
                'amount' => $amount,
                'currency' => 'USD'
            ],
            'metadata' => [
                'customer_id' => $uid,
                'customer_name' => $_SESSION['sname']
            ],
            'redirect_url' => 'https://yourdomain.com/success_page',
            'cancel_url' => 'https://yourdomain.com/cancel_page'
        ]);

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

$responseObj = json_decode($response);

if ($responseObj && $responseObj->data) {
    $btcAddress = $responseObj->data->addresses->bitcoin;
    $random = substr(md5(mt_rand()), 0, 60); // Confirmation code
    $date = date('Y/m/d h:i:s');

    // Insert payment details into database
    $sql2 = "INSERT INTO payment(user, method, amount, amountusd, address, p_data, state, date) 
             VALUES('$uid', 'Bitcoin', '$amount', '$amount', '$btcAddress', '$random', 'pending', '$date')";
    if (mysqli_query($dbcon, $sql2)) {
        // Prepare to send a confirmation email
        $userEmail = "user@example.com"; // This should be the user's email address
        $subject = "Payment Confirmation";
        $message = "Thank you for your payment.\n\nConfirmation Code: $random\nAmount: $amount USD\nTransaction Date: $date\n\nThis is your transaction receipt. Please keep it for your records.";
        $headers = 'From: noreply@yourdomain.com' . "\r\n" .
                   'Reply-To: support@yourdomain.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // Send the email
        mail($userEmail, $subject, $message, $headers);

        // Redirect to a "Thank You" page with the confirmation code
        header('Location: thank_you.php?confirmation_code=' . $random);
        exit();
    } else {
        echo "Error processing payment.";
    }
} else {
    echo "Error creating charge.";
}
?>