<?php
// aes_encrypt.php
function aes_encrypt($plaintext, $key, $iv) {
    $blockSize = 16;

    // Pad the plaintext to match block size
    $padding = $blockSize - (strlen($plaintext) % $blockSize);
    $plaintext .= str_repeat(chr($padding), $padding);

    $ciphertext = '';
    $prevBlock = $iv;

    for ($i = 0; $i < strlen($plaintext); $i += $blockSize) {
        $block = substr($plaintext, $i, $blockSize) ^ $prevBlock;

        // Perform AES encryption (replace this with your own AES logic)
        $encryptedBlock = your_aes_encrypt_function($block, $key);

        $ciphertext .= $encryptedBlock;
        $prevBlock = $encryptedBlock;
    }

    return $ciphertext;
}
function your_aes_encrypt_function($block, $key) {
    // Implement your AES encryption logic here
    return $block; // Replace with actual encryption
}
$key = 'ThisIsASecretKey123'; // Replace with your key
$iv = '1234567890123456'; // Replace with your IV
$textToEncrypt = 'manojbasnet';

$encryptedText = base64_encode(aes_encrypt($textToEncrypt, $key, $iv));
echo 'Encrypted Text: ' .$encryptedText . '<br>';

// $decryptedText = aes_decrypt($encryptedText, $key, $iv);
// echo 'Decrypted Text: ' . $decryptedText . '<br>';
?>

