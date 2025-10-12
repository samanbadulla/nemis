<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueHashedNicUser implements ValidationRule
{
    protected $ignoreId;

    /**
     * Optionally ignore a specific people_id (useful for updates)
     */
    public function __construct($ignoreId = null)
    {
        $this->ignoreId = $ignoreId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hashedNic = hash('sha256', strtoupper(trim($value)));

        $query = User::where('nic_hash', $hashedNic);

        // When updating, ignore the current record
        if ($this->ignoreId) {
            $query->where('people_id', '!=', $this->ignoreId);
        }

        if ($query->exists()) {
            $fail('The NIC has already been taken.');
        }
    }
}
