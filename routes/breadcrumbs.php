<?php

// Platform > Step 1
Breadcrumbs::for('platform.demokit.screen2.edit', function ($trail) {
    $trail->parent('platform.index');
    $trail->push('Step 1', route('platform.demokit.screen2.edit'));
});

// Platform > Step 2
Breadcrumbs::for('platform.demokit.screen1.create', function ($trail) {
    $trail->parent('platform.index');
    $trail->push('Step 2', route('platform.demokit.screen1.create'));
});

// Platform > Step 3
    Breadcrumbs::for('platform.demokit.screen3.list', function ($trail) {
    $trail->parent('platform.index');
    $trail->push('Step 3', route('platform.demokit.screen3.list'));
});

// Platform > Step 3 > Edit
Breadcrumbs::for('platform.demokit.screen3.edit', function ($trail, $screen3) {
    $trail->parent('platform.demokit.screen3.list');
    $trail->push('Edit', route('platform.demokit.screen3.edit', $screen3));
});

// Platform > Step 4
    Breadcrumbs::for('platform.demokit.screen1.list', function ($trail) {
    $trail->parent('platform.index');
    $trail->push('Step 4', route('platform.demokit.screen1.list'));
});


// Platform > Step 4 > Edit
Breadcrumbs::for('platform.demokit.screen1.edit', function ($trail, $screen1) {
    $trail->parent('platform.demokit.screen1.list');
    $trail->push('Edit', route('platform.demokit.screen1.edit', $screen1));
});