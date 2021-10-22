<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ' :attribute deve ser aceite.',
    'active_url'           => ' :attribute não é uma URL válida',
    'after'                => ' :attribute deve ser uma data depois de :date.',
    'alpha'                => ' :attribute só pode conter letras.',
    'alpha_dash'           => ' :attribute só pode conter letras, números e hífens.',
    'alpha_num'            => ' :attribute só pode conter letras e números.',
    'array'                => ' :attribute deve ser uma lista.',
    'before'               => ' :attribute deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => ' :attribute tem que estar entre :min e :max.',
        'file'    => ' :attribute tem que ter entre :min e :max kilobytes.',
        'string'  => ' :attribute tem que ter entre :min e :max caracteres.',
        'array'   => ' :attribute tem que ter entre :min e :max items.',
    ],
    'boolean'              => ' :attribute valores devem ser ou verdadeiro ou falso.',
    'confirmed'            => ' :attribute confirmação não bate.',
    'date'                 => ' :attribute não é uma data válida.',
    'date_format'          => ' :attribute não confere com o formato :format.',
    'different'            => ' :attribute e :other devem ser diferentes.',
    'digits'               => ' :attribute devem ser :digits digits.',
    'digits_between'       => ' :attribute devem ser between :min e :max digits.',
    'distinct'             => ' :attribute campo com valor duplicado.',
    'email'                => ' :attribute deve ser um endereço válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'filled'               => ' :attribute é um campo obrigatório.',
    'image'                => ' :attribute deve ser uma imagem',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O :attribute campo não existe :other.',
    'integer'              => ' :attribute deve ser um número inteiro.',
    'ip'                   => ' :attribute devem ser um endereço de IP válido.',
    'json'                 => ' :attribute devem ser uma String JSON válida.',
    'max'                  => [
        'numeric' => ' :attribute não pode ser maior que :max.',
        'file'    => ' :attribute não pode ser maior que :max kilobytes.',
        'string'  => ' :attribute não pode ser maior que :max caracteres.',
        'array'   => ' :attribute não pode ter mais que :max items.',
    ],
    'mimes'                => ' :attribute devem ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ' :attribute deve ser pelo menos :min.',
        'file'    => ' :attribute deve ser pelo menos :min kilobytes.',
        'string'  => ' :attribute deve ser pelo menos :min characters.',
        'array'   => ' :attribute deve ter pelo menos :min items.',
    ],
    'not_in'               => 'o :attribute selecionado é inválido.',
    'numeric'              => ' :attribute devem ser um número.',
    'present'              => ' :attribute campo deve ser preenchido.',
    'regex'                => ' :attribute formato é inválido.',
    'required'             => ' :attribute campo é obrigatório.',
    'required_if'          => ' :attribute campo é obrigatório quando :other é :value.',
    'required_unless'      => ' :attribute campo é obrigatório a menos que :other está em :values.',
    'required_with'        => ' :attribute campo é obrigatório quando :values é presente.',
    'required_with_all'    => ' :attribute campo é obrigatório quando :values é presente.',
    'required_without'     => ' :attribute campo é obrigatório quando :values não é presente.',
    'required_without_all' => ' :attribute campo é obrigatório quando nenhum dos :values são presentes.',
    'same'                 => ' :attribute e :other devem bater.',
    'size'                 => [
        'numeric' => ' :attribute deve ser :size.',
        'file'    => ' :attribute deve ser :size kilobytes.',
        'string'  => ' :attribute deve ser :size characters.',
        'array'   => ' :attribute deve conter :size items.',
    ],
    'string'               => ' :attribute devem ser uma string.',
    'timezone'             => ' :attribute devem ser no formato data válido.',
    'unique'               => ' :attribute já está em uso.',
    'url'                  => ' :attribute formato é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
