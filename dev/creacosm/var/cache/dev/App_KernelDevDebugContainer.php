<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerG1Igc5l\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerG1Igc5l/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerG1Igc5l.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerG1Igc5l\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerG1Igc5l\App_KernelDevDebugContainer([
    'container.build_hash' => 'G1Igc5l',
    'container.build_id' => 'd13263bf',
    'container.build_time' => 1678703770,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerG1Igc5l');