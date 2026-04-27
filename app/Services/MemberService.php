<?php

namespace App\Services;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class MemberService
{
    /**
     * Create a new member along with their user account.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createMember(array $data)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $user->assignRole('member');

            $lastMember = Member::orderBy('id', 'desc')->first();
            $nextId = $lastMember ? $lastMember->id + 1 : 1;
            $memberCode = 'MBR-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            $member = Member::create([
                'user_id' => $user->id,
                'member_code' => $memberCode,
                'name' => $data['name'],
                'phone' => $data['phone'] ?? null,
                'address' => $data['address'] ?? null,
            ]);

            DB::commit();

            return [
                'user' => $user,
                'member' => $member,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
