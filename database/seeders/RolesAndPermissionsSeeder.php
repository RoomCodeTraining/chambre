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

        $createAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $viewAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $updateAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $deleteAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $acceptAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::ACCEPT_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $rejectAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::REJECT_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);
        $cancelAssignmentRequest = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_ASSIGNMENT_REQUEST, 'guard_name' => 'sanctum']);

        $createAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $viewAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $updateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $realizeAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::REALIZE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $updateRealizedAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_REALIZED_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $createQuoteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_QUOTE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateQuoteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_QUOTE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $unvalidateQuoteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UNVALIDATE_QUOTE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateQuoteWithConditionAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_QUOTE_WITH_CONDITION_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $createWorksheetAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_WORKSHEET_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateWorkSheetByExpertAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_WORK_SHEET_BY_EXPERT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $unvalidateWorkSheetByExpertAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UNVALIDATE_WORK_SHEET_BY_EXPERT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $editAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::EDIT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $updateEditedAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_EDITED_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $unvalidateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UNVALIDATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateByRepairerAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_BY_REPAIRER_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $unvalidateByRepairerAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UNVALIDATE_BY_REPAIRER_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $validateByExpertAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::VALIDATE_BY_EXPERT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $unvalidateByExpertAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::UNVALIDATE_BY_EXPERT_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $closeAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CLOSE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $cancelAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $generateAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::GENERATE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $assignmentStatistics = Permission::create(['name' => \App\Enums\PermissionEnum::ASSIGNMENT_STATISTICS, 'guard_name' => 'sanctum']);
        $cancelQuoteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::CANCEL_QUOTE_ASSIGNMENT, 'guard_name' => 'sanctum']);
        $deleteAssignment = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT, 'guard_name' => 'sanctum']);

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

        $createShock = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_SHOCK, 'guard_name' => 'sanctum']);
        $viewShock = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_SHOCK, 'guard_name' => 'sanctum']);
        $updateShock = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_SHOCK, 'guard_name' => 'sanctum']);
        $deleteShock = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_SHOCK, 'guard_name' => 'sanctum']);

        $createShockWork = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_SHOCK_WORK, 'guard_name' => 'sanctum']);
        $viewShockWork = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_SHOCK_WORK, 'guard_name' => 'sanctum']);
        $updateShockWork = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_SHOCK_WORK, 'guard_name' => 'sanctum']);
        $deleteShockWork = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_SHOCK_WORK, 'guard_name' => 'sanctum']);

        $createShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_SHOCK_POINT, 'guard_name' => 'sanctum']);
        $viewShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_SHOCK_POINT, 'guard_name' => 'sanctum']);
        $updateShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_SHOCK_POINT, 'guard_name' => 'sanctum']);
        $deleteShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_SHOCK_POINT, 'guard_name' => 'sanctum']);
        $enableShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_SHOCK_POINT, 'guard_name' => 'sanctum']);
        $disableShockPoint = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_SHOCK_POINT, 'guard_name' => 'sanctum']);

        $createWorkforce = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_WORKFORCE, 'guard_name' => 'sanctum']);
        $viewWorkforce = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_WORKFORCE, 'guard_name' => 'sanctum']);
        $updateWorkforce = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_WORKFORCE, 'guard_name' => 'sanctum']);
        $deleteWorkforce = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_WORKFORCE, 'guard_name' => 'sanctum']);

        $createWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);
        $viewWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);
        $updateWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);
        $deleteWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);
        $enableWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);
        $disableWorkforceType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_WORKFORCE_TYPE, 'guard_name' => 'sanctum']);

        $createAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);
        $viewAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);
        $updateAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);
        $deleteAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);
        $enableAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);
        $disableAssignmentType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_ASSIGNMENT_TYPE, 'guard_name' => 'sanctum']);

        $createExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);
        $viewExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);
        $updateExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);
        $deleteExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);
        $enableExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);
        $disableExpertiseType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_EXPERTISE_TYPE, 'guard_name' => 'sanctum']);

        $createGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_GENERAL_STATE, 'guard_name' => 'sanctum']);
        $viewGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_GENERAL_STATE, 'guard_name' => 'sanctum']);
        $updateGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_GENERAL_STATE, 'guard_name' => 'sanctum']);
        $deleteGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_GENERAL_STATE, 'guard_name' => 'sanctum']);
        $enableGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_GENERAL_STATE, 'guard_name' => 'sanctum']);
        $disableGeneralState = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_GENERAL_STATE, 'guard_name' => 'sanctum']);

        $createClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_CLAIM_NATURE, 'guard_name' => 'sanctum']);
        $viewClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_CLAIM_NATURE, 'guard_name' => 'sanctum']);
        $updateClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_CLAIM_NATURE, 'guard_name' => 'sanctum']);
        $deleteClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_CLAIM_NATURE, 'guard_name' => 'sanctum']);
        $enableClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_CLAIM_NATURE, 'guard_name' => 'sanctum']);
        $disableClaimNature = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_CLAIM_NATURE, 'guard_name' => 'sanctum']);

        $createTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);
        $viewTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);
        $updateTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);
        $deleteTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);
        $enableTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);
        $disableTechnicalConclusion = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_TECHNICAL_CONCLUSION, 'guard_name' => 'sanctum']);

        $createDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);
        $viewDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);
        $updateDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);
        $deleteDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);
        $enableDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);
        $disableDocumentTransmitted = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_DOCUMENT_TRANSMITTED, 'guard_name' => 'sanctum']);

        $createAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);
        $viewAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);
        $updateAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);
        $deleteAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);
        $enableAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);
        $disableAssignmentDocument = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_ASSIGNMENT_DOCUMENT, 'guard_name' => 'sanctum']);

        $createStatus = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_STATUS, 'guard_name' => 'sanctum']);
        $viewStatus = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_STATUS, 'guard_name' => 'sanctum']);
        $updateStatus = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_STATUS, 'guard_name' => 'sanctum']);
        $deleteStatus = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_STATUS, 'guard_name' => 'sanctum']);
        $enableStatus = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_STATUS, 'guard_name' => 'sanctum']);
        $disableStatus = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_STATUS, 'guard_name' => 'sanctum']);

        $createRole = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ROLE, 'guard_name' => 'sanctum']);
        $viewRole = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ROLE, 'guard_name' => 'sanctum']);
        $updateRole = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ROLE, 'guard_name' => 'sanctum']);
        $deleteRole = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ROLE, 'guard_name' => 'sanctum']);

        $createPermission = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PERMISSION, 'guard_name' => 'sanctum']);
        $viewPermission = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PERMISSION, 'guard_name' => 'sanctum']);
        $updatePermission = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PERMISSION, 'guard_name' => 'sanctum']);
        $deletePermission = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PERMISSION, 'guard_name' => 'sanctum']);

        $createEntity = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ENTITY, 'guard_name' => 'sanctum']);
        $viewEntity = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ENTITY, 'guard_name' => 'sanctum']);
        $updateEntity = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ENTITY, 'guard_name' => 'sanctum']);
        $deleteEntity = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ENTITY, 'guard_name' => 'sanctum']);
        $enableEntity = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_ENTITY, 'guard_name' => 'sanctum']);
        $disableEntity = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_ENTITY, 'guard_name' => 'sanctum']);

        $createEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ENTITY_TYPE, 'guard_name' => 'sanctum']);
        $viewEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ENTITY_TYPE, 'guard_name' => 'sanctum']);
        $updateEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ENTITY_TYPE, 'guard_name' => 'sanctum']);
        $deleteEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ENTITY_TYPE, 'guard_name' => 'sanctum']);
        $enableEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_ENTITY_TYPE, 'guard_name' => 'sanctum']);
        $disableEntityType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_ENTITY_TYPE, 'guard_name' => 'sanctum']);

        $createVehicle = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE, 'guard_name' => 'sanctum']);
        $viewVehicle = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE, 'guard_name' => 'sanctum']);
        $updateVehicle = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE, 'guard_name' => 'sanctum']);
        $deleteVehicle = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE, 'guard_name' => 'sanctum']);

        $createVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE_MODEL, 'guard_name' => 'sanctum']);
        $viewVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE_MODEL, 'guard_name' => 'sanctum']);
        $updateVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE_MODEL, 'guard_name' => 'sanctum']);
        $deleteVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE_MODEL, 'guard_name' => 'sanctum']);
        $enableVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_VEHICLE_MODEL, 'guard_name' => 'sanctum']);
        $disableVehicleModel = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_VEHICLE_MODEL, 'guard_name' => 'sanctum']);

        $createVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE_STATE, 'guard_name' => 'sanctum']);
        $viewVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE_STATE, 'guard_name' => 'sanctum']);
        $updateVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE_STATE, 'guard_name' => 'sanctum']);
        $deleteVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE_STATE, 'guard_name' => 'sanctum']);
        $enableVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_VEHICLE_STATE, 'guard_name' => 'sanctum']);
        $disableVehicleState = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_VEHICLE_STATE, 'guard_name' => 'sanctum']);

        $createBrand = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_BRAND, 'guard_name' => 'sanctum']);
        $viewBrand = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_BRAND, 'guard_name' => 'sanctum']);
        $updateBrand = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_BRAND, 'guard_name' => 'sanctum']);
        $deleteBrand = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_BRAND, 'guard_name' => 'sanctum']);
        $enableBrand = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_BRAND, 'guard_name' => 'sanctum']);
        $disableBrand = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_BRAND, 'guard_name' => 'sanctum']);

        $createColor = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_COLOR, 'guard_name' => 'sanctum']);
        $viewColor = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_COLOR, 'guard_name' => 'sanctum']);
        $updateColor = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_COLOR, 'guard_name' => 'sanctum']);
        $deleteColor = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_COLOR, 'guard_name' => 'sanctum']);
        $enableColor = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_COLOR, 'guard_name' => 'sanctum']);
        $disableColor = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_COLOR, 'guard_name' => 'sanctum']);

        $createNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);
        $viewNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);
        $updateNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);
        $deleteNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);
        $enableNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);
        $disableNumberPaintElement = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_NUMBER_PAINT_ELEMENT, 'guard_name' => 'sanctum']);

        $createPaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);
        $viewPaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);
        $updatePaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);
        $deletePaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);
        $enablePaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);
        $disablePaintProductPrice = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PAINT_PRODUCT_PRICE, 'guard_name' => 'sanctum']);

        $createOtherCost = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_OTHER_COST, 'guard_name' => 'sanctum']);
        $viewOtherCost = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_OTHER_COST, 'guard_name' => 'sanctum']);
        $updateOtherCost = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_OTHER_COST, 'guard_name' => 'sanctum']);
        $deleteOtherCost = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_OTHER_COST, 'guard_name' => 'sanctum']);

        $createOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);
        $viewOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);
        $updateOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);
        $deleteOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);
        $enableOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);
        $disableOtherCostType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_OTHER_COST_TYPE, 'guard_name' => 'sanctum']);

        $createPaintType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAINT_TYPE, 'guard_name' => 'sanctum']);
        $viewPaintType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAINT_TYPE, 'guard_name' => 'sanctum']);
        $updatePaintType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAINT_TYPE, 'guard_name' => 'sanctum']);
        $deletePaintType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAINT_TYPE, 'guard_name' => 'sanctum']);
        $enablePaintType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PAINT_TYPE, 'guard_name' => 'sanctum']);
        $disablePaintType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PAINT_TYPE, 'guard_name' => 'sanctum']);

        $createPaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAINTING_PRICE, 'guard_name' => 'sanctum']);
        $viewPaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAINTING_PRICE, 'guard_name' => 'sanctum']);
        $updatePaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAINTING_PRICE, 'guard_name' => 'sanctum']);
        $deletePaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAINTING_PRICE, 'guard_name' => 'sanctum']);
        $enablePaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PAINTING_PRICE, 'guard_name' => 'sanctum']);
        $disablePaintingPrice = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PAINTING_PRICE, 'guard_name' => 'sanctum']);

        $createHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_HOURLY_RATE, 'guard_name' => 'sanctum']);
        $viewHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_HOURLY_RATE, 'guard_name' => 'sanctum']);
        $updateHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_HOURLY_RATE, 'guard_name' => 'sanctum']);
        $deleteHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_HOURLY_RATE, 'guard_name' => 'sanctum']);
        $enableHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_HOURLY_RATE, 'guard_name' => 'sanctum']);
        $disableHourlyRate = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_HOURLY_RATE, 'guard_name' => 'sanctum']);

        $createWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_WORK_FEE, 'guard_name' => 'sanctum']);
        $viewWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_WORK_FEE, 'guard_name' => 'sanctum']);
        $updateWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_WORK_FEE, 'guard_name' => 'sanctum']);
        $deleteWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_WORK_FEE, 'guard_name' => 'sanctum']);
        $enableWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_WORK_FEE, 'guard_name' => 'sanctum']);
        $disableWorkFee = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_WORK_FEE, 'guard_name' => 'sanctum']);

        $createReceipt = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_RECEIPT, 'guard_name' => 'sanctum']);
        $viewReceipt = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_RECEIPT, 'guard_name' => 'sanctum']);
        $updateReceipt = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_RECEIPT, 'guard_name' => 'sanctum']);
        $deleteReceipt = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_RECEIPT, 'guard_name' => 'sanctum']);

        $createReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_RECEIPT_TYPE, 'guard_name' => 'sanctum']);
        $viewReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_RECEIPT_TYPE, 'guard_name' => 'sanctum']);
        $updateReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_RECEIPT_TYPE, 'guard_name' => 'sanctum']);
        $deleteReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_RECEIPT_TYPE, 'guard_name' => 'sanctum']);
        $enableReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_RECEIPT_TYPE, 'guard_name' => 'sanctum']);
        $disableReceiptType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_RECEIPT_TYPE, 'guard_name' => 'sanctum']);

        $createSupply = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_SUPPLY, 'guard_name' => 'sanctum']);
        $viewSupply = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_SUPPLY, 'guard_name' => 'sanctum']);
        $updateSupply = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_SUPPLY, 'guard_name' => 'sanctum']);
        $deleteSupply = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_SUPPLY, 'guard_name' => 'sanctum']);
        $enableSupply = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_SUPPLY, 'guard_name' => 'sanctum']);
        $disableSupply = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_SUPPLY, 'guard_name' => 'sanctum']);

        $createDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);
        $viewDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);
        $updateDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);
        $deleteDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);
        $enableDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);
        $disableDepreciationTable = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_DEPRECIATION_TABLE, 'guard_name' => 'sanctum']);

        $createVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE_AGE, 'guard_name' => 'sanctum']);
        $viewVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE_AGE, 'guard_name' => 'sanctum']);
        $updateVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE_AGE, 'guard_name' => 'sanctum']);
        $deleteVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE_AGE, 'guard_name' => 'sanctum']);
        $enableVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_VEHICLE_AGE, 'guard_name' => 'sanctum']);
        $disableVehicleAge = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_VEHICLE_AGE, 'guard_name' => 'sanctum']);

        $createVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);
        $viewVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);
        $updateVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);
        $deleteVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);
        $enableVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);
        $disableVehicleEnergy = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_VEHICLE_ENERGY, 'guard_name' => 'sanctum']);

        $createVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_VEHICLE_GENRE, 'guard_name' => 'sanctum']);
        $viewVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_VEHICLE_GENRE, 'guard_name' => 'sanctum']);
        $updateVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_VEHICLE_GENRE, 'guard_name' => 'sanctum']);
        $deleteVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_VEHICLE_GENRE, 'guard_name' => 'sanctum']);
        $enableVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_VEHICLE_GENRE, 'guard_name' => 'sanctum']);
        $disableVehicleGenre = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_VEHICLE_GENRE, 'guard_name' => 'sanctum']);

        $createBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_BODYWORK, 'guard_name' => 'sanctum']);
        $viewBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_BODYWORK, 'guard_name' => 'sanctum']);
        $updateBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_BODYWORK, 'guard_name' => 'sanctum']);
        $deleteBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_BODYWORK, 'guard_name' => 'sanctum']);
        $enableBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_BODYWORK, 'guard_name' => 'sanctum']);
        $disableBodywork = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_BODYWORK, 'guard_name' => 'sanctum']);

        $createAscertainment = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASCERTAINMENT, 'guard_name' => 'sanctum']);
        $viewAscertainment = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASCERTAINMENT, 'guard_name' => 'sanctum']);
        $updateAscertainment = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASCERTAINMENT, 'guard_name' => 'sanctum']);
        $deleteAscertainment = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASCERTAINMENT, 'guard_name' => 'sanctum']);

        $createAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);
        $viewAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);
        $updateAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);
        $deleteAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);
        $enableAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);
        $disableAscertainmentType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_ASCERTAINMENT_TYPE, 'guard_name' => 'sanctum']);

        $createInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $viewInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $updateInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $deleteInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $enableInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $disableInsurerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_INSURER_RELATIONSHIP, 'guard_name' => 'sanctum']);

        $createRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $viewRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $updateRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $deleteRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $enableRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);
        $disableRepairerRelationship = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_REPAIRER_RELATIONSHIP, 'guard_name' => 'sanctum']);

        $createAssignmentMessage = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_ASSIGNMENT_MESSAGE, 'guard_name' => 'sanctum']);
        $viewAssignmentMessage = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_ASSIGNMENT_MESSAGE, 'guard_name' => 'sanctum']);
        $updateAssignmentMessage = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_ASSIGNMENT_MESSAGE, 'guard_name' => 'sanctum']);
        $deleteAssignmentMessage = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_ASSIGNMENT_MESSAGE, 'guard_name' => 'sanctum']);

        $createCheck = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_CHECK, 'guard_name' => 'sanctum']);
        $viewCheck = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_CHECK, 'guard_name' => 'sanctum']);
        $updateCheck = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_CHECK, 'guard_name' => 'sanctum']);
        $deleteCheck = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_CHECK, 'guard_name' => 'sanctum']);

        $createBank = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_BANK, 'guard_name' => 'sanctum']);
        $viewBank = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_BANK, 'guard_name' => 'sanctum']);
        $updateBank = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_BANK, 'guard_name' => 'sanctum']);
        $deleteBank = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_BANK, 'guard_name' => 'sanctum']);
        $enableBank = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_BANK, 'guard_name' => 'sanctum']);
        $disableBank = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_BANK, 'guard_name' => 'sanctum']);

        $createPaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAYMENT_TYPE, 'guard_name' => 'sanctum']);
        $viewPaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAYMENT_TYPE, 'guard_name' => 'sanctum']);
        $updatePaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAYMENT_TYPE, 'guard_name' => 'sanctum']);
        $deletePaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAYMENT_TYPE, 'guard_name' => 'sanctum']);
        $enablePaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PAYMENT_TYPE, 'guard_name' => 'sanctum']);
        $disablePaymentType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PAYMENT_TYPE, 'guard_name' => 'sanctum']);

        $createPaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PAYMENT_METHOD, 'guard_name' => 'sanctum']);
        $viewPaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PAYMENT_METHOD, 'guard_name' => 'sanctum']);
        $updatePaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PAYMENT_METHOD, 'guard_name' => 'sanctum']);
        $deletePaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PAYMENT_METHOD, 'guard_name' => 'sanctum']);
        $enablePaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PAYMENT_METHOD, 'guard_name' => 'sanctum']);
        $disablePaymentMethod = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PAYMENT_METHOD, 'guard_name' => 'sanctum']);

        $createClient = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_CLIENT, 'guard_name' => 'sanctum']);
        $viewClient = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_CLIENT, 'guard_name' => 'sanctum']);
        $updateClient = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_CLIENT, 'guard_name' => 'sanctum']);
        $deleteClient = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_CLIENT, 'guard_name' => 'sanctum']);
        $enableClient = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_CLIENT, 'guard_name' => 'sanctum']);
        $disableClient = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_CLIENT, 'guard_name' => 'sanctum']);

        $createPhoto = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PHOTO, 'guard_name' => 'sanctum']);
        $viewPhoto = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PHOTO, 'guard_name' => 'sanctum']);
        $updatePhoto = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PHOTO, 'guard_name' => 'sanctum']);
        $deletePhoto = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PHOTO, 'guard_name' => 'sanctum']);

        $createPhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_PHOTO_TYPE, 'guard_name' => 'sanctum']);
        $viewPhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_PHOTO_TYPE, 'guard_name' => 'sanctum']);
        $updatePhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_PHOTO_TYPE, 'guard_name' => 'sanctum']);
        $deletePhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_PHOTO_TYPE, 'guard_name' => 'sanctum']);
        $enablePhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_PHOTO_TYPE, 'guard_name' => 'sanctum']);
        $disablePhotoType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_PHOTO_TYPE, 'guard_name' => 'sanctum']);

        $createQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_QR_CODE, 'guard_name' => 'sanctum']);
        $viewQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_QR_CODE, 'guard_name' => 'sanctum']);
        $updateQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_QR_CODE, 'guard_name' => 'sanctum']);
        $deleteQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_QR_CODE, 'guard_name' => 'sanctum']);
        $enableQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_QR_CODE, 'guard_name' => 'sanctum']);
        $disableQrCode = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_QR_CODE, 'guard_name' => 'sanctum']);

        $createUserAction = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_USER_ACTION, 'guard_name' => 'sanctum']);
        $viewUserAction = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_USER_ACTION, 'guard_name' => 'sanctum']);
        $updateUserAction = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_USER_ACTION, 'guard_name' => 'sanctum']);
        $deleteUserAction = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_USER_ACTION, 'guard_name' => 'sanctum']);

        $createUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);
        $viewUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);
        $updateUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);
        $deleteUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);
        $enableUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);
        $disableUserActionType = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_USER_ACTION_TYPE, 'guard_name' => 'sanctum']);

        $createRemark = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_REMARK, 'guard_name' => 'sanctum']);
        $viewRemark = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_REMARK, 'guard_name' => 'sanctum']);
        $updateRemark = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_REMARK, 'guard_name' => 'sanctum']);
        $deleteRemark = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_REMARK, 'guard_name' => 'sanctum']);
        $enableRemark = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_REMARK, 'guard_name' => 'sanctum']);
        $disableRemark = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_REMARK, 'guard_name' => 'sanctum']);

        $createGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $viewGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $updateGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $deleteGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $enableGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $disableGeneralStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_GENERAL_STATUS_DEADLINE, 'guard_name' => 'sanctum']);

        $createStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $viewStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $updateStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $deleteStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $enableStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_STATUS_DEADLINE, 'guard_name' => 'sanctum']);
        $disableStatusDeadline = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_STATUS_DEADLINE, 'guard_name' => 'sanctum']);

        $createFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::CREATE_FNE_SETTING, 'guard_name' => 'sanctum']);
        $viewFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::VIEW_FNE_SETTING, 'guard_name' => 'sanctum']);
        $updateFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::UPDATE_FNE_SETTING, 'guard_name' => 'sanctum']);
        $deleteFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::DELETE_FNE_SETTING, 'guard_name' => 'sanctum']);
        $enableFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::ENABLE_FNE_SETTING, 'guard_name' => 'sanctum']);
        $disableFneSetting = Permission::create(['name' => \App\Enums\PermissionEnum::DISABLE_FNE_SETTING, 'guard_name' => 'sanctum']);

        $dashboard = Permission::create(['name' => \App\Enums\PermissionEnum::DASHBOARD, 'guard_name' => 'sanctum']);

        Role::create([
            'name' => \App\Enums\RoleEnum::SYSTEM_ADMIN,
            'label' => 'Administrateur système',
            'description' => "Chargé de l'administration et de la configuration de la plateforme.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,
            $generateAssignment,
            $assignmentStatistics,

            $viewAssignment,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $viewShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $viewWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $viewReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $viewOtherCost,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $createGeneralStatusDeadline,
            $viewGeneralStatusDeadline,
            $updateGeneralStatusDeadline,
            $deleteGeneralStatusDeadline,
            $enableGeneralStatusDeadline,
            $disableGeneralStatusDeadline,

            $createStatusDeadline,
            $viewStatusDeadline,
            $updateStatusDeadline,
            $deleteStatusDeadline,
            $enableStatusDeadline,
            $disableStatusDeadline,

            $createFneSetting,
            $viewFneSetting,
            $updateFneSetting,
            $deleteFneSetting,
            $enableFneSetting,
            $disableFneSetting,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::ADMIN,
            'label' => 'Administrateur plateforme',
            'description' => 'Chargé de la gestion de la plateforme.',
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $viewAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $viewShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $viewWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $viewReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $viewOtherCost,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $createGeneralStatusDeadline,
            $viewGeneralStatusDeadline,
            $updateGeneralStatusDeadline,
            $deleteGeneralStatusDeadline,
            $enableGeneralStatusDeadline,
            $disableGeneralStatusDeadline,

            $createStatusDeadline,
            $viewStatusDeadline,
            $updateStatusDeadline,
            $deleteStatusDeadline,
            $enableStatusDeadline,
            $disableStatusDeadline,

            $createFneSetting,
            $viewFneSetting,
            $updateFneSetting,
            $deleteFneSetting,
            $enableFneSetting,
            $disableFneSetting,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT_ADMIN,
            'label' => 'Administrateur de cabinet d\'expertise',
            'description' => 'Chargé de la gestion de la plateforme d\'un cabinet d\'expertise.',
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
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
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $unvalidateQuoteAssignment,
            $validateQuoteWithConditionAssignment,
            $createWorksheetAssignment,
            $validateWorkSheetByExpertAssignment,
            $unvalidateWorkSheetByExpertAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $updateEditedAssignment,
            $validateAssignment,
            $unvalidateAssignment,
            $validateByRepairerAssignment,
            $unvalidateByRepairerAssignment,
            $validateByExpertAssignment,
            $unvalidateByExpertAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,

            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $viewOtherCostType,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createStatusDeadline,
            $viewStatusDeadline,
            $updateStatusDeadline,
            $deleteStatusDeadline,
            $enableStatusDeadline,
            $disableStatusDeadline,

            $createFneSetting,
            $viewFneSetting,
            $updateFneSetting,
            $deleteFneSetting,
            $enableFneSetting,
            $disableFneSetting,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::CEO,
            'label' => 'Directeur général',
            'description' => "Chargé de la direction générale de l'entreprise.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
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
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $unvalidateQuoteAssignment,
            $validateQuoteWithConditionAssignment,
            $createWorksheetAssignment,
            $validateWorkSheetByExpertAssignment,
            $unvalidateWorkSheetByExpertAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $updateEditedAssignment,
            $validateAssignment,
            $unvalidateAssignment,
            $validateByRepairerAssignment,
            $unvalidateByRepairerAssignment,
            $validateByExpertAssignment,
            $unvalidateByExpertAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $createInvoice,
            $viewInvoice,
            $updateInvoice,
            $deleteInvoice,
            $cancelInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $viewBank,
            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $viewPaymentType,

            $viewPaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $viewPhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT_MANAGER,
            'label' => 'Responsable expert',
            'description' => "Responsable expert.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,

            $viewAssignmentRequest,
            $acceptAssignmentRequest,
            $rejectAssignmentRequest,

            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $unvalidateQuoteAssignment,
            $validateQuoteWithConditionAssignment,
            $createWorksheetAssignment,
            $validateWorkSheetByExpertAssignment,
            $unvalidateWorkSheetByExpertAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $updateEditedAssignment,
            $validateAssignment,
            $unvalidateAssignment,
            $validateByRepairerAssignment,
            $unvalidateByRepairerAssignment,
            $validateByExpertAssignment,
            $unvalidateByExpertAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,

            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $viewBank,
            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $viewPaymentType,

            $viewPaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $viewPhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EXPERT,
            'label' => 'Expert',
            'description' => "Expert.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $unvalidateQuoteAssignment,
            $validateQuoteWithConditionAssignment,
            $createWorksheetAssignment,
            $validateWorkSheetByExpertAssignment,
            $unvalidateWorkSheetByExpertAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $updateEditedAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::OPENER,
            'label' => 'Receptionniste',
            'description' => "Receptionniste.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
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
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::BUSINESS_DEVELOPER,
            'label' => 'Commercial',
            'description' => "Commercial",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EDITOR_MANAGER,
            'label' => 'Responsable rédaction',
            'description' => "Responsable rédaction.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $unvalidateQuoteAssignment,
            $validateQuoteWithConditionAssignment,
            $createWorksheetAssignment,
            $validateWorkSheetByExpertAssignment,
            $unvalidateWorkSheetByExpertAssignment,
            $realizeAssignment,
            $updateRealizedAssignment,
            $editAssignment,
            $updateEditedAssignment,
            $validateAssignment,
            $unvalidateAssignment,
            $cancelAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::EDITOR,
            'label' => 'Rédacteur',
            'description' => "Rédacteur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $viewAssignment,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::VALIDATOR,
            'label' => 'Validateur',
            'description' => "Validateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewAssignmentRequest,

            $viewAssignment,

            $viewInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $viewPayment,
            $paymentStatistics,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
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

            $createInvoice,
            $viewInvoice,
            $updateInvoice,
            $deleteInvoice,
            $cancelInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $viewBank,
            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $viewPaymentType,

            $viewPaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $viewPhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
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

            $createInvoice,
            $viewInvoice,
            $updateInvoice,
            $deleteInvoice,
            $cancelInvoice,
            $generateInvoice,
            $invoiceStatistics,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,
            $cancelPayment,
            $paymentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $viewBank,
            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $viewPaymentType,

            $viewPaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $viewPhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::INSURER_ADMIN,
            'label' => 'Administrateur assureur',
            'description' => "Chargé de l'administration d'un assureur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,
            
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            
            $viewVehicleGenre,

            $viewVehicleEnergy,

            $viewVehicleAge,

            $viewVehicleModel,

            $viewVehicleState,

            $createColor,
            $viewColor,
            $updateColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createClient,
            $viewClient,
            $updateClient,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::INSURER_STANDARD_USER,
            'label' => 'Utilisateur assureur',
            'description' => "Utilisateur assureur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,
            
            $createAssignment,
            $viewAssignment,
            $updateAssignment,
            $generateAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            
            $viewVehicleGenre,

            $viewVehicleEnergy,

            $viewVehicleAge,

            $viewVehicleModel,

            $viewVehicleState,

            $createColor,
            $viewColor,
            $updateColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createClient,
            $viewClient,
            $updateClient,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::REPAIRER_ADMIN,
            'label' => 'Administrateur réparateur',
            'description' => "Chargé de l'administration d'un réparateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewUser,
            
            $viewAssignment,
            $updateAssignment,
            $generateAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            
            $viewVehicleGenre,

            $viewVehicleEnergy,

            $viewVehicleAge,

            $viewVehicleModel,

            $viewVehicleState,

            $createColor,
            $viewColor,
            $updateColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createClient,
            $viewClient,
            $updateClient,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::REPAIRER_STANDARD_USER,
            'label' => 'Utilisateur standard réparateur',
            'description' => "Utilisateur standard réparateur.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $createUser,
            $viewUser,
            $updateUser,
            $deleteUser,
            $enableUser,
            $disableUser,
            $resetUser,

            $viewUser,
            
            $viewAssignment,
            $updateAssignment,
            $generateAssignment,
            $createQuoteAssignment,
            $validateQuoteAssignment,
            $cancelQuoteAssignment,
            $assignmentStatistics,

            $viewShock,
            $createShock,
            $updateShock,
            $deleteShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $viewGeneralState,

            $viewClaimNature,

            $viewTechnicalConclusion,

            $viewDocumentTransmitted,

            $viewAssignmentDocument,

            $viewStatus,

            $viewRole,

            $viewPermission,


            $viewEntity,

            $viewEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            
            $viewVehicleGenre,

            $viewVehicleEnergy,

            $viewVehicleAge,

            $viewVehicleModel,

            $viewVehicleState,

            $createColor,
            $viewColor,
            $updateColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            
            $viewReceiptType,

            $viewSupply,

            $viewPaintType,

            $viewPaintProductPrice,

            $viewPaintingPrice,

            $viewHourlyRate,

            $viewWorkFee,

            $viewDepreciationTable,

            $viewAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $viewInsurerRelationship,

            $viewRepairerRelationship,

            $viewNumberPaintElement,

            $viewOtherCostType,

            $createClient,
            $viewClient,
            $updateClient,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $viewUserActionType,

            $dashboard,
        ]);
        
        Role::create([
            'name' => \App\Enums\RoleEnum::CLIENT,
            'label' => 'Client',
            'description' => "Client.",
            'guard_name' => 'sanctum',
        ])->givePermissionTo([
            $viewUser,

            $viewAssignmentRequest,
            $cancelAssignmentRequest,

            $viewAssignment,

            $viewShock,

            $createShockWork,
            $viewShockWork,
            $updateShockWork,
            $deleteShockWork,

            $createShockPoint,
            $viewShockPoint,
            $updateShockPoint,
            $deleteShockPoint,
            $enableShockPoint,
            $disableShockPoint,

            $createWorkforce,
            $viewWorkforce,
            $updateWorkforce,
            $deleteWorkforce,

            $createWorkforceType,
            $viewWorkforceType,
            $updateWorkforceType,
            $deleteWorkforceType,
            $enableWorkforceType,
            $disableWorkforceType,

            $createAssignmentType,
            $viewAssignmentType,
            $updateAssignmentType,
            $deleteAssignmentType,
            $enableAssignmentType,
            $disableAssignmentType,

            $createExpertiseType,
            $viewExpertiseType,
            $updateExpertiseType,
            $deleteExpertiseType,
            $enableExpertiseType,
            $disableExpertiseType,

            $createGeneralState,
            $viewGeneralState,
            $updateGeneralState,
            $deleteGeneralState,
            $enableGeneralState,
            $disableGeneralState,

            $createClaimNature,
            $viewClaimNature,
            $updateClaimNature,
            $deleteClaimNature,
            $enableClaimNature,
            $disableClaimNature,

            $createTechnicalConclusion,
            $viewTechnicalConclusion,
            $updateTechnicalConclusion,
            $deleteTechnicalConclusion,
            $enableTechnicalConclusion,
            $disableTechnicalConclusion,

            $createDocumentTransmitted,
            $viewDocumentTransmitted,
            $updateDocumentTransmitted,
            $deleteDocumentTransmitted,
            $enableDocumentTransmitted,
            $disableDocumentTransmitted,

            $createAssignmentDocument,
            $viewAssignmentDocument,
            $updateAssignmentDocument,
            $deleteAssignmentDocument,
            $enableAssignmentDocument,
            $disableAssignmentDocument,

            $createStatus,
            $viewStatus,
            $updateStatus,
            $deleteStatus,
            $enableStatus,
            $disableStatus,

            $createRole,
            $viewRole,
            $updateRole,
            $deleteRole,

            $createPermission,
            $viewPermission,
            $updatePermission,
            $deletePermission,

            $createEntity,
            $viewEntity,
            $updateEntity,
            $deleteEntity,
            $enableEntity,
            $disableEntity,

            $createEntityType,
            $viewEntityType,
            $updateEntityType,
            $deleteEntityType,
            $enableEntityType,
            $disableEntityType,

            $createVehicle,
            $viewVehicle,
            $updateVehicle,
            $deleteVehicle,

            $createVehicleGenre,
            $viewVehicleGenre,
            $updateVehicleGenre,
            $deleteVehicleGenre,
            $enableVehicleGenre,
            $disableVehicleGenre,

            $createVehicleEnergy,
            $viewVehicleEnergy,
            $updateVehicleEnergy,
            $deleteVehicleEnergy,
            $enableVehicleEnergy,
            $disableVehicleEnergy,

            $createVehicleAge,
            $viewVehicleAge,
            $updateVehicleAge,
            $deleteVehicleAge,
            $enableVehicleAge,
            $disableVehicleAge,

            $createVehicleModel,
            $viewVehicleModel,
            $updateVehicleModel,
            $deleteVehicleModel,
            $enableVehicleModel,
            $disableVehicleModel,

            $createVehicleState,
            $viewVehicleState,
            $updateVehicleState,
            $deleteVehicleState,
            $enableVehicleState,
            $disableVehicleState,

            $createBrand,
            $viewBrand,
            $updateBrand,
            $deleteBrand,
            $enableBrand,
            $disableBrand,

            $createColor,
            $viewColor,
            $updateColor,
            $deleteColor,
            $enableColor,
            $disableColor,

            $createBodywork,
            $viewBodywork,
            $updateBodywork,
            $deleteBodywork,
            $enableBodywork,
            $disableBodywork,

            $createAssignmentMessage,
            $viewAssignmentMessage,
            $updateAssignmentMessage,
            $deleteAssignmentMessage,

            $createCheck,
            $viewCheck,
            $updateCheck,
            $deleteCheck,

            $createBank,
            $viewBank,
            $updateBank,
            $deleteBank,
            $enableBank,
            $disableBank,
            
            $createReceiptType,
            $viewReceiptType,
            $updateReceiptType,
            $deleteReceiptType,
            $enableReceiptType,
            $disableReceiptType,

            $createSupply,
            $viewSupply,
            $updateSupply,
            $deleteSupply,
            $enableSupply,
            $disableSupply,

            $createPaintType,
            $viewPaintType,
            $updatePaintType,
            $deletePaintType,
            $enablePaintType,
            $disablePaintType,

            $createPaintProductPrice,
            $viewPaintProductPrice,
            $updatePaintProductPrice,
            $deletePaintProductPrice,
            $enablePaintProductPrice,
            $disablePaintProductPrice,

            $createPaintingPrice,
            $viewPaintingPrice,
            $updatePaintingPrice,
            $deletePaintingPrice,
            $enablePaintingPrice,
            $disablePaintingPrice,

            $createHourlyRate,
            $viewHourlyRate,
            $updateHourlyRate,
            $deleteHourlyRate,
            $enableHourlyRate,
            $disableHourlyRate,

            $createWorkFee,
            $viewWorkFee,
            $updateWorkFee,
            $deleteWorkFee,
            $enableWorkFee,
            $disableWorkFee,

            $createReceipt,
            $viewReceipt,
            $updateReceipt,
            $deleteReceipt,

            $createDepreciationTable,
            $viewDepreciationTable,
            $updateDepreciationTable,
            $deleteDepreciationTable,
            $enableDepreciationTable,
            $disableDepreciationTable,

            $createAscertainmentType,
            $viewAscertainmentType,
            $updateAscertainmentType,
            $deleteAscertainmentType,
            $enableAscertainmentType,
            $disableAscertainmentType,

            $createRemark,
            $viewRemark,
            $updateRemark,
            $deleteRemark,
            $enableRemark,
            $disableRemark,

            $createInsurerRelationship,
            $viewInsurerRelationship,
            $updateInsurerRelationship,
            $deleteInsurerRelationship,
            $enableInsurerRelationship,
            $disableInsurerRelationship,

            $createRepairerRelationship,
            $viewRepairerRelationship,
            $updateRepairerRelationship,
            $deleteRepairerRelationship,
            $enableRepairerRelationship,
            $disableRepairerRelationship,

            $createNumberPaintElement,
            $viewNumberPaintElement,
            $updateNumberPaintElement,
            $deleteNumberPaintElement,
            $enableNumberPaintElement,
            $disableNumberPaintElement,

            $createOtherCostType,
            $viewOtherCostType,
            $updateOtherCostType,
            $deleteOtherCostType,
            $enableOtherCostType,
            $disableOtherCostType,

            $createOtherCost,
            $viewOtherCost,
            $updateOtherCost,
            $deleteOtherCost,

            $createPayment,
            $viewPayment,
            $updatePayment,
            $deletePayment,

            $createPaymentType,
            $viewPaymentType,
            $updatePaymentType,
            $deletePaymentType,
            $enablePaymentType,
            $disablePaymentType,

            $createPaymentMethod,
            $viewPaymentMethod,
            $updatePaymentMethod,
            $deletePaymentMethod,
            $enablePaymentMethod,
            $disablePaymentMethod,

            $createClient,
            $viewClient,
            $updateClient,
            $deleteClient,
            $enableClient,
            $disableClient,

            $createPhoto,
            $viewPhoto,
            $updatePhoto,
            $deletePhoto,

            $createPhotoType,
            $viewPhotoType,
            $updatePhotoType,
            $deletePhotoType,
            $enablePhotoType,
            $disablePhotoType,

            $createQrCode,
            $viewQrCode,
            $updateQrCode,
            $deleteQrCode,
            $enableQrCode,
            $disableQrCode,

            $createUserAction,
            $viewUserAction,
            $updateUserAction,
            $deleteUserAction,

            $createUserActionType,
            $viewUserActionType,
            $updateUserActionType,
            $deleteUserActionType,
            $enableUserActionType,
            $disableUserActionType,

            $dashboard,
        ]);

        Role::create([
            'name' => \App\Enums\RoleEnum::UNASSIGNED,
            'label' => 'Non assigné',
            'description' => 'Aucune habilitation',
            'guard_name' => 'sanctum',
        ]);
    }
}
