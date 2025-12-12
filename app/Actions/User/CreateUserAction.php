<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\Entity;
use App\Models\Status;
use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Jobs\SendRegistrationMailJob;
use Spatie\Permission\PermissionRegistrar;

class CreateUserAction
{
    public function __construct() {}

    public function execute(array $data): User
    {
        // $entity = Entity::firstWhere('code', $data['entity']);

        $role = Role::firstWhere('name', $data['role']);

        /**
         * @var User $user
         */
        $user = DB::transaction(function () use ($data, $role) {

            $password = $this->randomPassword();

            $user = User::create([
                'username' => Arr::get($data, 'username', Str::random(10)),
                'code' => $data['code'],
                'email' => $data['email'] ?? null,
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'telephone' => $data['telephone'] ?? null,
                'entity_id' => $data['entity_id'] ?? null,
                'current_role_id' => $role->id,
                // 'password' => bcrypt($password),
                'password' => bcrypt('12345678'),
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => auth()->user()->id ?? null,
                'updated_by' => auth()->user()->id ?? null,
            ])->assignRole($role->id);

            // TODO: Remove this line after production
            if (isset($data['password']) && $data['password']) {
                $user->update([
                    'password' => bcrypt($data['password']),
                    // 'welcome_valid_until' => null,
                    'email_verified_at' => now(),
                ]);
            }

            app(PermissionRegistrar::class)->setPermissionsTeamId($user->current_role_id);
            $user->assignRole($role->name);

            dispatch(new SendRegistrationMailJob($user, $password));

            return $user;
        });

        return $user;
    }

    public function randomPassword() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&^&*()-+={}[]:;<>?';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
