<?php

$Name = $_POST['name'];
$password = $_POST['password'];
$con = mysqli_connect("localhost", "root", "", "project2") or die("failed to connect");
$result = mysqli_query($con, "SELECT * FROM `userlogin` WHERE ( UserName ='$Name' OR Email = '$Name')");
$row =  mysqli_fetch_assoc($result);
$EncPassword = $row['Password'];
session_start();
// decrypt password from database
function aes_decrypt($ciphertext, $key, $iv)
{
    $blockSize = 16;
    $plaintext = '';
    $prevBlock = $iv;

    for ($i = 0; $i < strlen($ciphertext); $i += $blockSize) {
        $encryptedBlock = substr($ciphertext, $i, $blockSize);

        // Perform AES decryption (replace this with your own AES logic)
        $decryptedBlock = your_aes_decrypt_function($encryptedBlock, $key);

        $plaintext .= $decryptedBlock ^ $prevBlock;
        $prevBlock = $encryptedBlock;
    }

    // Remove padding
    $padding = ord($plaintext[strlen($plaintext) - 1]);
    $plaintext = substr($plaintext, 0, -$padding);

    return $plaintext;
}
function your_aes_decrypt_function($block, $key)
{
    return $block; // Replace with actual decryption
}
$key = 'ThisIsASecretKey123'; // Replace with your key
$iv = '1234567890123456'; // Replace with your IV
$encryptedText = $EncPassword;

$decryptedText = aes_decrypt(base64_decode($encryptedText), $key, $iv);

if(mysqli_num_rows($result)){
    $_SESSION['user'] = $Name ;
    echo"
    <script >
    alert('successfully login');
    window.location.href= 'index.php';
    </script>
    ";

}else{
    echo"
        <script>
        alert(' incorrect email/user/password')
        window.location.href= 'user-login.php';
        </script>
        ";
}
?>
