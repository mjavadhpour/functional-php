<?php

    $map = function($func, $array) {
        return array_reduce($array, function($carry, $item) use ($func) {
            return array_merge($carry, [$func($item)]);  
        }, []);
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

    print_r( $map( fn($item) => $item['position'], EMPLOYEES ) );
?>