<?php
class Crypto {
    private $cipher;
    private $key;
    private $iv;

    public function __construct($key) {
        $this->cipher = 'aes-256-cbc'; // نوع رمزنگاری
        $this->key = hash('sha256', $key, true); // تولید کلید
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)); // تولید بردار اولیه
    }

    public function encrypt($data) {
        $encrypted = openssl_encrypt($data, $this->cipher, $this->key, 0, $this->iv);
        return base64_encode($encrypted . '::' . $this->iv); // ترکیب رمزنگاری شده و بردار اولیه و تبدیل به base64
    }

    public function decrypt($data) {
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, $this->cipher, $this->key, 0, $iv);
    }
}
?>
