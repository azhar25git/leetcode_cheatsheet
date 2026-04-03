<?php
/**
 * PHP 8.1+ LeetCode Cheatsheet Data
 * Fixed: Added SPL structures, Bitwise, and PHP 8.1 syntax.
 */

return [
    // CORE PHP
    [
        'tab' => 'core',
        'title' => 'Array Essentials',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'PHP arrays are ordered maps. O(1) for append/pop, O(n) for shift/unshift.',
        'code' => '$a = [3, 1, 4];
$a[] = 9;                 // Append - O(1)
array_pop($a);            // Pop last - O(1)
array_shift($a);          // Remove first - O(n)
array_unshift($a, 7);     // Add to front - O(n)

// Sorting (In-place)
sort($a);                 // Numeric asc
rsort($a);                // Numeric desc
usort($a, fn($a, $b) => $a <=> $b); // Custom (Spaceship op)

$slice = array_slice($a, 1, 3); // Copy [1, 3)
$len = count($a);
$sum = array_sum($a);'
    ],
    [
        'tab' => 'core',
        'title' => 'String & Char Manipulation',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Strings are not objects. Use str_split to iterate.',
        'code' => '$s = "hello";
$chars = str_split($s);   // [\'h\',\'e\',\'l\',\'l\',\'o\']
$sub = substr($s, 1, 3);  // "ell"
strrev($s);               // reverse string
implode("", ["a", "b"]);  // "ab"
explode(",", "a,b");      // ["a", "b"]

// ASCII Conversion (Critical for LC)
ord(\'a\');                 // 97
chr(97);                  // "a"
// Shift char: chr(ord(\'a\') + 1) -> \'b\''
    ],
    [
        'tab' => 'core',
        'title' => 'HashMaps (Associative)',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'O(1) lookup. isset() is faster than array_key_exists().',
        'code' => '$map = ["a" => 1];
$map["b"] = 2;
isset($map["a"]);         // O(1) check
unset($map["b"]);         // O(1) delete
$val = $map["c"] ?? 0;    // Null coalescing (default)

// Frequency Map
$counts = array_count_values($arr);

// Grouping
$groups = [];
foreach ($items as $x) {
    $groups[$key][] = $x;
}'
    ],

    // DATA STRUCTURES (SPL)
    [
        'tab' => 'ds',
        'title' => 'SplPriorityQueue (Heap)',
        'badge' => 'SPL',
        'badgeColor' => 'purple',
        'note' => 'Native Max-Heap. For Min-Heap, negate priorities.',
        'code' => '$pq = new SplPriorityQueue();
$pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH); // Get val + priority

$pq->insert("data", 10);  // Higher number = higher priority
$pq->top();               // Peek
$pq->extract();           // Pop

// Min-Heap Trick:
$pq->insert($node, -$weight);'
    ],
    [
        'tab' => 'ds',
        'title' => 'SplQueue (BFS)',
        'badge' => 'SPL',
        'badgeColor' => 'purple',
        'note' => 'Faster than array_shift/unshift. Use for BFS.',
        'code' => '$q = new SplQueue();
$q->enqueue($start);
while (!$q->isEmpty()) {
    $curr = $q->dequeue();
    foreach ($adj[$curr] as $nb) {
        $q->enqueue($nb);
    }
}'
    ],
    [
        'tab' => 'ds',
        'title' => 'SplFixedArray',
        'badge' => 'SPL',
        'badgeColor' => 'purple',
        'note' => 'Lower memory footprint than standard arrays for large grids.',
        'code' => '$grid = new SplFixedArray($rows);
for ($i=0; $i<$rows; $i++) {
    $grid[$i] = new SplFixedArray($cols);
}'
    ],

    // LC PATTERNS
    [
        'tab' => 'patterns',
        'title' => 'Binary Search',
        'badge' => 'O(log n)',
        'badgeColor' => 'green',
        'note' => 'Use intdiv() to ensure integer middle index.',
        'code' => '$l = 0; $r = count($arr) - 1;
while ($l <= $r) {
    $m = $l + intdiv($r - $l, 2);
    if ($arr[$m] === $target) return $m;
    if ($arr[$m] < $target) $l = $m + 1;
    else $r = $m - 1;
}'
    ],
    [
        'tab' => 'patterns',
        'title' => 'DFS & Recursion',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'Pass variables by reference (&) or use arrow functions for state.',
        'code' => '$visited = [];
$dfs = function($u) use (&$dfs, &$visited, $adj) {
    if (isset($visited[$u])) return;
    $visited[$u] = true;
    foreach ($adj[$u] as $v) {
        $dfs($v);
    }
};
$dfs($start);'
    ],

    // TRICKS & BITS
    [
        'tab' => 'tricks',
        'title' => 'Bit Manipulation',
        'badge' => 'bits',
        'badgeColor' => 'coral',
        'note' => 'Essential for "Power of Two" or "Single Number" problems.',
        'code' => '$n & 1;          // Is odd?
$n >> 1;         // n / 2
$n << 1;         // n * 2
$n & ($n - 1);   // Clear lowest set bit
$a ^ $b;         // XOR
1 << $k;         // 2^k'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Math & Limits',
        'badge' => 'math',
        'badgeColor' => 'amber',
        'note' => 'PHP handles arbitrary precision but stick to INT constants.',
        'code' => 'PHP_INT_MAX;   // 2^63 - 1
PHP_INT_MIN;
INF;           // Infinity
-INF;          // Negative Infinity

abs($n);
fmod(5.2, 2);  // Float remainder
intdiv(10, 3); // 3
max($a, $b);
min(...$arr);  // Spread operator'
    ],
];