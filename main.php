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

    $get_position = fn($array) => $map(fn($item) => $item['position'], $array);

    print_r( $get_position( EMPLOYEES ) );
?>