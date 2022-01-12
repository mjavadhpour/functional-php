<?php

    $map = function(Closure $func, array $array): array {
        return array_reduce($array, fn($carry, $item): array => array_merge($carry, [$func($item)]), []);
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

    $get_partial = fn(string $index): Closure => fn(array $array): array => $map(fn($item) => $item[$index], $array);

    $get_position = $get_partial('position');
    $get_name = $get_partial('name');

    print_r( $get_position( EMPLOYEES ) );
    print_r( $get_name( EMPLOYEES ) );

    const ALL_VOTES = [
        'Harold', 'Harold', 'Jimmy', 'Nataly', 'Jimmy', 'Ash', 'Nataly', 'Jimmy', 'Jimmy', 'Nataly',
    ];

    $tally_votes = fn(array $votes) => array_reduce($votes, fn(array $carry, string $vote) => array_merge($carry, [$vote => ++$carry[$vote]]), []);

    print_r($tally_votes(ALL_VOTES));

?>