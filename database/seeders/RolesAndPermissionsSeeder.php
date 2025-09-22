<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $createUser = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_USER, 'guard_name' => 'sanctum']);
        $viewUser = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_USER, 'guard_name' => 'sanctum']);
        $updateUser = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_USER, 'guard_name' => 'sanctum']);
        $deleteUser = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_USER, 'guard_name' => 'sanctum']);
        $enableUser = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_USER, 'guard_name' => 'sanctum']);
        $disableUser = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_USER, 'guard_name' => 'sanctum']);
        $resetUser = Permission::create(['name' => \App\Enums\PermissionEnum::RESET_USER, 'guard_name' => 'sanctum']);

        $createAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $viewAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $updateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $deleteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $realizeAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::REALIZE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $editAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::EDIT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $closeAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CLOSE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $cancelAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $generateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::GENERATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $assignmentStatistics = Permission::create(['name' => \App\Enums\PermissionEnum::ASSIGNMENT_STATISTICS, 'guard_name' => 'sanctum']);

        $createInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_INVOICE, 'guard_name' => 'sanctum']);
        $viewInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_INVOICE, 'guard_name' => 'sanctum']);
        $updateInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_INVOICE, 'guard_name' => 'sanctum']);
        $deleteInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_INVOICE, 'guard_name' => 'sanctum']);
        $cancelInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_INVOICE, 'guard_name' => 'sanctum']);
        $generateInvoice = Permission::create(['name' => \App\Enums\PermissionEnum::GENERATE_INVOICE, 'guard_name' => 'sanctum']);
        $invoiceStatistics = Permission::create(['name' => \App\Enums\PermissionEnum::INVOICE_STATISTICS, 'guard_name' => 'sanctum']);

        $createPayment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAYMENT, 'guard_name' => 'sanctum']);
        $viewPayment = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAYMENT, 'guard_name' => 'sanctum']);
        $updatePayment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAYMENT, 'guard_name' => 'sanctum']);
        $deletePayment = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAYMENT, 'guard_name' => 'sanctum']);
        $cancelPayment = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_PAYMENT, 'guard_name' => 'sanctum']);
        $paymentStatistics = Permission::create(['name' => \App\Enums\PermissionEnum::PAYMENT_STATISTICS, 'guard_name' => 'sanctum']);

        $manageApp = Permission::create(['name' => \App\Enums\PermissionEnum::MANAGE_APP, 'guard_name' => 'sanctum']);

        Role::create([
            'name' => \App\Enums\RoleEnum::SYSTEM_ADMIN,
            'label' => 'Administrateur système',
            'description' => "Chargé de l'administration et de la configuration de la plateforme.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $viewAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,
            $manageApp,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::ADMIN,
            'label' => 'Administrateur plateforme',
            'description' => 'Chargé de la gestion de la plateforme.',
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $viewAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,
            $manageApp,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::CEO,
            'label' => 'Directeur général',
            'description' => "Chargé de la direction générale de l'entreprise.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $validateAssignment,
            $closeAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $createInvoice,
            $updateInvoice,
            $deleteInvoice,
            $cancelInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $createPayment,
            $updatePayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,
            $manageApp,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT_MANAGER,
            'label' => 'Responsable expert',
            'description' => "Responsable expert.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $validateAssignment,
            $closeAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $manageApp,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT,
            'label' => 'Expert',
            'description' => "Expert.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $closeAssignment,
            $generateAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::OPENER,
            'label' => 'Receptionniste',
            'description' => "Receptionniste.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $realizeAssignment,
            $closeAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::BUSINESS_DEVELOPER,
            'label' => 'Commercial',
            'description' => "Commercial",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $realizeAssignment,
            $closeAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EDITOR,
            'label' => 'Rédacteur',
            'description' => "Rédacteur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $viewAssignment,
            $updateAssignment,
            $editAssignment,
            $generateAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::VALIDATOR,
            'label' => 'Validateur',
            'description' => "Validateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $updateUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $validateAssignment,
            $closeAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::ACCOUNTANT_MANAGER,
            'label' => 'Chef Comptable',
            'description' => "Chef Comptable.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $closeAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $createInvoice,
            $updateInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $createPayment,
            $updatePayment,
            $paymentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::ACCOUNTANT,
            'label' => 'Comptable',
            'description' => "Comptable.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $closeAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $createInvoice,
            $updateInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $createPayment,
            $updatePayment,
            $paymentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::INSURER_ADMIN,
            'label' => 'Administrateur assureur',
            'description' => "Chargé de l'administration d'un assureur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewAssignment,
            $createAssignment,
            $updateAssignment,
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $viewUser,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::INSURER_STANDARD_USER,
            'label' => 'Utilisateur assureur',
            'description' => "Utilisateur assureur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewAssignment,
            $createAssignment,
            $updateAssignment,
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $viewUser,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::REPAIRER_ADMIN,
            'label' => 'Administrateur réparateur',
            'description' => "Chargé de l'administration d'un réparateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewAssignment,
            $updateAssignment,
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::REPAIRER_STANDARD_USER,
            'label' => 'Utilisateur réparateur',
            'description' => "Utilisateur réparateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewAssignment,
            $updateAssignment,
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::UNASSIGNED,
            'label' => 'Non assigné',
            'description' => 'Aucune habilitation',
            'guard_name' => 'sanctum',
        ]);
    }
}
