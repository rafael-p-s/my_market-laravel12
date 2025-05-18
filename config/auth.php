<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
        'cliente' => [
            'driver' => 'jwt',
            'provider' => 'cliente',
        ],
        'funcionario' => [
            'driver' => 'jwt',
            'provider' => 'funcionario',
        ],
        'fornecedor' => [
            'driver' => 'jwt',
            'provider' => 'fornecedor',
        ],
        'cargo' => [
            'driver' => 'jwt',
            'provider' => 'funcionario',
        ],
        'setor' => [
            'driver' => 'jwt',
            'provider' => 'funcionario',
        ],
        'produto' => [
            'driver' => 'jwt',
            'provider' => 'funcionario',
        ]

    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        'cliente' => [
            'driver' => 'eloquent',
            'model' => Modules\Cliente\Entities\ModelCliente::class,
        ],
        'funcionario' => [
            'driver' => 'eloquent',
            'model' => Modules\Funcionario\Entities\ModelFuncionario::class,
        ],
        'fornecedor' => [
            'driver' => 'eloquent',
            'model' => Modules\Fornecedor\Entities\ModelFornecedor::class,
        ],
        'cargo' => [
            'driver' => 'eloquent',
            'model' => Modules\Cargo\Entities\ModelCargo::class,
        ],
        'setor' => [
            'driver' => 'eloquent',
            'model' => Modules\Setor\Entities\ModelSetor::class,
        ],
        'produto' => [
            'driver' => 'eloquent',
            'model' => Modules\Produto\Entities\ModelProduto::class,
        ]
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
