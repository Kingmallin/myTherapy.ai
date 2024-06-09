<?php

namespace App\Models\User\Services;

use Illuminate\Support\Facades\Crypt;
use stdClass;

class EncryptionService
{
    /**
     * Encrypt a value.
     *
     * @param string $value
     * @return string
     */
    public function encrypt(string $value): string
    {
        return Crypt::encrypt($value);
    }

    /**
     * Decrypt an encrypted value.
     *
     * @param string $encryptedValue
     * @return stdClass|null
     */
    /**
     * Decrypt an encrypted value.
     *
     * @param string $encryptedValue
     * @return stdClass|null
     */
    public function decrypt(string $encryptedValue): ?stdClass
    {
        try {
            $encryptedValue = trim($encryptedValue);

            $decryptedValue = Crypt::decrypt($encryptedValue);

            // Check if the decrypted value is in JSON format
            if ($this->isJson($decryptedValue)) {
                return json_decode($decryptedValue);
            } else {
                // Handle other formats or return null if not recognizable
                return null;
            }
        } catch (\Exception $e) {
            // Handle decryption failure (e.g., invalid MAC)
            return null;
        }
    }

    /**
     * Check if a string is a valid JSON.
     *
     * @param string $string
     * @return bool
     */
    private function isJson(string $string): bool
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
