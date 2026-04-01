<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\RegisterRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProcessRepository implements RegisterRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createUser($RegisterDTO)
    {
        return DB::transaction(function () use ($RegisterDTO) {
            return User::create([
                "name" => $RegisterDTO->name,
                "email" => $RegisterDTO->email,
                "phone" => $RegisterDTO->phone,
                "password" => Hash::make($RegisterDTO->password)
            ]);
        });
    }
}
