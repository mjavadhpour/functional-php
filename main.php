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

    $second_arg_isnt_zero = fn(Closure $func) => function(...$args) use ($func) {
        if ($args[1] === 0) {
            echo "Second arg can not be zero!\n";
            return null;
        }
        return $func(...$args);
    };

    $call_on_value_or_array = fn(Closure $func) => function(...$args) use ($func) {
        if (is_array($args[0])) {
            return array_map(fn($item) => $func($item), $args[0]);
        }
        return $func($args[0]);
    };

    $double = fn($x) => $x * 2;
    $double_wrapped = $call_on_value_or_array($double);

    $value = 4;
    $doubled_value = $double_wrapped($value);
    
    $array = [1, 2, 3, 4];
    $doubled_array = $double_wrapped($array);

    echo $doubled_value. "\n";
    print_r($doubled_array);

?>