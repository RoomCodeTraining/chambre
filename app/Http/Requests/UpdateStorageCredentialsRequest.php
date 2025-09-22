<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use App\Enums\SupportedStorageDrivers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStorageCredentialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole(RoleEnum::OFFICE_ADMIN->value);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'storage' => ['required', 'array'],
            'storage.driver' => ['required', 'string', Rule::in(SupportedStorageDrivers::values())],
            'storage.s3.key' => ['required_if:storage.driver,s3', 'string', 'max:255'],
            'storage.s3.secret' => ['required_if:storage.driver,s3', 'string', 'max:255'],
            'storage.s3.region' => ['required_if:storage.driver,s3', 'string', 'max:255'],
            'storage.s3.bucket' => ['required_if:storage.driver,s3', 'string', 'max:255'],
            'storage.s3.endpoint' => ['required_if:storage.driver,s3', 'string', 'max:255'],
            'storage.ftp.host' => ['required_if:storage.driver,ftp', 'string', 'max:255'],
            'storage.ftp.port' => ['required_if:storage.driver,ftp', 'integer'],
            'storage.ftp.username' => ['required_if:storage.driver,ftp', 'string', 'max:255'],
            'storage.ftp.password' => ['required_if:storage.driver,ftp', 'string', 'max:255'],
            'storage.ftp.root' => ['required_if:storage.driver,ftp', 'string', 'max:255'],
            'storage.sftp.host' => ['required_if:storage.driver,sftp', 'string', 'max:255'],
            'storage.sftp.port' => ['required_if:storage.driver,sftp', 'integer'],
            'storage.sftp.username' => ['required_if:storage.driver,sftp', 'string', 'max:255'],
            'storage.sftp.password' => ['required_if:storage.driver,sftp', 'string', 'max:255'],
            'storage.sftp.root' => ['required_if:storage.driver,sftp', 'string', 'max:255'],
        ];
    }
}
