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

    case VIEW_ASSIGNMENT = 'assignment.view';
    case CREATE_ASSIGNMENT = 'assignment.create';
    case UPDATE_ASSIGNMENT = 'assignment.update';
    case REALIZE_ASSIGNMENT = 'assignment.realize';
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

    case MANAGE_APP = 'app.manage';
}
