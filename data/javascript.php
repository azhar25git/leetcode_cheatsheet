<?php

/**
 * JavaScript (Node.js) LeetCode Cheatsheet Data
 */

return [
    // CORE JAVASCRIPT
    [
        'tab' => 'core',
        'title' => 'Array operations',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Arrays in JS are dynamic. Note: shift/unshift are O(n).',
        'code' => 'const a = [3, 1, 4];
a.push(9);           // [3, 1, 4, 9] - O(1)
a.pop();            // returns 9 - O(1)
a.shift();          // removes first - O(n)
a.unshift(7);       // adds to front - O(n)

// Sorting (Important: default is lexicographical!)
a.sort((x, y) => x - y); // Numeric ascending
a.reverse();             // In-place reverse

const slice = a.slice(1, 3); // Copy [1, 3)
a.splice(1, 1, \'new\');     // Remove/Replace at index 1'
    ],
    [
        'tab' => 'core',
        'title' => 'String manipulation',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Strings are immutable. Use arrays for heavy building.',
        'code' => 'const s = "hello";
s.split("");         // ["h", "e", "l", "l", "o"]
s.substring(1, 4);   // "ell"
s.charAt(0);         // "h"
s.charCodeAt(0);     // 104 (\'a\' is 97)
String.fromCharCode(97); // "a"

// Building a string efficiently:
const res = [];
for (let c of s) res.push(c);
res.join("");'
    ],
    [
        'tab' => 'core',
        'title' => 'Map (Hash Map)',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Preferred over {} for LeetCode to avoid prototype collisions and for better performance.',
        'code' => 'const map = new Map();
map.set("key", 1);
map.get("key");      // 1
map.has("key");      // true - O(1)
map.delete("key");
map.size;            // Count

// Iterating
for (let [key, val] of map) { ... }

// Frequency map shorthand:
map.set(x, (map.get(x) || 0) + 1);'
    ],
    [
        'tab' => 'core',
        'title' => 'Set (Hash Set)',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Unique values only. O(1) lookups.',
        'code' => 'const seen = new Set();
seen.add(x);
seen.has(x);         // true
seen.delete(x);
seen.size;

// Deduplicate array:
const unique = [...new Set(arr)];'
    ],

    // DATA STRUCTURES
    [
        'tab' => 'ds',
        'title' => 'Priority Queue (Heap)',
        'badge' => 'built-in*',
        'badgeColor' => 'purple',
        'note' => 'JS has no native Heap, but LeetCode includes @datastructures-js/priority-queue.',
        'code' => '// Min Priority Queue
const minPQ = new MinPriorityQueue(); 
minPQ.enqueue(10);
minPQ.front().element; // Peek: 10
minPQ.dequeue().element; // Pop: 10

// With custom priority (objects):
const pq = new MaxPriorityQueue({ priority: x => x.val });
pq.enqueue({ val: 5, id: "A" });
pq.size();'
    ],
    [
        'tab' => 'ds',
        'title' => 'Queue (BFS)',
        'badge' => 'logic',
        'badgeColor' => 'purple',
        'note' => 'Use a simple array with a pointer or shift() for small inputs. For O(1) use a real Queue.',
        'code' => '// Array as Queue (O(n) shift)
const q = [startNode];
while (q.length > 0) {
    const node = q.shift();
    // ... process
}

// Optimization for large BFS:
let head = 0;
const q = [start];
while (head < q.length) {
    const node = q[head++];
    // ... add neighbors to q
}'
    ],

    // LC PATTERNS
    [
        'tab' => 'patterns',
        'title' => 'Binary Search',
        'badge' => 'O(log n)',
        'badgeColor' => 'green',
        'note' => 'Prevent overflow with Math.floor.',
        'code' => 'let l = 0, r = nums.length - 1;
while (l <= r) {
    const m = l + Math.floor((r - l) / 2);
    if (nums[m] === target) return m;
    if (nums[m] < target) l = m + 1;
    else r = m - 1;
}'
    ],
    [
        'tab' => 'patterns',
        'title' => 'Sliding Window',
        'badge' => 'O(n)',
        'badgeColor' => 'green',
        'note' => 'Standard template for subarray problems.',
        'code' => 'let l = 0, res = 0;
for (let r = 0; r < nums.length; r++) {
    // 1. Add nums[r] to state
    while (conditionViolated) {
        // 2. Remove nums[l], l++
        l++;
    }
    // 3. Update result
    res = Math.max(res, r - l + 1);
}'
    ],
    [
        'tab' => 'patterns',
        'title' => 'DFS (Recursion)',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'Use a Set for visited nodes in graphs.',
        'code' => 'const dfs = (node, visited) => {
    if (!node || visited.has(node)) return;
    visited.add(node);
    for (let neighbor of node.neighbors) {
        dfs(neighbor, visited);
    }
};'
    ],

    // TRICKS & ONE-LINERS
    [
        'tab' => 'tricks',
        'title' => 'Math & Limits',
        'badge' => 'tricks',
        'badgeColor' => 'coral',
        'note' => 'JS numeric limits.',
        'code' => 'Math.max(...arr);      // Max of array
Math.min(...arr);      // Min of array
Number.MAX_SAFE_INTEGER; // 2^53 - 1
-Number.MAX_VALUE;     // -Infinity substitute
Math.floor(5 / 2);     // 2 (Integer division)
Math.trunc(-5 / 2);    // -2 (Removes decimals)'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Bitwise Ops',
        'badge' => 'bits',
        'badgeColor' => 'coral',
        'note' => 'Operates on 32-bit signed integers.',
        'code' => '5 & 1;          // 1 (Check odd)
5 >> 1;         // 2 (Divide by 2)
1 << 3;         // 8 (2^3)
n.toString(2);  // To binary string
parseInt("101", 2); // From binary'
    ],
];
