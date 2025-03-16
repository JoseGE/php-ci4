<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Gestor extends Entity
{
    protected $attributes = [
        "id" => null,
        "nombre" => null,
        "telefono" => null,
    ];
    protected $datamap = [];
    protected $dates = ["created_at", "updated_at", "deleted_at"];
    protected $casts = [];
}
