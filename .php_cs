<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in([__DIR__.'/app/']);

$rules = [
    '@Symfony' => true,
    'array_push' => true,
    'backtick_to_shell_exec' => true,
    'ereg_to_preg' => true,
    'mb_str_functions' => true,
    'no_alias_functions' => ['sets' => ['@all']],
    'no_alias_language_construct_call' => true,
    'random_api_migration' => ['replacements' => ['mt_rand' => 'random_int', 'rand' => 'random_int']],
    'set_type_to_cast' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_whitespace_before_comma_in_array' => false,
    'normalize_index_brace' => true,
    'trailing_comma_in_multiline_array' => false,
    'trim_array_spaces' => true,
    'braces' => [
        'allow_single_line_closure' => true,
        'allow_single_line_anonymous_class_with_empty_body' => true,
    ],
    'encoding' => true,
    'non_printable_character' => false,
    'lowercase_constants' => false,
    'lowercase_keywords' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,
    'lowercase_cast' => true,
    'modernize_types_casting' => true,
    'no_unset_cast' => true,
    'short_scalar_cast' => true,
    'concat_space' => ['spacing' => 'one'],
    'not_operator_with_space' => true,
    'standardize_not_equals' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'declare_equal_normalize' => ['space' => 'single'],
    'new_with_braces' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_leading_import_slash' => true,
    'no_whitespace_in_blank_line' => true,
    'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                ],
            ],
            'ordered_imports' => [
                'imports_order' => [
                    'class',
                    'function',
                    'const',
                ],
                'sort_algorithm' => 'none',
            ],
            'return_type_declaration' => true,
            'single_blank_line_before_namespace' => true,
            'single_trait_insert_per_statement' => true,
            'ternary_operator_spaces' => true,
            'unary_operator_spaces' => true,
            'visibility_required' => [
                'elements' => [
                    'const',
                    'method',
                    'property',
                ],
            ],
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);
