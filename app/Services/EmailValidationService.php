<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EmailValidationService
{
    /**
     * Valide une liste d'emails en vérifiant leur format, leur DNS et leur domaine accessible.
     *
     * @param array $emails Liste d'emails à valider
     * @return array Liste des emails valides
     */
    public function validateEmails(array $emails): array
    {
        $valid_emails = [];

        foreach ($emails as $email) {
            if ($this->isValidEmail($email)) {
                $valid_emails[] = $email;
            }
        }

        return $valid_emails;
    }

    /**
     * Vérifie si un email est valide.
     *
     * @param mixed $email Email à valider
     * @return bool True si l'email est valide, false sinon
     */
    public function isValidEmail($email): bool
    {
        // Vérification du format de base
        if (!is_string($email) || trim($email) === '') {
            return false;
        }

        if (!str_contains($email, '@')) {
            return false;
        }

        [$local, $domain] = explode('@', $email, 2);

        // 1️⃣ Vérification DNS (MX prioritaire, A en fallback)
        if (!checkdnsrr($domain, 'MX') && !checkdnsrr($domain, 'A')) {
            return false;
        }

        // 2️⃣ Test HTTP avec / sans www
        return $this->isDomainReachable($domain);
    }

    /**
     * Vérifie si un domaine est accessible via HTTP/HTTPS.
     *
     * @param string $domain Nom de domaine à vérifier
     * @return bool True si le domaine est accessible, false sinon
     */
    protected function isDomainReachable(string $domain): bool
    {
        $urls = [
            "https://$domain",
            "https://www.$domain",
            "http://$domain",
            "http://www.$domain",
        ];

        foreach ($urls as $url) {
            try {
                $response = Http::timeout(10)->get($url);

                if ($response->successful() || $response->redirect()) {
                    return true; // On arrête dès qu'une URL fonctionne
                }
            } catch (\Throwable $e) {
                // On ignore et on teste l'URL suivante
            }
        }

        return false;
    }
}

