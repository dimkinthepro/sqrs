<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'strict_param' => true,
        'no_unused_imports' => true,
        'cast_spaces' => ['space' => 'single'],
        'concat_space' => ['spacing' => 'one'],
        'return_type_declaration' => ['space_before' => 'none'],
        'single_space_after_construct' => true,
    ])
    ->setFinder($finder)
;
