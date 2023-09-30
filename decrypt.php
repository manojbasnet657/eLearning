<?php
function aes_decrypt($ciphertext, $key, $iv) {
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
function your_aes_decrypt_function($block, $key) {
    // Implement your AES decryption logic here
    return $block; // Replace with actual decryption
}
$key = 'ThisIsASecretKey123'; // Replace with your key
$iv = '1234567890123456'; // Replace with your IV
$encryptedText="XFNdW19UVksIAgI3NjEwMw==";

// $encryptedText = aes_encrypt($textToEncrypt, $key, $iv);
// echo 'Encrypted Text: ' . base64_encode($encryptedText) . '<br>';

$decryptedText = aes_decrypt(base64_decode($encryptedText), $key, $iv);
echo 'Decrypted Text: ' . $decryptedText . '<br>';
?>



