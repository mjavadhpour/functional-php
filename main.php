<?php

    $map = function($func, $array) {
        return array_reduce($array, fn($carry, $item) => array_merge($carry, [$func($item)]), []);
    };

    const EMPLOYEES = [
        [
            'name' => 'John',
            'salary' => 1,
            'position' => 'UX',
        ],
        [
            'name' => 'Steven',
            'salary' => 1,
            'position' => 'IT',
        ],
        [
            'name' => 'Michael',
            'salary' => 1,
            'position' => 'Technical',
        ],
        [
            'name' => 'Gioavani',
            'salary' => 1,
            'position' => 'Technical',
        ],
    ];

    $get_partial = fn($index) => fn($array) => $map(fn($item) => $item[$index], $array);

    $get_position = $get_partial('position');
    $get_name = $get_partial('name');

    print_r( $get_position( EMPLOYEES ) );
    print_r( $get_name( EMPLOYEES ) );
?>