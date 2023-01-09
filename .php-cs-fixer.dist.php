<?php

if (!file_exists(__DIR__.'/src')) {
    exit(0);
}

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__.'/src')
;

return (new PhpCsFixer\Config())
    ->setRules(array(
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'protected_to_private' => false,
        'semicolon_after_instruction' => false,
        'phpdoc_to_comment' => ['ignored_tags' => ['psalm-suppress']],
    ))
    ->setRiskyAllowed(true)
    ->setFinder($finder);
