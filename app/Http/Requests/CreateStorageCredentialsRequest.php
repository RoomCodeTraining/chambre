<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use App\Enums\SupportedStorageDrivers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @bodyParam storage.driver Le type de stockage (s3, ftp, sftp)
 * @bodyParam storage.s3.key La clé S3
 * @bodyParam storage.s3.secret La clé secrète S3
 * @bodyParam storage.s3.region Le nom de la région
 * @bodyParam storage.s3.bucket Le nom du panier
 * @bodyParam storage.s3.endpoint Le `endpoint` S3
 * @bodyParam storage.ftp.host L'adresse du serveur
 * @bodyParam storage.ftp.port Le port du serveur
 * @bodyParam storage.ftp.username Le nom d'utilisateur
 * @bodyParam storage.ftp.password Le mot de passe
 * @bodyParam storage.ftp.root Le dossier dans lequel stocker les fichiers
 * @bodyParam storage.sftp.host L'adresse du serveur
 * @bodyParam storage.sftp.port Le port du serveur
 * @bodyParam storage.sftp.username Le nom d'utilisateur
 * @bodyParam storage.sftp.password Le mot de passe
 * @bodyParam storage.sftp.root Le dossier dans lequel stocker les fichiers
 */
class CreateStorageCredentialsRequest extends FormRequest
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
