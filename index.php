<?php
require_once 'Crypto.php';

// کلید رمزنگاری
$key = 'my_secret_key';

// نمونه‌سازی از کلاس Crypto
$crypto = new Crypto($key);

// رشته‌ای که می‌خواهیم رمزنگاری کنیم
$data = "Hello, world!";

// رمزنگاری
$encrypted = $crypto->encrypt($data);
echo "Encrypted: " . $encrypted . "\n";

// باز کردن رمزنگاری
$decrypted = $crypto->decrypt($encrypted);
echo "Decrypted: " . $decrypted . "\n";
?>
