<?php
include 'database.php';
if (isset($_POST['submits'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // aes_encrypt.php
    //encrypted code start
    // created function for encrpyting text
    // this function return cipherText afater processing given parameterized data
    function aes_encrypt($plaintext, $key, $iv)
    {
        //declare block
        $blockSize = 16;
        // Pad the plaintext to match block size
        // take out size of string
        $padding = $blockSize - (strlen($plaintext) % $blockSize);
        // provide string value to character
        $plaintext .= str_repeat(chr($padding), $padding);
        // to put encrypted text
        $ciphertext = '';
        $prevBlock = $iv;
        //looping for getting ciper suit value
        for ($i = 0; $i < strlen($plaintext); $i += $blockSize) {
            $block = substr($plaintext, $i, $blockSize) ^ $prevBlock;
            // call the function to concat string with given key
            $encryptedBlock = your_aes_encrypt_function($block, $key);

            $ciphertext .= $encryptedBlock;
            $prevBlock = $encryptedBlock;
        }

        return $ciphertext;
    }
    function your_aes_encrypt_function($block, $key)
    {
        return $block; // Replace with actual encryption
    }
    $key = 'ThisIsASecretKey123'; // Replace with your key
    $iv = '1234567890123456'; // Replace with your IV
    $textToEncrypt = $password;

    $encryptedText = base64_encode(aes_encrypt($textToEncrypt, $key, $iv));



    $dup_Email = mysqli_query($con, "SELECT * FROM `userlogin` WHERE Email = '$email'");
    $dup_Username = mysqli_query($con, "SELECT * FROM `userlogin` WHERE UserName = '$name' ");
    if (mysqli_num_rows($dup_Email)) {
        echo "
        <script >
        alert('the Email is already taken')
        window.local.herf= 'register.php';
        </script>
        ";
    }
    if (mysqli_num_rows($dup_Username)) {
        echo "
    <script >
    alert('theusername is already taken')
    window.local.href= 'register.php';
    </script>
    ";
    } else {
        mysqli_query($con, "INSERT INTO `userlogin`( `UserName`, `Email`, `Number`, `Password`)
    VALUES ('$name','$email','  $number',' $encryptedText')");
        echo "
    <script >
    alert('Register success')
    </script>
    ";
    header("location:user-login.php");
    }
}
?>