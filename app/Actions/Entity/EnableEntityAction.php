<?php

namespace App\Actions\Entity;

use App\Models\Entity;

class EnableEntityAction
{
    public function execute(Entity $entity)
    {
        $entity->update(['status_id' => 1]);

        $entity->users()->update(['status_id' => 1]);
    }
}
