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
    public function decrypt(string $encryptedValue): ?stdClass
    {
        try {
            return json_decode(Crypt::decrypt($encryptedValue));
        } catch (\Exception $e) {
            // Handle decryption failure (e.g., invalid MAC)
            return null;
        }
    }
}
