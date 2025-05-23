<?php
class Encryption {
    private $method = 'AES-256-CBC';

    public function encrypt($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
        $encrypted = openssl_encrypt($data, $this->method, $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }

    public function decrypt($data, $key) {
        $data = base64_decode($data);
        $ivLength = openssl_cipher_iv_length($this->method);
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);
        return openssl_decrypt($encrypted, $this->method, $key, 0, $iv);
    }
}
?>

