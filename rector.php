<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

$level = 2;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests'
    ])
//    ->withSets([
//        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_ODBAL_40, // Set für das Upgrade auf Doctrine ORM 3
//    ])
//    ->withRules([
//        AddPropertyTypeToEntityRector::class,
//    ])
    ->withAttributesSets()
    ->withPreparedSets()
//    ->withTypeCoverageLevel($level)
//    ->withDeadCodeLevel($level)
//    ->withCodeQualityLevel($level)
    ->withComposerBased(doctrine: true, twig: true)
    ;
