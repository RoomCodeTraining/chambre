<?php

if (! function_exists('image_to_base64')) {
    /**
     * Convertir une image en base64 (ou retourner null si introuvable)
     */
    function image_to_base64(string $path): ?string
    {
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/'.$type.';base64,'.base64_encode($data);
        }
        return null;
    }
}