<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use App\Validations\PhoneRules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        PhoneRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        "list" => "CodeIgniter\Validation\Views\list",
        "single" => "CodeIgniter\Validation\Views\single",
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    //

    public array $auth = [
        "telefono" => [
            "rules" =>
                "required|numeric|min_length[10]|max_length[10]|valid_phone",
            "errors" => [
                "valid_phone" => "El teléfono no es válido en RD",
                "required" => "El teléfono es requerido",
                "numeric" => "El teléfono debe ser numérico",
                "min_length" => "El teléfono debe tener al menos 10 dígitos",
                "max_length" => "El teléfono debe tener máximo 10 dígitos",
            ],
        ],
        "clave" => "required|min_length[6]|max_length[20]",
    ];
}
