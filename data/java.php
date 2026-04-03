<?php
/**
 * Java LeetCode Cheatsheet Data
 */

return [
    // CORE JAVA & STRINGS
    [
        'tab' => 'core',
        'title' => 'String & StringBuilder',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Strings are immutable. Always use StringBuilder for modifications to stay O(N).',
        'code' => 'String s = "leetcode";
s.length();
s.charAt(0);
s.substring(0, 4); // "leet"
s.toCharArray();
String.valueOf(123); // int to String

// StringBuilder (Mutable)
StringBuilder sb = new StringBuilder();
sb.append("a");
sb.insert(0, "start");
sb.deleteCharAt(sb.length() - 1);
sb.reverse();
String result = sb.toString();'
    ],
    [
        'tab' => 'core',
        'title' => 'Arrays & Sorting',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Fixed-size arrays. Arrays.sort() uses Dual-Pivot Quicksort O(n log n).',
        'code' => 'int[] arr = new int[10];
int n = arr.length;
Arrays.sort(arr);
Arrays.fill(arr, -1);
int[] copy = Arrays.copyOf(arr, arr.length);

// 2D Arrays
int[][] matrix = new int[rows][cols];

// List to Array (Object types)
Integer[] array = list.toArray(new Integer[0]);'
    ],

    // DATA STRUCTURES (COLLECTIONS)
    [
        'tab' => 'ds',
        'title' => 'ArrayList (Dynamic Array)',
        'badge' => 'util',
        'badgeColor' => 'purple',
        'note' => 'O(1) access, O(n) deletions/insertions at arbitrary positions.',
        'code' => 'List<Integer> list = new ArrayList<>();
list.add(1);
list.get(0);
list.set(0, 5); // replace
list.size();
list.isEmpty();
Collections.sort(list);
Collections.reverse(list);'
    ],
    [
        'tab' => 'ds',
        'title' => 'HashMap & HashSet',
        'badge' => 'util',
        'badgeColor' => 'purple',
        'note' => 'O(1) average time for basic operations. Use for frequency counting.',
        'code' => 'Map<Integer, Integer> map = new HashMap<>();
map.put(key, val);
map.getOrDefault(key, 0);
map.containsKey(key);
map.remove(key);

// Iterating
for (Map.Entry<Integer, Integer> entry : map.entrySet()) {
    entry.getKey(); entry.getValue();
}

// HashSet
Set<Integer> set = new HashSet<>();
set.add(1);
set.contains(1);'
    ],
    [
        'tab' => 'ds',
        'title' => 'Deque (Stack/Queue)',
        'badge' => 'util',
        'badgeColor' => 'purple',
        'note' => 'Use ArrayDeque instead of Stack class. It is faster and not synchronized.',
        'code' => 'Deque<Integer> dq = new ArrayDeque<>();

// As Queue (BFS)
dq.offer(1); // add to tail
dq.poll();   // remove from head
dq.peek();   // look at head

// As Stack (DFS)
dq.push(1);  // add to head
dq.pop();    // remove from head'
    ],
    [
        'tab' => 'ds',
        'title' => 'PriorityQueue (Heap)',
        'badge' => 'util',
        'badgeColor' => 'coral',
        'note' => 'Min-heap by default. Use lambda for Max-heap or custom sorting.',
        'code' => '// Min-Heap
PriorityQueue<Integer> minHeap = new PriorityQueue<>();

// Max-Heap
PriorityQueue<Integer> maxHeap = new PriorityQueue<>((a, b) -> b - a);

minHeap.add(10);
minHeap.peek(); // smallest
minHeap.poll(); // remove smallest'
    ],

    // ALGORITHMIC PATTERNS
    [
        'tab' => 'patterns',
        'title' => 'Binary Search',
        'badge' => 'O(log n)',
        'badgeColor' => 'green',
        'note' => 'Standard template. mid = low + (high-low)/2 prevents integer overflow.',
        'code' => 'int low = 0, high = nums.length - 1;
while (low <= high) {
    int mid = low + (high - low) / 2;
    if (nums[mid] == target) return mid;
    else if (nums[mid] < target) low = mid + 1;
    else high = mid - 1;
}'
    ],
    [
        'tab' => 'patterns',
        'title' => 'BFS (Level Order)',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'Queue based traversal. Processes nodes level by level.',
        'code' => 'Queue<TreeNode> q = new LinkedList<>();
q.offer(root);
while (!q.isEmpty()) {
    int levelSize = q.size();
    for (int i = 0; i < levelSize; i++) {
        TreeNode curr = q.poll();
        if (curr.left != null) q.offer(curr.left);
        if (curr.right != null) q.offer(curr.right);
    }
}'
    ],

    // TRICKS & SYNTAX
    [
        'tab' => 'tricks',
        'title' => 'Custom Comparators',
        'badge' => 'syntax',
        'badgeColor' => 'amber',
        'note' => 'Lambda syntax for sorting intervals or complex objects.',
        'code' => '// Sort 2D array by first column
Arrays.sort(intervals, (a, b) -> Integer.compare(a[0], b[0]));

// Sort by value then key
list.sort((a, b) -> {
    if (a.val != b.val) return b.val - a.val;
    return a.key.compareTo(b.key);
});'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Math & Limits',
        'badge' => 'static',
        'badgeColor' => 'amber',
        'note' => 'Essential constants and Math functions.',
        'code' => 'Integer.MAX_VALUE; // 2^31 - 1
Integer.MIN_VALUE; // -2^31
Math.max(a, b);
Math.min(a, b);
Math.abs(-5);
Math.pow(base, exp);
Math.sqrt(16);'
    ],
];