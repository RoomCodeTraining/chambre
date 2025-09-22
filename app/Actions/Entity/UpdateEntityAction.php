<?php

namespace App\Actions\Entity;
use App\Models\Entity;

class UpdateEntityAction
{
    public function execute(Entity $entity, array $data)
    {
        $entity->update([
            'name' => $data['name'],
            'prefix' => $data['prefix'],
            'suffix' => $data['suffix'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'service_description' => $data['service_description'],
            'footer_description' => $data['footer_description'],
        ]);

        return $entity->fresh();
    }
}
