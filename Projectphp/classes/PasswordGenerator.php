<?php
class PasswordGenerator {
    public function generate($length = 12, $lower = 3, $upper = 3, $numbers = 2, $symbols = 2) {
        // Define character pools
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits    = '0123456789';
        $special   = '!@#$%^&*()_+';

        $password = '';
        
        // Add lowercase letters
        for ($i = 0; $i < $lower; $i++) {
            $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
        }
        
        // Add uppercase letters
        for ($i = 0; $i < $upper; $i++) {
            $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
        }
        
        // Add numbers
        for ($i = 0; $i < $numbers; $i++) {
            $password .= $digits[rand(0, strlen($digits) - 1)];
        }
        
        // Add symbols
        for ($i = 0; $i < $symbols; $i++) {
            $password .= $special[rand(0, strlen($special) - 1)];
        }

        // Fill remaining length with random characters
        $remaining = $length - ($lower + $upper + $numbers + $symbols);
        $allChars = $lowercase . $uppercase . $digits . $special;
        for ($i = 0; $i < $remaining; $i++) {
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }

        // Shuffle the password to mix characters
        return str_shuffle($password);
    }
}
?>