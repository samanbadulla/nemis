<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniquePhoneAcrossTables implements ValidationRule
{
    protected $ignorePeopleId;
    protected $ignoreUserId;

    public function __construct($ignorePeopleId = null, $ignoreUserId = null)
    {
        $this->ignorePeopleId = $ignorePeopleId;
        $this->ignoreUserId   = $ignoreUserId;
    }

    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        // Check in people table
        $existsInPeople = DB::table('people')
            ->where('phone', $value)
            ->when($this->ignorePeopleId, fn($q) => $q->where('people_id', '!=', $this->ignorePeopleId))
            ->exists();

        // Check in users table
        $existsInUsers = DB::table('users')
            ->where('contact', $value)
            ->when($this->ignoreUserId, fn($q) => $q->where('id', '!=', $this->ignoreUserId))
            ->exists();

        if ($existsInPeople || $existsInUsers) {
            $fail('The phone number has already been taken.');
        }
    }
}
