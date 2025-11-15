<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
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

        $permissions = [];
        foreach (PermissionEnum::cases() as $permissionEnum) {
            $permissions[$permissionEnum->value] = Permission::firstOrCreate([
                'name' => $permissionEnum->value,
                'guard_name' => 'sanctum',
            ]);
        }

        $permission = static function (PermissionEnum $enum) use (&$permissions): Permission {
            return $permissions[$enum->value];
        };

        $createUser = $permission(PermissionEnum::CREATE_USER);
        $viewUser = $permission(PermissionEnum::VIEW_USER);
        $updateUser = $permission(PermissionEnum::UPDATE_USER);
        $deleteUser = $permission(PermissionEnum::DELETE_USER);
        $enableUser = $permission(PermissionEnum::ENABLE_USER);
        $disableUser = $permission(PermissionEnum::DISABLE_USER);
        $resetUser = $permission(PermissionEnum::RESET_USER);

        $createAssignmentRequest = $permission(PermissionEnum::CREATE_ASSIGNMENT_REQUEST);
        $viewAssignmentRequest = $permission(PermissionEnum::VIEW_ASSIGNMENT_REQUEST);
        $updateAssignmentRequest = $permission(PermissionEnum::UPDATE_ASSIGNMENT_REQUEST);
        $deleteAssignmentRequest = $permission(PermissionEnum::DELETE_ASSIGNMENT_REQUEST);
        $acceptAssignmentRequest = $permission(PermissionEnum::ACCEPT_ASSIGNMENT_REQUEST);
        $rejectAssignmentRequest = $permission(PermissionEnum::REJECT_ASSIGNMENT_REQUEST);
        $cancelAssignmentRequest = $permission(PermissionEnum::CANCEL_ASSIGNMENT_REQUEST);

        $createAssignment = $permission(PermissionEnum::CREATE_ASSIGNMENT);
        $viewAssignment = $permission(PermissionEnum::VIEW_ASSIGNMENT);
        $updateAssignment = $permission(PermissionEnum::UPDATE_ASSIGNMENT);
        $deleteAssignment = $permission(PermissionEnum::DELETE_ASSIGNMENT);
        $realizeAssignment = $permission(PermissionEnum::REALIZE_ASSIGNMENT);
        $editAssignment = $permission(PermissionEnum::EDIT_ASSIGNMENT);
        $validateAssignment = $permission(PermissionEnum::VALIDATE_ASSIGNMENT);
        $closeAssignment = $permission(PermissionEnum::CLOSE_ASSIGNMENT);
        $cancelAssignment = $permission(PermissionEnum::CANCEL_ASSIGNMENT);
        $generateAssignment = $permission(PermissionEnum::GENERATE_ASSIGNMENT);
        $assignmentStatistics = $permission(PermissionEnum::ASSIGNMENT_STATISTICS);
        $createWorksheetAssignment = $permission(PermissionEnum::CREATE_WORKSHEET_ASSIGNMENT);
        $createQuoteAssignment = $permission(PermissionEnum::CREATE_QUOTE_ASSIGNMENT);
        $validateQuoteAssignment = $permission(PermissionEnum::VALIDATE_QUOTE_ASSIGNMENT);
        $cancelQuoteAssignment = $permission(PermissionEnum::CANCEL_QUOTE_ASSIGNMENT);

        $createInvoice = $permission(PermissionEnum::CREATE_INVOICE);
        $viewInvoice = $permission(PermissionEnum::VIEW_INVOICE);
        $updateInvoice = $permission(PermissionEnum::UPDATE_INVOICE);
        $deleteInvoice = $permission(PermissionEnum::DELETE_INVOICE);
        $cancelInvoice = $permission(PermissionEnum::CANCEL_INVOICE);
        $generateInvoice = $permission(PermissionEnum::GENERATE_INVOICE);
        $invoiceStatistics = $permission(PermissionEnum::INVOICE_STATISTICS);

        $createPayment = $permission(PermissionEnum::CREATE_PAYMENT);
        $viewPayment = $permission(PermissionEnum::VIEW_PAYMENT);
        $updatePayment = $permission(PermissionEnum::UPDATE_PAYMENT);
        $deletePayment = $permission(PermissionEnum::DELETE_PAYMENT);
        $cancelPayment = $permission(PermissionEnum::CANCEL_PAYMENT);
        $paymentStatistics = $permission(PermissionEnum::PAYMENT_STATISTICS);
        $dashboard = $permission(PermissionEnum::DASHBOARD);
        
        $createShock = $permission(PermissionEnum::CREATE_SHOCK);
        $viewShock = $permission(PermissionEnum::VIEW_SHOCK);
        $updateShock = $permission(PermissionEnum::UPDATE_SHOCK);
        $deleteShock = $permission(PermissionEnum::DELETE_SHOCK);

        $createShockWork = $permission(PermissionEnum::CREATE_SHOCK_WORK);
        $viewShockWork = $permission(PermissionEnum::VIEW_SHOCK_WORK);
        $updateShockWork = $permission(PermissionEnum::UPDATE_SHOCK_WORK);
        $deleteShockWork = $permission(PermissionEnum::DELETE_SHOCK_WORK);

        $createShockPoint = $permission(PermissionEnum::CREATE_SHOCK_POINT);
        $viewShockPoint = $permission(PermissionEnum::VIEW_SHOCK_POINT);
        $updateShockPoint = $permission(PermissionEnum::UPDATE_SHOCK_POINT);
        $deleteShockPoint = $permission(PermissionEnum::DELETE_SHOCK_POINT);

        $createWorkforce = $permission(PermissionEnum::CREATE_WORKFORCE);
        $viewWorkforce = $permission(PermissionEnum::VIEW_WORKFORCE);
        $updateWorkforce = $permission(PermissionEnum::UPDATE_WORKFORCE);
        $deleteWorkforce = $permission(PermissionEnum::DELETE_WORKFORCE);

        $createWorkforceType = $permission(PermissionEnum::CREATE_WORKFORCE_TYPE);
        $viewWorkforceType = $permission(PermissionEnum::VIEW_WORKFORCE_TYPE);
        $updateWorkforceType = $permission(PermissionEnum::UPDATE_WORKFORCE_TYPE);
        $deleteWorkforceType = $permission(PermissionEnum::DELETE_WORKFORCE_TYPE);

        $createAssignmentType = $permission(PermissionEnum::CREATE_ASSIGNMENT_TYPE);
        $viewAssignmentType = $permission(PermissionEnum::VIEW_ASSIGNMENT_TYPE);
        $updateAssignmentType = $permission(PermissionEnum::UPDATE_ASSIGNMENT_TYPE);
        $deleteAssignmentType = $permission(PermissionEnum::DELETE_ASSIGNMENT_TYPE);

        $createExpertiseType = $permission(PermissionEnum::CREATE_EXPERTISE_TYPE);
        $viewExpertiseType = $permission(PermissionEnum::VIEW_EXPERTISE_TYPE);
        $updateExpertiseType = $permission(PermissionEnum::UPDATE_EXPERTISE_TYPE);
        $deleteExpertiseType = $permission(PermissionEnum::DELETE_EXPERTISE_TYPE);

        $createGeneralState = $permission(PermissionEnum::CREATE_GENERAL_STATE);
        $viewGeneralState = $permission(PermissionEnum::VIEW_GENERAL_STATE);
        $updateGeneralState = $permission(PermissionEnum::UPDATE_GENERAL_STATE);
        $deleteGeneralState = $permission(PermissionEnum::DELETE_GENERAL_STATE);

        $createClaimNature = $permission(PermissionEnum::CREATE_CLAIM_NATURE);
        $viewClaimNature = $permission(PermissionEnum::VIEW_CLAIM_NATURE);
        $updateClaimNature = $permission(PermissionEnum::UPDATE_CLAIM_NATURE);
        $deleteClaimNature = $permission(PermissionEnum::DELETE_CLAIM_NATURE);

        $createTechnicalConclusion = $permission(PermissionEnum::CREATE_TECHNICAL_CONCLUSION);
        $viewTechnicalConclusion = $permission(PermissionEnum::VIEW_TECHNICAL_CONCLUSION);
        $updateTechnicalConclusion = $permission(PermissionEnum::UPDATE_TECHNICAL_CONCLUSION);
        $deleteTechnicalConclusion = $permission(PermissionEnum::DELETE_TECHNICAL_CONCLUSION);

        $createCheck = $permission(PermissionEnum::CREATE_CHECK);
        $viewCheck = $permission(PermissionEnum::VIEW_CHECK);
        $updateCheck = $permission(PermissionEnum::UPDATE_CHECK);
        $deleteCheck = $permission(PermissionEnum::DELETE_CHECK);

        $createBank = $permission(PermissionEnum::CREATE_BANK);
        $viewBank = $permission(PermissionEnum::VIEW_BANK);
        $updateBank = $permission(PermissionEnum::UPDATE_BANK);
        $deleteBank = $permission(PermissionEnum::DELETE_BANK);

        $createPaymentType = $permission(PermissionEnum::CREATE_PAYMENT_TYPE);
        $viewPaymentType = $permission(PermissionEnum::VIEW_PAYMENT_TYPE);
        $updatePaymentType = $permission(PermissionEnum::UPDATE_PAYMENT_TYPE);
        $deletePaymentType = $permission(PermissionEnum::DELETE_PAYMENT_TYPE);

        $createPaymentMethod = $permission(PermissionEnum::CREATE_PAYMENT_METHOD);
        $viewPaymentMethod = $permission(PermissionEnum::VIEW_PAYMENT_METHOD);
        $updatePaymentMethod = $permission(PermissionEnum::UPDATE_PAYMENT_METHOD);
        $deletePaymentMethod = $permission(PermissionEnum::DELETE_PAYMENT_METHOD);

        $createClient = $permission(PermissionEnum::CREATE_CLIENT);
        $viewClient = $permission(PermissionEnum::VIEW_CLIENT);
        $updateClient = $permission(PermissionEnum::UPDATE_CLIENT);
        $deleteClient = $permission(PermissionEnum::DELETE_CLIENT);

        $createPhoto = $permission(PermissionEnum::CREATE_PHOTO);
        $viewPhoto = $permission(PermissionEnum::VIEW_PHOTO);
        $updatePhoto = $permission(PermissionEnum::UPDATE_PHOTO);
        $deletePhoto = $permission(PermissionEnum::DELETE_PHOTO);

        $createPhotoType = $permission(PermissionEnum::CREATE_PHOTO_TYPE);
        $viewPhotoType = $permission(PermissionEnum::VIEW_PHOTO_TYPE);
        $updatePhotoType = $permission(PermissionEnum::UPDATE_PHOTO_TYPE);
        $deletePhotoType = $permission(PermissionEnum::DELETE_PHOTO_TYPE);

        $createQrCode = $permission(PermissionEnum::CREATE_QR_CODE);
        $viewQrCode = $permission(PermissionEnum::VIEW_QR_CODE);
        $updateQrCode = $permission(PermissionEnum::UPDATE_QR_CODE);
        $deleteQrCode = $permission(PermissionEnum::DELETE_QR_CODE);

        $createUserAction = $permission(PermissionEnum::CREATE_USER_ACTION);
        $viewUserAction = $permission(PermissionEnum::VIEW_USER_ACTION);
        $updateUserAction = $permission(PermissionEnum::UPDATE_USER_ACTION);
        $deleteUserAction = $permission(PermissionEnum::DELETE_USER_ACTION);

        $createUserActionType = $permission(PermissionEnum::CREATE_USER_ACTION_TYPE);
        $viewUserActionType = $permission(PermissionEnum::VIEW_USER_ACTION_TYPE);
        $updateUserActionType = $permission(PermissionEnum::UPDATE_USER_ACTION_TYPE);
        $deleteUserActionType = $permission(PermissionEnum::DELETE_USER_ACTION_TYPE);

        $createUserActionType = $permission(PermissionEnum::CREATE_USER_ACTION_TYPE);
        $viewUserActionType = $permission(PermissionEnum::VIEW_USER_ACTION_TYPE);
        $updateUserActionType = $permission(PermissionEnum::UPDATE_USER_ACTION_TYPE);
        $deleteUserActionType = $permission(PermissionEnum::DELETE_USER_ACTION_TYPE);

        $createDocumentTransmitted = $permission(PermissionEnum::CREATE_DOCUMENT_TRANSMITTED);
        $viewDocumentTransmitted = $permission(PermissionEnum::VIEW_DOCUMENT_TRANSMITTED);
        $updateDocumentTransmitted = $permission(PermissionEnum::UPDATE_DOCUMENT_TRANSMITTED);
        $deleteDocumentTransmitted = $permission(PermissionEnum::DELETE_DOCUMENT_TRANSMITTED);

        $createAssignmentDocument = $permission(PermissionEnum::CREATE_ASSIGNMENT_DOCUMENT);
        $viewAssignmentDocument = $permission(PermissionEnum::VIEW_ASSIGNMENT_DOCUMENT);
        $updateAssignmentDocument = $permission(PermissionEnum::UPDATE_ASSIGNMENT_DOCUMENT);
        $deleteAssignmentDocument = $permission(PermissionEnum::DELETE_ASSIGNMENT_DOCUMENT);

        $createStatus = $permission(PermissionEnum::CREATE_STATUS);
        $viewStatus = $permission(PermissionEnum::VIEW_STATUS);
        $updateStatus = $permission(PermissionEnum::UPDATE_STATUS);
        $deleteStatus = $permission(PermissionEnum::DELETE_STATUS);

        $createRole = $permission(PermissionEnum::CREATE_ROLE);
        $viewRole = $permission(PermissionEnum::VIEW_ROLE);
        $updateRole = $permission(PermissionEnum::UPDATE_ROLE);
        $deleteRole = $permission(PermissionEnum::DELETE_ROLE);

        $createPermission = $permission(PermissionEnum::CREATE_PERMISSION);
        $viewPermission = $permission(PermissionEnum::VIEW_PERMISSION);
        $updatePermission = $permission(PermissionEnum::UPDATE_PERMISSION);
        $deletePermission = $permission(PermissionEnum::DELETE_PERMISSION);

        $createEntity = $permission(PermissionEnum::CREATE_ENTITY);
        $viewEntity = $permission(PermissionEnum::VIEW_ENTITY);
        $updateEntity = $permission(PermissionEnum::UPDATE_ENTITY);
        $deleteEntity = $permission(PermissionEnum::DELETE_ENTITY);

        $createEntityType = $permission(PermissionEnum::CREATE_ENTITY_TYPE);
        $viewEntityType = $permission(PermissionEnum::VIEW_ENTITY_TYPE);
        $updateEntityType = $permission(PermissionEnum::UPDATE_ENTITY_TYPE);
        $deleteEntityType = $permission(PermissionEnum::DELETE_ENTITY_TYPE);

        $createVehicle = $permission(PermissionEnum::CREATE_VEHICLE);
        $viewVehicle = $permission(PermissionEnum::VIEW_VEHICLE);
        $updateVehicle = $permission(PermissionEnum::UPDATE_VEHICLE);
        $deleteVehicle = $permission(PermissionEnum::DELETE_VEHICLE);

        $createVehicleModel = $permission(PermissionEnum::CREATE_VEHICLE_MODEL);
        $viewVehicleModel = $permission(PermissionEnum::VIEW_VEHICLE_MODEL);
        $updateVehicleModel = $permission(PermissionEnum::UPDATE_VEHICLE_MODEL);
        $deleteVehicleModel = $permission(PermissionEnum::DELETE_VEHICLE_MODEL);

        $createVehicleState = $permission(PermissionEnum::CREATE_VEHICLE_STATE);
        $viewVehicleState = $permission(PermissionEnum::VIEW_VEHICLE_STATE);
        $updateVehicleState = $permission(PermissionEnum::UPDATE_VEHICLE_STATE);
        $deleteVehicleState = $permission(PermissionEnum::DELETE_VEHICLE_STATE);

        $createAscertainment = $permission(PermissionEnum::CREATE_ASCERTAINMENT);
        $viewAscertainment = $permission(PermissionEnum::VIEW_ASCERTAINMENT);
        $updateAscertainment = $permission(PermissionEnum::UPDATE_ASCERTAINMENT);
        $deleteAscertainment = $permission(PermissionEnum::DELETE_ASCERTAINMENT);

        $createAscertainmentType = $permission(PermissionEnum::CREATE_ASCERTAINMENT_TYPE);
        $viewAscertainmentType = $permission(PermissionEnum::VIEW_ASCERTAINMENT_TYPE);
        $updateAscertainmentType = $permission(PermissionEnum::UPDATE_ASCERTAINMENT_TYPE);
        $deleteAscertainmentType = $permission(PermissionEnum::DELETE_ASCERTAINMENT_TYPE);

        $createInsurerRelationship = $permission(PermissionEnum::CREATE_INSURER_RELATIONSHIP);
        $viewInsurerRelationship = $permission(PermissionEnum::VIEW_INSURER_RELATIONSHIP);
        $updateInsurerRelationship = $permission(PermissionEnum::UPDATE_INSURER_RELATIONSHIP);
        $deleteInsurerRelationship = $permission(PermissionEnum::DELETE_INSURER_RELATIONSHIP);

        $createRepairerRelationship = $permission(PermissionEnum::CREATE_REPAIRER_RELATIONSHIP);
        $viewRepairerRelationship = $permission(PermissionEnum::VIEW_REPAIRER_RELATIONSHIP);
        $updateRepairerRelationship = $permission(PermissionEnum::UPDATE_REPAIRER_RELATIONSHIP);
        $deleteRepairerRelationship = $permission(PermissionEnum::DELETE_REPAIRER_RELATIONSHIP);

        $createAssignmentMessage = $permission(PermissionEnum::CREATE_ASSIGNMENT_MESSAGE);
        $viewAssignmentMessage = $permission(PermissionEnum::VIEW_ASSIGNMENT_MESSAGE);
        $updateAssignmentMessage = $permission(PermissionEnum::UPDATE_ASSIGNMENT_MESSAGE);
        $deleteAssignmentMessage = $permission(PermissionEnum::DELETE_ASSIGNMENT_MESSAGE);
        
        $createBodywork = $permission(PermissionEnum::CREATE_BODYWORK);
        $viewBodywork = $permission(PermissionEnum::VIEW_BODYWORK);
        $updateBodywork = $permission(PermissionEnum::UPDATE_BODYWORK);
        $deleteBodywork = $permission(PermissionEnum::DELETE_BODYWORK);

        $createVehicleGenre = $permission(PermissionEnum::CREATE_VEHICLE_GENRE);
        $viewVehicleGenre = $permission(PermissionEnum::VIEW_VEHICLE_GENRE);
        $updateVehicleGenre = $permission(PermissionEnum::UPDATE_VEHICLE_GENRE);
        $deleteVehicleGenre = $permission(PermissionEnum::DELETE_VEHICLE_GENRE);

        $createVehicleEnergy = $permission(PermissionEnum::CREATE_VEHICLE_ENERGY);
        $viewVehicleEnergy = $permission(PermissionEnum::VIEW_VEHICLE_ENERGY);
        $updateVehicleEnergy = $permission(PermissionEnum::UPDATE_VEHICLE_ENERGY);
        $deleteVehicleEnergy = $permission(PermissionEnum::DELETE_VEHICLE_ENERGY);

        $createVehicleAge = $permission(PermissionEnum::CREATE_VEHICLE_AGE);
        $viewVehicleAge = $permission(PermissionEnum::VIEW_VEHICLE_AGE);
        $updateVehicleAge = $permission(PermissionEnum::UPDATE_VEHICLE_AGE);
        $deleteVehicleAge = $permission(PermissionEnum::DELETE_VEHICLE_AGE);

        $createVehicleModel = $permission(PermissionEnum::CREATE_VEHICLE_MODEL);
        $viewVehicleModel = $permission(PermissionEnum::VIEW_VEHICLE_MODEL);
        $updateVehicleModel = $permission(PermissionEnum::UPDATE_VEHICLE_MODEL);
        $deleteVehicleModel = $permission(PermissionEnum::DELETE_VEHICLE_MODEL);

        $createVehicleState = $permission(PermissionEnum::CREATE_VEHICLE_STATE);
        $viewVehicleState = $permission(PermissionEnum::VIEW_VEHICLE_STATE);
        $updateVehicleState = $permission(PermissionEnum::UPDATE_VEHICLE_STATE);
        $deleteVehicleState = $permission(PermissionEnum::DELETE_VEHICLE_STATE);

        $createBrand = $permission(PermissionEnum::CREATE_BRAND);
        $viewBrand = $permission(PermissionEnum::VIEW_BRAND);
        $updateBrand = $permission(PermissionEnum::UPDATE_BRAND);
        $deleteBrand = $permission(PermissionEnum::DELETE_BRAND);

        $createColor = $permission(PermissionEnum::CREATE_COLOR);
        $viewColor = $permission(PermissionEnum::VIEW_COLOR);
        $updateColor = $permission(PermissionEnum::UPDATE_COLOR);
        $deleteColor = $permission(PermissionEnum::DELETE_COLOR);

        $createNumberPaintElement = $permission(PermissionEnum::CREATE_NUMBER_PAINT_ELEMENT);
        $viewNumberPaintElement = $permission(PermissionEnum::VIEW_NUMBER_PAINT_ELEMENT);
        $updateNumberPaintElement = $permission(PermissionEnum::UPDATE_NUMBER_PAINT_ELEMENT);
        $deleteNumberPaintElement = $permission(PermissionEnum::DELETE_NUMBER_PAINT_ELEMENT);

        $createPaintProductPrice = $permission(PermissionEnum::CREATE_PAINT_PRODUCT_PRICE);
        $viewPaintProductPrice = $permission(PermissionEnum::VIEW_PAINT_PRODUCT_PRICE);
        $updatePaintProductPrice = $permission(PermissionEnum::UPDATE_PAINT_PRODUCT_PRICE);
        $deletePaintProductPrice = $permission(PermissionEnum::DELETE_PAINT_PRODUCT_PRICE);

        $createOtherCost = $permission(PermissionEnum::CREATE_OTHER_COST);
        $viewOtherCost = $permission(PermissionEnum::VIEW_OTHER_COST);
        $updateOtherCost = $permission(PermissionEnum::UPDATE_OTHER_COST);
        $deleteOtherCost = $permission(PermissionEnum::DELETE_OTHER_COST);

        $createOtherCostType = $permission(PermissionEnum::CREATE_OTHER_COST_TYPE);
        $viewOtherCostType = $permission(PermissionEnum::VIEW_OTHER_COST_TYPE);
        $updateOtherCostType = $permission(PermissionEnum::UPDATE_OTHER_COST_TYPE);
        $deleteOtherCostType = $permission(PermissionEnum::DELETE_OTHER_COST_TYPE);

        $createPaintType = $permission(PermissionEnum::CREATE_PAINT_TYPE);
        $viewPaintType = $permission(PermissionEnum::VIEW_PAINT_TYPE);
        $updatePaintType = $permission(PermissionEnum::UPDATE_PAINT_TYPE);
        $deletePaintType = $permission(PermissionEnum::DELETE_PAINT_TYPE);

        $createPaintingPrice = $permission(PermissionEnum::CREATE_PAINTING_PRICE);
        $viewPaintingPrice = $permission(PermissionEnum::VIEW_PAINTING_PRICE);
        $updatePaintingPrice = $permission(PermissionEnum::UPDATE_PAINTING_PRICE);
        $deletePaintingPrice = $permission(PermissionEnum::DELETE_PAINTING_PRICE);

        $createReceiptType = $permission(PermissionEnum::CREATE_RECEIPT_TYPE);
        $viewReceiptType = $permission(PermissionEnum::VIEW_RECEIPT_TYPE);
        $updateReceiptType = $permission(PermissionEnum::UPDATE_RECEIPT_TYPE);
        $deleteReceiptType = $permission(PermissionEnum::DELETE_RECEIPT_TYPE);

        $createSupply = $permission(PermissionEnum::CREATE_SUPPLY);
        $viewSupply = $permission(PermissionEnum::VIEW_SUPPLY);
        $updateSupply = $permission(PermissionEnum::UPDATE_SUPPLY);
        $deleteSupply = $permission(PermissionEnum::DELETE_SUPPLY);

        $createDepreciationTable = $permission(PermissionEnum::CREATE_DEPRECIATION_TABLE);
        $viewDepreciationTable = $permission(PermissionEnum::VIEW_DEPRECIATION_TABLE);
        $updateDepreciationTable = $permission(PermissionEnum::UPDATE_DEPRECIATION_TABLE);
        $deleteDepreciationTable = $permission(PermissionEnum::DELETE_DEPRECIATION_TABLE);

        $createHourlyRate = $permission(PermissionEnum::CREATE_HOURLY_RATE);
        $viewHourlyRate = $permission(PermissionEnum::VIEW_HOURLY_RATE);
        $updateHourlyRate = $permission(PermissionEnum::UPDATE_HOURLY_RATE);
        $deleteHourlyRate = $permission(PermissionEnum::DELETE_HOURLY_RATE);

        $createWorkFee = $permission(PermissionEnum::CREATE_WORK_FEE);
        $viewWorkFee = $permission(PermissionEnum::VIEW_WORK_FEE);
        $updateWorkFee = $permission(PermissionEnum::UPDATE_WORK_FEE);
        $deleteWorkFee = $permission(PermissionEnum::DELETE_WORK_FEE);

        $createReceipt = $permission(PermissionEnum::CREATE_RECEIPT);
        $viewReceipt = $permission(PermissionEnum::VIEW_RECEIPT);
        $updateReceipt = $permission(PermissionEnum::UPDATE_RECEIPT);
        $deleteReceipt = $permission(PermissionEnum::DELETE_RECEIPT);

        $createTechnicalConclusion = $permission(PermissionEnum::CREATE_TECHNICAL_CONCLUSION);
        $viewTechnicalConclusion = $permission(PermissionEnum::VIEW_TECHNICAL_CONCLUSION);
        $updateTechnicalConclusion = $permission(PermissionEnum::UPDATE_TECHNICAL_CONCLUSION);
        $deleteTechnicalConclusion = $permission(PermissionEnum::DELETE_TECHNICAL_CONCLUSION);

        $createClaimNature = $permission(PermissionEnum::CREATE_CLAIM_NATURE);
        $viewClaimNature = $permission(PermissionEnum::VIEW_CLAIM_NATURE);
        $updateClaimNature = $permission(PermissionEnum::UPDATE_CLAIM_NATURE);
        $deleteClaimNature = $permission(PermissionEnum::DELETE_CLAIM_NATURE);

        $createGeneralState = $permission(PermissionEnum::CREATE_GENERAL_STATE);
        $viewGeneralState = $permission(PermissionEnum::VIEW_GENERAL_STATE);
        $updateGeneralState = $permission(PermissionEnum::UPDATE_GENERAL_STATE);
        $deleteGeneralState = $permission(PermissionEnum::DELETE_GENERAL_STATE);

        $createTechnicalConclusion = $permission(PermissionEnum::CREATE_TECHNICAL_CONCLUSION);
        $viewTechnicalConclusion = $permission(PermissionEnum::VIEW_TECHNICAL_CONCLUSION);
        $updateTechnicalConclusion = $permission(PermissionEnum::UPDATE_TECHNICAL_CONCLUSION);
        $deleteTechnicalConclusion = $permission(PermissionEnum::DELETE_TECHNICAL_CONCLUSION);

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
            $dashboard,
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
            $createWorksheetAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,
            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT_ADMIN,
            'label' => 'Administrateur de cabinet d\'expertise',
            'description' => 'Chargé de la gestion de la plateforme d\'un cabinet d\'expertise.',
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
            $viewAssignment,
            $createWorksheetAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $generateAssignment,
            $assignmentStatistics,
            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,
            $viewPayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,
            $dashboard,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $createWorksheetAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $createWorksheetAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $validateAssignment,
            $closeAssignment,
            $generateAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT,
            'label' => 'Expert',
            'description' => "Expert.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $updateUser,
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
            $createAssignment,
            $createWorksheetAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $realizeAssignment,
            $closeAssignment,
            $assignmentStatistics,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EDITOR_MANAGER,
            'label' => 'Responsable rédaction',
            'description' => "Responsable rédaction.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            $createUser,
            $updateUser,
            $enableUser,
            $disableUser,
            $resetUser,
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $deleteAssignment,
            $realizeAssignment,
            $editAssignment,
            $generateAssignment,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
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
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
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
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
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
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
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
            'name' => \App\Enums\RoleEnum::CLIENT,
            'label' => 'Client',
            'description' => "Client.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createAssignment,
            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,
            $viewUser,
            $createAssignment,
            $viewAssignment,
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
