<?php

if (!file_exists(__DIR__.'/src')) {
    exit(0);
}

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHPUnit75Migration:risky' => true,
        'php_unit_dedicate_assert' => ['target' => '5.6'],
        'array_syntax' => ['syntax' => 'short'],
        'fopen_flags' => false,
        'protected_to_private' => false,
        'native_constant_invocation' => true,
        'combine_nested_dirname' => true,
        'list_syntax' => ['syntax' => 'short'],
        'ordered_imports' => [
            'imports_order' => ['const', 'class', 'function'],
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([__DIR__.'/src', __DIR__.'/ux.symfony.com/src', __DIR__.'/ux.symfony.com/tests'])
            ->append([__FILE__])
            ->notPath('#/Fixtures/#')
            ->notPath('#/app/var/#')
            ->notPath('#/var/cache/#')
            ->notPath('Turbo/Attribute/Broadcast.php') // Need https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/4702
    )
;
