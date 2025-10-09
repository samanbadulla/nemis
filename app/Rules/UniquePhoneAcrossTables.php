<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniquePhoneAcrossTables implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $existsInPeople = DB::table('people')->where('phone', $value)->exists();
        $existsInUsers = DB::table('users')->where('contact', $value)->exists();

        if ($existsInPeople || $existsInUsers) {
            $fail('The phone number has already been taken.');
        }
    }
}
