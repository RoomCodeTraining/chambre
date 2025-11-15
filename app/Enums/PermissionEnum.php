<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum PermissionEnum: string
{
    use UsefulEnums;

    case VIEW_USER = 'user.view';
    case CREATE_USER = 'user.create';
    case UPDATE_USER = 'user.update';
    case DELETE_USER = 'user.delete';
    case ENABLE_USER = 'user.enable';
    case DISABLE_USER = 'user.disable';
    case RESET_USER = 'user.reset';

    case VIEW_ASSIGNMENT_REQUEST = 'assignment_request.view';
    case CREATE_ASSIGNMENT_REQUEST = 'assignment_request.create';
    case UPDATE_ASSIGNMENT_REQUEST = 'assignment_request.update';
    case DELETE_ASSIGNMENT_REQUEST = 'assignment_request.delete';
    case ACCEPT_ASSIGNMENT_REQUEST = 'assignment_request.accept';
    case REJECT_ASSIGNMENT_REQUEST = 'assignment_request.reject';
    case CANCEL_ASSIGNMENT_REQUEST = 'assignment_request.cancel';

    case VIEW_ASSIGNMENT = 'assignment.view';
    case CREATE_ASSIGNMENT = 'assignment.create';
    case UPDATE_ASSIGNMENT = 'assignment.update';
    case REALIZE_ASSIGNMENT = 'assignment.realize';
    case CREATE_WORKSHEET_ASSIGNMENT = 'assignment.create_worksheet';
    case CREATE_QUOTE_ASSIGNMENT = 'assignment.create_quote';
    case VALIDATE_QUOTE_ASSIGNMENT = 'assignment.validate_quote';
    case CANCEL_QUOTE_ASSIGNMENT = 'assignment.cancel_quote';
    case EDIT_ASSIGNMENT = 'assignment.edit';
    case VALIDATE_ASSIGNMENT = 'assignment.validate';
    case CLOSE_ASSIGNMENT = 'assignment.close';
    case CANCEL_ASSIGNMENT = 'assignment.cancel';
    case GENERATE_ASSIGNMENT = 'assignment.generate';
    case DELETE_ASSIGNMENT = 'assignment.delete';
    case ASSIGNMENT_STATISTICS = 'assignment.statistics';

    case VIEW_INVOICE = 'invoice.view';
    case CREATE_INVOICE = 'invoice.create';
    case UPDATE_INVOICE = 'invoice.update';
    case CANCEL_INVOICE = 'invoice.cancel';
    case GENERATE_INVOICE = 'invoice.generate';
    case DELETE_INVOICE = 'invoice.delete';
    case INVOICE_STATISTICS = 'invoice.statistics';

    case VIEW_PAYMENT = 'payment.view';
    case CREATE_PAYMENT = 'payment.create';
    case UPDATE_PAYMENT = 'payment.update';
    case CANCEL_PAYMENT = 'payment.cancel';
    case DELETE_PAYMENT = 'payment.delete';
    case PAYMENT_STATISTICS = 'payment.statistics';

    case VIEW_SHOCK = 'shock.view';
    case CREATE_SHOCK = 'shock.create';
    case UPDATE_SHOCK = 'shock.update';
    case DELETE_SHOCK = 'shock.delete';

    case VIEW_SHOCK_WORK = 'shock_work.view';
    case CREATE_SHOCK_WORK = 'shock_work.create';
    case UPDATE_SHOCK_WORK = 'shock_work.update';
    case DELETE_SHOCK_WORK = 'shock_work.delete';

    case VIEW_SHOCK_POINT = 'shock_point.view';
    case CREATE_SHOCK_POINT = 'shock_point.create';
    case UPDATE_SHOCK_POINT = 'shock_point.update';
    case DELETE_SHOCK_POINT = 'shock_point.delete';

    case VIEW_WORKFORCE = 'workforce.view';
    case CREATE_WORKFORCE = 'workforce.create';
    case UPDATE_WORKFORCE = 'workforce.update';
    case DELETE_WORKFORCE = 'workforce.delete';

    case VIEW_WORKFORCE_TYPE = 'workforce_type.view';
    case CREATE_WORKFORCE_TYPE = 'workforce_type.create';
    case UPDATE_WORKFORCE_TYPE = 'workforce_type.update';
    case DELETE_WORKFORCE_TYPE = 'workforce_type.delete';
    case ENABLE_WORKFORCE_TYPE = 'workforce_type.enable';
    case DISABLE_WORKFORCE_TYPE = 'workforce_type.disable';

    case VIEW_ASSIGNMENT_TYPE = 'assignment_type.view';
    case CREATE_ASSIGNMENT_TYPE = 'assignment_type.create';
    case UPDATE_ASSIGNMENT_TYPE = 'assignment_type.update';
    case DELETE_ASSIGNMENT_TYPE = 'assignment_type.delete';
    case ENABLE_ASSIGNMENT_TYPE = 'assignment_type.enable';
    case DISABLE_ASSIGNMENT_TYPE = 'assignment_type.disable';

    case VIEW_EXPERTISE_TYPE = 'expertise_type.view';
    case CREATE_EXPERTISE_TYPE = 'expertise_type.create';
    case UPDATE_EXPERTISE_TYPE = 'expertise_type.update';
    case DELETE_EXPERTISE_TYPE = 'expertise_type.delete';
    case ENABLE_EXPERTISE_TYPE = 'expertise_type.enable';
    case DISABLE_EXPERTISE_TYPE = 'expertise_type.disable';

    case VIEW_GENERAL_STATE = 'general_state.view';
    case CREATE_GENERAL_STATE = 'general_state.create';
    case UPDATE_GENERAL_STATE = 'general_state.update';
    case DELETE_GENERAL_STATE = 'general_state.delete';
    case ENABLE_GENERAL_STATE = 'general_state.enable';
    case DISABLE_GENERAL_STATE = 'general_state.disable';

    case VIEW_CLAIM_NATURE = 'claim_nature.view';
    case CREATE_CLAIM_NATURE = 'claim_nature.create';
    case UPDATE_CLAIM_NATURE = 'claim_nature.update';
    case DELETE_CLAIM_NATURE = 'claim_nature.delete';
    case ENABLE_CLAIM_NATURE = 'claim_nature.enable';
    case DISABLE_CLAIM_NATURE = 'claim_nature.disable';

    case VIEW_TECHNICAL_CONCLUSION = 'technical_conclusion.view';
    case CREATE_TECHNICAL_CONCLUSION = 'technical_conclusion.create';
    case UPDATE_TECHNICAL_CONCLUSION = 'technical_conclusion.update';
    case DELETE_TECHNICAL_CONCLUSION = 'technical_conclusion.delete';
    case ENABLE_TECHNICAL_CONCLUSION = 'technical_conclusion.enable';
    case DISABLE_TECHNICAL_CONCLUSION = 'technical_conclusion.disable';

    case VIEW_DOCUMENT_TRANSMITTED = 'document_transmitted.view';
    case CREATE_DOCUMENT_TRANSMITTED = 'document_transmitted.create';
    case UPDATE_DOCUMENT_TRANSMITTED = 'document_transmitted.update';
    case DELETE_DOCUMENT_TRANSMITTED = 'document_transmitted.delete';
    case ENABLE_DOCUMENT_TRANSMITTED = 'document_transmitted.enable';
    case DISABLE_DOCUMENT_TRANSMITTED = 'document_transmitted.disable';

    case VIEW_ASSIGNMENT_DOCUMENT = 'assignment_document.view';
    case CREATE_ASSIGNMENT_DOCUMENT = 'assignment_document.create';
    case UPDATE_ASSIGNMENT_DOCUMENT = 'assignment_document.update';
    case DELETE_ASSIGNMENT_DOCUMENT = 'assignment_document.delete';
    case ENABLE_ASSIGNMENT_DOCUMENT = 'assignment_document.enable';
    case DISABLE_ASSIGNMENT_DOCUMENT = 'assignment_document.disable';

    case VIEW_STATUS = 'status.view';
    case CREATE_STATUS = 'status.create';
    case UPDATE_STATUS = 'status.update';
    case DELETE_STATUS = 'status.delete';
    case ENABLE_STATUS = 'status.enable';
    case DISABLE_STATUS = 'status.disable';

    case VIEW_ROLE = 'role.view';
    case CREATE_ROLE = 'role.create';
    case UPDATE_ROLE = 'role.update';
    case DELETE_ROLE = 'role.delete';

    case VIEW_PERMISSION = 'permission.view';
    case CREATE_PERMISSION = 'permission.create';
    case UPDATE_PERMISSION = 'permission.update';
    case DELETE_PERMISSION = 'permission.delete';

    case VIEW_ENTITY = 'entity.view';
    case CREATE_ENTITY = 'entity.create';
    case UPDATE_ENTITY = 'entity.update';
    case DELETE_ENTITY = 'entity.delete';
    case ENABLE_ENTITY = 'entity.enable';
    case DISABLE_ENTITY = 'entity.disable';

    case VIEW_ENTITY_TYPE = 'entity_type.view';
    case CREATE_ENTITY_TYPE = 'entity_type.create';
    case UPDATE_ENTITY_TYPE = 'entity_type.update';
    case DELETE_ENTITY_TYPE = 'entity_type.delete';
    case ENABLE_ENTITY_TYPE = 'entity_type.enable';
    case DISABLE_ENTITY_TYPE = 'entity_type.disable';
    
    case VIEW_VEHICLE = 'vehicle.view';
    case CREATE_VEHICLE = 'vehicle.create';
    case UPDATE_VEHICLE = 'vehicle.update';
    case DELETE_VEHICLE = 'vehicle.delete';

    case VIEW_VEHICLE_MODEL = 'vehicle_model.view';
    case CREATE_VEHICLE_MODEL = 'vehicle_model.create';
    case UPDATE_VEHICLE_MODEL = 'vehicle_model.update';
    case DELETE_VEHICLE_MODEL = 'vehicle_model.delete';
    case ENABLE_VEHICLE_MODEL = 'vehicle_model.enable';
    case DISABLE_VEHICLE_MODEL = 'vehicle_model.disable';

    case VIEW_VEHICLE_STATE = 'vehicle_state.view';
    case CREATE_VEHICLE_STATE = 'vehicle_state.create';
    case UPDATE_VEHICLE_STATE = 'vehicle_state.update';
    case DELETE_VEHICLE_STATE = 'vehicle_state.delete';
    case ENABLE_VEHICLE_STATE = 'vehicle_state.enable';
    case DISABLE_VEHICLE_STATE = 'vehicle_state.disable';

    case VIEW_BRAND = 'brand.view';
    case CREATE_BRAND = 'brand.create';
    case UPDATE_BRAND = 'brand.update';
    case DELETE_BRAND = 'brand.delete';
    case ENABLE_BRAND = 'brand.enable';
    case DISABLE_BRAND = 'brand.disable';

    case VIEW_COLOR = 'color.view';
    case CREATE_COLOR = 'color.create';
    case UPDATE_COLOR = 'color.update';
    case DELETE_COLOR = 'color.delete';
    case ENABLE_COLOR = 'color.enable';
    case DISABLE_COLOR = 'color.disable';

    case VIEW_NUMBER_PAINT_ELEMENT = 'number_paint_element.view';
    case CREATE_NUMBER_PAINT_ELEMENT = 'number_paint_element.create';
    case UPDATE_NUMBER_PAINT_ELEMENT = 'number_paint_element.update';
    case DELETE_NUMBER_PAINT_ELEMENT = 'number_paint_element.delete';
    case ENABLE_NUMBER_PAINT_ELEMENT = 'number_paint_element.enable';
    case DISABLE_NUMBER_PAINT_ELEMENT = 'number_paint_element.disable';

    case VIEW_PAINT_PRODUCT_PRICE = 'paint_product_price.view';
    case CREATE_PAINT_PRODUCT_PRICE = 'paint_product_price.create';
    case UPDATE_PAINT_PRODUCT_PRICE = 'paint_product_price.update';
    case DELETE_PAINT_PRODUCT_PRICE = 'paint_product_price.delete';
    case ENABLE_PAINT_PRODUCT_PRICE = 'paint_product_price.enable';
    case DISABLE_PAINT_PRODUCT_PRICE = 'paint_product_price.disable';

    case VIEW_OTHER_COST = 'other_cost.view';
    case CREATE_OTHER_COST = 'other_cost.create';
    case UPDATE_OTHER_COST = 'other_cost.update';
    case DELETE_OTHER_COST = 'other_cost.delete';
    case ENABLE_OTHER_COST = 'other_cost.enable';
    case DISABLE_OTHER_COST = 'other_cost.disable';

    case VIEW_OTHER_COST_TYPE = 'other_cost_type.view';
    case CREATE_OTHER_COST_TYPE = 'other_cost_type.create';
    case UPDATE_OTHER_COST_TYPE = 'other_cost_type.update';
    case DELETE_OTHER_COST_TYPE = 'other_cost_type.delete';
    case ENABLE_OTHER_COST_TYPE = 'other_cost_type.enable';
    case DISABLE_OTHER_COST_TYPE = 'other_cost_type.disable';

    case VIEW_PAINT_TYPE = 'paint_type.view';
    case CREATE_PAINT_TYPE = 'paint_type.create';
    case UPDATE_PAINT_TYPE = 'paint_type.update';
    case DELETE_PAINT_TYPE = 'paint_type.delete';
    case ENABLE_PAINT_TYPE = 'paint_type.enable';
    case DISABLE_PAINT_TYPE = 'paint_type.disable';

    case VIEW_PAINTING_PRICE = 'painting_price.view';
    case CREATE_PAINTING_PRICE = 'painting_price.create';
    case UPDATE_PAINTING_PRICE = 'painting_price.update';
    case DELETE_PAINTING_PRICE = 'painting_price.delete';
    case ENABLE_PAINTING_PRICE = 'painting_price.enable';
    case DISABLE_PAINTING_PRICE = 'painting_price.disable';

    case VIEW_HOURLY_RATE = 'hourly_rate.view';
    case CREATE_HOURLY_RATE = 'hourly_rate.create';
    case UPDATE_HOURLY_RATE = 'hourly_rate.update';
    case DELETE_HOURLY_RATE = 'hourly_rate.delete';
    case ENABLE_HOURLY_RATE = 'hourly_rate.enable';
    case DISABLE_HOURLY_RATE = 'hourly_rate.disable';

    case VIEW_WORK_FEE = 'work_fee.view';
    case CREATE_WORK_FEE = 'work_fee.create';
    case UPDATE_WORK_FEE = 'work_fee.update';
    case DELETE_WORK_FEE = 'work_fee.delete';
    case ENABLE_WORK_FEE = 'work_fee.enable';
    case DISABLE_WORK_FEE = 'work_fee.disable';

    case VIEW_RECEIPT = 'receipt.view';
    case CREATE_RECEIPT = 'receipt.create';
    case UPDATE_RECEIPT = 'receipt.update';
    case DELETE_RECEIPT = 'receipt.delete';

    case VIEW_RECEIPT_TYPE = 'receipt_type.view';
    case CREATE_RECEIPT_TYPE = 'receipt_type.create';
    case UPDATE_RECEIPT_TYPE = 'receipt_type.update';
    case DELETE_RECEIPT_TYPE = 'receipt_type.delete';
    case ENABLE_RECEIPT_TYPE = 'receipt_type.enable';
    case DISABLE_RECEIPT_TYPE = 'receipt_type.disable';

    case VIEW_SUPPLY = 'supply.view';
    case CREATE_SUPPLY = 'supply.create';
    case UPDATE_SUPPLY = 'supply.update';
    case DELETE_SUPPLY = 'supply.delete';
    case ENABLE_SUPPLY = 'supply.enable';
    case DISABLE_SUPPLY = 'supply.disable';

    case VIEW_DEPRECIATION_TABLE = 'depreciation_table.view';
    case CREATE_DEPRECIATION_TABLE = 'depreciation_table.create';
    case UPDATE_DEPRECIATION_TABLE = 'depreciation_table.update';
    case DELETE_DEPRECIATION_TABLE = 'depreciation_table.delete';
    case ENABLE_DEPRECIATION_TABLE = 'depreciation_table.enable';
    case DISABLE_DEPRECIATION_TABLE = 'depreciation_table.disable';

    case VIEW_VEHICLE_AGE = 'vehicle_age.view';
    case CREATE_VEHICLE_AGE = 'vehicle_age.create';
    case UPDATE_VEHICLE_AGE = 'vehicle_age.update';
    case DELETE_VEHICLE_AGE = 'vehicle_age.delete';
    case ENABLE_VEHICLE_AGE = 'vehicle_age.enable';
    case DISABLE_VEHICLE_AGE = 'vehicle_age.disable';

    case VIEW_VEHICLE_ENERGY = 'vehicle_energy.view';
    case CREATE_VEHICLE_ENERGY = 'vehicle_energy.create';
    case UPDATE_VEHICLE_ENERGY = 'vehicle_energy.update';
    case DELETE_VEHICLE_ENERGY = 'vehicle_energy.delete';
    case ENABLE_VEHICLE_ENERGY = 'vehicle_energy.enable';
    case DISABLE_VEHICLE_ENERGY = 'vehicle_energy.disable';

    case VIEW_VEHICLE_GENRE = 'vehicle_genre.view';
    case CREATE_VEHICLE_GENRE = 'vehicle_genre.create';
    case UPDATE_VEHICLE_GENRE = 'vehicle_genre.update';
    case DELETE_VEHICLE_GENRE = 'vehicle_genre.delete';
    case ENABLE_VEHICLE_GENRE = 'vehicle_genre.enable';
    case DISABLE_VEHICLE_GENRE = 'vehicle_genre.disable';

    case VIEW_BODYWORK = 'bodywork.view';
    case CREATE_BODYWORK = 'bodywork.create';
    case UPDATE_BODYWORK = 'bodywork.update';
    case DELETE_BODYWORK = 'bodywork.delete';
    case ENABLE_BODYWORK = 'bodywork.enable';
    case DISABLE_BODYWORK = 'bodywork.disable';

    case VIEW_ASCERTAINMENT = 'ascertainment.view';
    case CREATE_ASCERTAINMENT = 'ascertainment.create';
    case UPDATE_ASCERTAINMENT = 'ascertainment.update';
    case DELETE_ASCERTAINMENT = 'ascertainment.delete';

    case VIEW_ASCERTAINMENT_TYPE = 'ascertainment_type.view';
    case CREATE_ASCERTAINMENT_TYPE = 'ascertainment_type.create';
    case UPDATE_ASCERTAINMENT_TYPE = 'ascertainment_type.update';
    case DELETE_ASCERTAINMENT_TYPE = 'ascertainment_type.delete';
    case ENABLE_ASCERTAINMENT_TYPE = 'ascertainment_type.enable';
    case DISABLE_ASCERTAINMENT_TYPE = 'ascertainment_type.disable';

    case VIEW_INSURER_RELATIONSHIP = 'insurer_relationship.view';
    case CREATE_INSURER_RELATIONSHIP = 'insurer_relationship.create';
    case UPDATE_INSURER_RELATIONSHIP = 'insurer_relationship.update';
    case DELETE_INSURER_RELATIONSHIP = 'insurer_relationship.delete';
    case ENABLE_INSURER_RELATIONSHIP = 'insurer_relationship.enable';
    case DISABLE_INSURER_RELATIONSHIP = 'insurer_relationship.disable';

    case VIEW_REPAIRER_RELATIONSHIP = 'repairer_relationship.view';
    case CREATE_REPAIRER_RELATIONSHIP = 'repairer_relationship.create';
    case UPDATE_REPAIRER_RELATIONSHIP = 'repairer_relationship.update';
    case DELETE_REPAIRER_RELATIONSHIP = 'repairer_relationship.delete';
    case ENABLE_REPAIRER_RELATIONSHIP = 'repairer_relationship.enable';
    case DISABLE_REPAIRER_RELATIONSHIP = 'repairer_relationship.disable';

    case ASSIGNMENT_MESSAGE = 'assignment_message.view';
    case CREATE_ASSIGNMENT_MESSAGE = 'assignment_message.create';
    case UPDATE_ASSIGNMENT_MESSAGE = 'assignment_message.update';
    case DELETE_ASSIGNMENT_MESSAGE = 'assignment_message.delete';

    case VIEW_ASSIGNMENT_TYPE = 'assignment_type.view';
    case CREATE_ASSIGNMENT_TYPE = 'assignment_type.create';
    case UPDATE_ASSIGNMENT_TYPE = 'assignment_type.update';
    case DELETE_ASSIGNMENT_TYPE = 'assignment_type.delete';
    case ENABLE_ASSIGNMENT_TYPE = 'assignment_type.enable';
    case DISABLE_ASSIGNMENT_TYPE = 'assignment_type.disable';

    case VIEW_EXPERTISE_TYPE = 'expertise_type.view';
    case CREATE_EXPERTISE_TYPE = 'expertise_type.create';
    case UPDATE_EXPERTISE_TYPE = 'expertise_type.update';
    case DELETE_EXPERTISE_TYPE = 'expertise_type.delete';
    case ENABLE_EXPERTISE_TYPE = 'expertise_type.enable';
    case DISABLE_EXPERTISE_TYPE = 'expertise_type.disable';

    case VIEW_GENERAL_STATE = 'general_state.view';
    case CREATE_GENERAL_STATE = 'general_state.create';
    case UPDATE_GENERAL_STATE = 'general_state.update';
    case DELETE_GENERAL_STATE = 'general_state.delete';
    case ENABLE_GENERAL_STATE = 'general_state.enable';
    case DISABLE_GENERAL_STATE = 'general_state.disable';

    case VIEW_CLAIM_NATURE = 'claim_nature.view';
    case CREATE_CLAIM_NATURE = 'claim_nature.create';
    case UPDATE_CLAIM_NATURE = 'claim_nature.update';
    case DELETE_CLAIM_NATURE = 'claim_nature.delete';
    case ENABLE_CLAIM_NATURE = 'claim_nature.enable';
    case DISABLE_CLAIM_NATURE = 'claim_nature.disable';

    case VIEW_TECHNICAL_CONCLUSION = 'technical_conclusion.view';
    case CREATE_TECHNICAL_CONCLUSION = 'technical_conclusion.create';
    case UPDATE_TECHNICAL_CONCLUSION = 'technical_conclusion.update';
    case DELETE_TECHNICAL_CONCLUSION = 'technical_conclusion.delete';
    case ENABLE_TECHNICAL_CONCLUSION = 'technical_conclusion.enable';
    case DISABLE_TECHNICAL_CONCLUSION = 'technical_conclusion.disable';

    case VIEW_CHECK = 'check.view';
    case CREATE_CHECK = 'check.create';
    case UPDATE_CHECK = 'check.update';
    case DELETE_CHECK = 'check.delete';

    case VIEW_BANK = 'bank.view';
    case CREATE_BANK = 'bank.create';
    case UPDATE_BANK = 'bank.update';
    case DELETE_BANK = 'bank.delete';
    case ENABLE_BANK = 'bank.enable';
    case DISABLE_BANK = 'bank.disable';

    case VIEW_PAYMENT_TYPE = 'payment_type.view';
    case CREATE_PAYMENT_TYPE = 'payment_type.create';
    case UPDATE_PAYMENT_TYPE = 'payment_type.update';
    case DELETE_PAYMENT_TYPE = 'payment_type.delete';
    case ENABLE_PAYMENT_TYPE = 'payment_type.enable';
    case DISABLE_PAYMENT_TYPE = 'payment_type.disable';

    case VIEW_PAYMENT_METHOD = 'payment_method.view';
    case CREATE_PAYMENT_METHOD = 'payment_method.create';
    case UPDATE_PAYMENT_METHOD = 'payment_method.update';
    case DELETE_PAYMENT_METHOD = 'payment_method.delete';
    case ENABLE_PAYMENT_METHOD = 'payment_method.enable';
    case DISABLE_PAYMENT_METHOD = 'payment_method.disable';

    case VIEW_CLIENT = 'client.view';
    case CREATE_CLIENT = 'client.create';
    case UPDATE_CLIENT = 'client.update';
    case DELETE_CLIENT = 'client.delete';
    case ENABLE_CLIENT = 'client.enable';
    case DISABLE_CLIENT = 'client.disable';

    case VIEW_PHOTO = 'photo.view';
    case CREATE_PHOTO = 'photo.create';
    case UPDATE_PHOTO = 'photo.update';
    case DELETE_PHOTO = 'photo.delete';

    case VIEW_PHOTO_TYPE = 'photo_type.view';
    case CREATE_PHOTO_TYPE = 'photo_type.create';
    case UPDATE_PHOTO_TYPE = 'photo_type.update';
    case DELETE_PHOTO_TYPE = 'photo_type.delete';
    case ENABLE_PHOTO_TYPE = 'photo_type.enable';
    case DISABLE_PHOTO_TYPE = 'photo_type.disable';

    case VIEW_QR_CODE = 'qr_code.view';
    case CREATE_QR_CODE = 'qr_code.create';
    case UPDATE_QR_CODE = 'qr_code.update';
    case DELETE_QR_CODE = 'qr_code.delete';
    case ENABLE_QR_CODE = 'qr_code.enable';
    case DISABLE_QR_CODE = 'qr_code.disable';

    case VIEW_USER_ACTION = 'user_action.view';
    case CREATE_USER_ACTION = 'user_action.create';
    case UPDATE_USER_ACTION = 'user_action.update';
    case DELETE_USER_ACTION = 'user_action.delete';

    case VIEW_USER_ACTION_TYPE = 'user_action_type.view';
    case CREATE_USER_ACTION_TYPE = 'user_action_type.create';
    case UPDATE_USER_ACTION_TYPE = 'user_action_type.update';
    case DELETE_USER_ACTION_TYPE = 'user_action_type.delete';
    case ENABLE_USER_ACTION_TYPE = 'user_action_type.enable';
    case DISABLE_USER_ACTION_TYPE = 'user_action_type.disable';
    

    case DASHBOARD = 'dashboard.view';
}
