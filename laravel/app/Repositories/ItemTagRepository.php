<?php

namespace App\Repositories;

// app/Repositories/ItemTagRepository.php

namespace App\Repositories;

use App\Models\ItemTag;

class ItemTagRepository
{
    public function createItemTag(array $data)
    {
        return ItemTag::create($data);
    }
}

