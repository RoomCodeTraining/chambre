<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum UserActionTypeEnum: string
{
    use UsefulEnums;

    case LIST_USER = 'list_user';
    case DETAILS_USER = 'details_user';
    case CREATE_USER = 'create_user';
    case UPDATE_USER = 'update_user';
    case DELETE_USER = 'delete_user';
    case ENABLE_USER = 'enable_user';
    case DISABLE_USER = 'disable_user';
    case RESET_PASSWORD_USER = 'reset_password_user';
    case CHANGE_PASSWORD_USER = 'change_password_user';
    case LOGIN_USER = 'login_user';
    case LOGOUT_USER = 'logout_user';
}
