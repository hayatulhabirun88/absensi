<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class EncryptionHelper
{
    // Fungsi untuk mengenkripsi data
    public static function encryptData($data)
    {
        try {
            return Crypt::encryptString($data);
        } catch (\Exception $e) {
            Log::error("Error during encryption: " . $e->getMessage());
            return null;
        }
    }

    // Fungsi untuk mendekripsi data
    public static function decryptData($encryptedData)
    {
        try {
            return Crypt::decryptString($encryptedData);
        } catch (\Exception $e) {
            Log::error("Error during decryption: " . $e->getMessage());
            return null;
        }
    }
}