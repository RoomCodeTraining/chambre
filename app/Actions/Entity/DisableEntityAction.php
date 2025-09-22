<?php

namespace App\Actions\Entity;

use App\Models\Entity;

class DisableEntityAction
{
    public function execute(Entity $entity)
    {
        $entity->update(['status_id' => 2]);

        $entity->users()->update(['status_id' => 2]);
    }
}
