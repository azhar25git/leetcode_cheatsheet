<?php

/**
 * Python 3 LeetCode Cheatsheet Data
 * Derived from python3_leetcode_cheatsheet.html
 */

return [
    // CORE PYTHON
    [
        'tab' => 'core',
        'title' => 'List operations',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Most-used list methods — O(1) append/pop, O(n) insert/remove.',
        'code' => 'a = [3,1,4,1,5]
a.append(9)          # [3,1,4,1,5,9]
a.pop()              # returns 9
a.pop(0)             # removes first — O(n)!
a.insert(0, 7)       # O(n)
a.sort()             # in-place Timsort
a.sort(reverse=True)
sorted(a)            # returns new list
a[::-1]              # reversed copy
a[1:4]               # slice [1,4)
len(a), sum(a), min(a), max(a)'
    ],
    [
        'tab' => 'core',
        'title' => 'String tricks',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Strings are immutable. Join is O(n); \'+\' in a loop is O(n²).',
        'code' => 's = "hello world"
s.split()            # [\'hello\',\'world\']
s.split(\',\')
\',\'.join([\'a\',\'b\'])  # \'a,b\'
s.strip()            # trim whitespace
s.replace(\'l\',\'L\')
s.count(\'l\')         # 2
s.startswith(\'he\')   # True
s[::-1]              # reverse string
s.isdigit(), s.isalpha(), s.isalnum()
ord(\'a\')             # 97
chr(97)              # \'a\''
    ],
    [
        'tab' => 'core',
        'title' => 'Dict (hashmap)',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'O(1) average get/set. Ordered since Python 3.7.',
        'code' => 'd = {}
d[\'key\'] = 1
d.get(\'key\', 0)      # safe get, default 0
d.pop(\'key\', None)   # remove safely
\'key\' in d           # O(1) lookup
for k, v in d.items(): ...
list(d.keys()), list(d.values())
d.setdefault(\'k\', []).append(1)  # grouped lists

# word frequency
freq = {}
for c in s:
    freq[c] = freq.get(c, 0) + 1'
    ],
    [
        'tab' => 'core',
        'title' => 'Set operations',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'O(1) lookup. Perfect for \'seen\' tracking and deduplication.',
        'code' => 'seen = set()
seen.add(x)
x in seen           # O(1)
seen.discard(x)     # no error if missing

a = {1,2,3}; b = {2,3,4}
a | b               # union
a & b               # intersection {2,3}
a - b               # difference {1}
a ^ b               # symmetric diff {1,4}

# remove duplicates preserving order:
seen = set(); result = [x for x in arr if not (x in seen or seen.add(x))]'
    ],
    [
        'tab' => 'core',
        'title' => 'Tuple & unpacking',
        'badge' => 'core',
        'badgeColor' => 'blue',
        'note' => 'Immutable, hashable — usable as dict keys and set members.',
        'code' => 't = (1, 2, 3)
a, b, c = t          # unpack
a, *rest = t         # a=1, rest=[2,3]
first, *_, last = t  # first=1, last=3

# swap without temp:
a, b = b, a

# return multiple values:
def minmax(arr): return min(arr), max(arr)
lo, hi = minmax([3,1,4])'
    ],

    // DATA STRUCTURES
    [
        'tab' => 'ds',
        'title' => 'defaultdict',
        'badge' => 'collections',
        'badgeColor' => 'purple',
        'note' => 'Auto-initializes missing keys. Saves tons of boilerplate.',
        'code' => 'from collections import defaultdict

graph = defaultdict(list)     # adjacency list
graph[0].append(1)

freq = defaultdict(int)       # frequency count
for c in "hello": freq[c] += 1

groups = defaultdict(list)    # group anagrams
for w in words: groups[tuple(sorted(w))].append(w)

nested = defaultdict(lambda: defaultdict(int))'
    ],
    [
        'tab' => 'ds',
        'title' => 'Counter',
        'badge' => 'collections',
        'badgeColor' => 'purple',
        'note' => 'Frequency counting in one line. Supports arithmetic.',
        'code' => 'from collections import Counter

c = Counter("abracadabra")
c.most_common(2)       # [(\'a\',5),(\'b\',2)]
c[\'z\']                 # 0 (no KeyError)
c + Counter("aab")    # merge counts
c - Counter("aab")    # subtract
list(c.elements())     # expand with repetition

# anagram check:
Counter(s1) == Counter(s2)'
    ],
    [
        'tab' => 'ds',
        'title' => 'deque (double-ended queue)',
        'badge' => 'collections',
        'badgeColor' => 'purple',
        'note' => 'O(1) append/pop on both ends. Use for BFS queues, sliding windows.',
        'code' => 'from collections import deque

q = deque()
q.append(1)        # right push
q.appendleft(0)   # left push
q.pop()           # right pop
q.popleft()       # left pop — O(1)!
deque([1,2,3], maxlen=3)  # sliding window

# BFS template:
q = deque([start])
while q:
    node = q.popleft()
    for nb in graph[node]: q.append(nb)'
    ],
    [
        'tab' => 'ds',
        'title' => 'heapq (min-heap)',
        'badge' => 'heapq',
        'badgeColor' => 'coral',
        'note' => 'Python only has min-heap. Negate values for max-heap.',
        'code' => 'import heapq

h = []
heapq.heappush(h, 3)
heapq.heappush(h, 1)
heapq.heappop(h)        # 1 (smallest)
h[0]                    # peek without pop
heapq.heapify(arr)      # in-place O(n)
heapq.nlargest(k, arr)
heapq.nsmallest(k, arr)

# max-heap trick:
heapq.heappush(h, -val)
-heapq.heappop(h)

# heap of tuples (priority, item):
heapq.heappush(h, (dist, node))  # Dijkstra pattern'
    ],
    [
        'tab' => 'ds',
        'title' => 'bisect (binary search)',
        'badge' => 'bisect',
        'badgeColor' => 'amber',
        'note' => 'O(log n) insert position in a sorted list.',
        'code' => 'import bisect

a = [1,3,5,7,9]
bisect.bisect_left(a, 5)   # 2 (leftmost idx)
bisect.bisect_right(a, 5)  # 3 (after 5)
bisect.insort(a, 6)        # insert & keep sorted

# search in sorted list:
def search(a, x):
    i = bisect.bisect_left(a, x)
    return i < len(a) and a[i] == x

# count elements in range [lo, hi]:
bisect.bisect_right(a, hi) - bisect.bisect_left(a, lo)'
    ],

    // LC PATTERNS
    [
        'tab' => 'patterns',
        'title' => 'Two pointers',
        'badge' => 'O(n)',
        'badgeColor' => 'green',
        'note' => 'Use on sorted arrays to find pairs/triplets, or on strings for in-place edits.',
        'code' => '# two-sum in sorted array:
l, r = 0, len(arr) - 1
while l < r:
    s = arr[l] + arr[r]
    if s == target: return [l, r]
    elif s < target: l += 1
    else: r -= 1

# remove duplicates in-place:
k = 1
for i in range(1, len(nums)):
    if nums[i] != nums[i-1]:
        nums[k] = nums[i]; k += 1
return k'
    ],
    [
        'tab' => 'patterns',
        'title' => 'Sliding window',
        'badge' => 'O(n)',
        'badgeColor' => 'green',
        'note' => 'Fixed or variable window over array/string. Expand right, shrink left.',
        'code' => '# longest substring without repeating:
seen = {}; l = res = 0
for r, c in enumerate(s):
    if c in seen and seen[c] >= l:
        l = seen[c] + 1
    seen[c] = r
    res = max(res, r - l + 1)

# fixed window of size k (max sum):
win = sum(arr[:k]); best = win
for i in range(k, len(arr)):
    win += arr[i] - arr[i-k]
    best = max(best, win)'
    ],
    [
        'tab' => 'patterns',
        'title' => 'Binary search',
        'badge' => 'O(log n)',
        'badgeColor' => 'green',
        'note' => 'Think: find the leftmost position where condition is True.',
        'code' => '# classic:
l, r = 0, len(arr) - 1
while l <= r:
    m = (l + r) >> 1        # no overflow
    if arr[m] == t: return m
    elif arr[m] < t: l = m + 1
    else: r = m - 1

# binary search on answer space:
def feasible(mid): ...   # returns bool
l, r = lo, hi
while l < r:
    m = (l + r) // 2
    if feasible(m): r = m
    else: l = m + 1
return l'
    ],
    [
        'tab' => 'patterns',
        'title' => 'DFS template',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'Works for trees and graphs. Always track visited for graphs.',
        'code' => '# recursive:
def dfs(node, visited):
    if node in visited: return
    visited.add(node)
    for nb in graph[node]:
        dfs(nb, visited)

# iterative (stack):
stack = [start]; visited = {start}
while stack:
    node = stack.pop()
    for nb in graph[node]:
        if nb not in visited:
            visited.add(nb); stack.append(nb)

# grid DFS (4-directional):
dirs = [(0,1),(0,-1),(1,0),(-1,0)]'
    ],
    [
        'tab' => 'patterns',
        'title' => 'BFS / level-order',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'Shortest path in unweighted graphs. Level-by-level = BFS.',
        'code' => 'from collections import deque

def bfs(start):
    q = deque([(start, 0)])   # (node, dist)
    visited = {start}
    while q:
        node, d = q.popleft()
        if node == target: return d
        for nb in graph[node]:
            if nb not in visited:
                visited.add(nb)
                q.append((nb, d+1))

# level-order tree traversal:
while q:
    for _ in range(len(q)):
        node = q.popleft()
        for child in [node.left, node.right]:
            if child: q.append(child)'
    ],
    [
        'tab' => 'patterns',
        'title' => 'DP patterns',
        'badge' => 'O(n²)',
        'badgeColor' => 'green',
        'note' => '1D, 2D and top-down memoization. Start with recursion, add cache.',
        'code' => '# memoization decorator (top-down):
from functools import lru_cache

@lru_cache(maxsize=None)
def dp(i, j): ...

# 1D (climbing stairs):
dp = [0] * (n+1)
dp[0] = dp[1] = 1
for i in range(2, n+1): dp[i] = dp[i-1] + dp[i-2]

# 2D (longest common subseq):
dp = [[0]*(m+1) for _ in range(n+1)]
for i in range(1,n+1):
  for j in range(1,m+1):
    if a[i-1]==b[j-1]: dp[i][j]=dp[i-1][j-1]+1
    else: dp[i][j]=max(dp[i-1][j],dp[i][j-1])'
    ],
    [
        'tab' => 'patterns',
        'title' => 'Union-Find (DSU)',
        'badge' => 'graph',
        'badgeColor' => 'teal',
        'note' => 'O(α(n)) ≈ O(1) per op. Use for connected components, cycle detection.',
        'code' => 'parent = list(range(n))
rank = [0] * n

def find(x):
    if parent[x] != x:
        parent[x] = find(parent[x])  # path compression
    return parent[x]

def union(x, y):
    px, py = find(x), find(y)
    if px == py: return False  # already connected
    if rank[px] < rank[py]: px, py = py, px
    parent[py] = px
    if rank[px] == rank[py]: rank[px] += 1
    return True'
    ],

    // LIBRARIES
    [
        'tab' => 'libs',
        'title' => 'itertools essentials',
        'badge' => 'itertools',
        'badgeColor' => 'coral',
        'note' => 'Lazy iterators — no memory overhead. Invaluable for combinatorics.',
        'code' => 'from itertools import *

combinations([1,2,3], 2)     # (1,2)(1,3)(2,3)
permutations([1,2,3])          # all 6 orders
product([0,1], repeat=3)       # 2^3 combos
chain([1,2], [3,4])            # flatten iterables
accumulate([1,2,3,4])          # [1,3,6,10] prefix sums
groupby(sorted(arr), key=lambda x: x)
islice(iterable, 5)             # first 5 items
zip_longest([1,2],[3], fillvalue=0)'
    ],
    [
        'tab' => 'libs',
        'title' => 'math module',
        'badge' => 'math',
        'badgeColor' => 'amber',
        'note' => 'Faster than writing these yourself.',
        'code' => 'import math

math.gcd(12, 8)       # 4
math.lcm(4, 6)        # 12 (Python 3.9+)
math.sqrt(16)         # 4.0 (float)
math.isqrt(17)        # 4 (int floor)
math.ceil(4.2)        # 5
math.floor(4.9)       # 4
math.log(8, 2)        # 3.0
math.inf               # float infinity
math.comb(5, 2)       # 10 (nCr)
math.factorial(5)     # 120
float(\'inf\'), -float(\'inf\')  # also works'
    ],
    [
        'tab' => 'libs',
        'title' => 'functools',
        'badge' => 'functools',
        'badgeColor' => 'amber',
        'note' => 'lru_cache alone saves hours in LC problems.',
        'code' => 'from functools import lru_cache, reduce, cmp_to_key

# top-down DP memoization:
@lru_cache(maxsize=None)
def fib(n):
    if n <= 1: return n
    return fib(n-1) + fib(n-2)

# reduce:
reduce(lambda a,b: a*b, [1,2,3,4])  # 24

# custom sort comparator:
import functools
arr.sort(key=cmp_to_key(lambda a,b: 1 if a>b else -1))'
    ],

    // TRICKS & ONE-LINERS
    [
        'tab' => 'tricks',
        'title' => 'List comprehensions & generators',
        'badge' => 'pythonic',
        'badgeColor' => 'purple',
        'note' => 'Use generators () when you only need to iterate once — saves memory.',
        'code' => '# list comp:
[x*x for x in range(10) if x%2==0]

# 2D grid:
grid = [[0]*cols for _ in range(rows)]

# flatten:
flat = [x for row in grid for x in row]

# dict comp:
{v: i for i, v in enumerate(arr)}

# generator (lazy):
gen = (x*x for x in range(1000000))
sum(gen)  # no list created!'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Sorting tricks',
        'badge' => 'pythonic',
        'badgeColor' => 'purple',
        'note' => 'Python\'s sort is stable. Key functions are clean and fast.',
        'code' => '# by length then alpha:
words.sort(key=lambda w: (len(w), w))

# descending:
arr.sort(key=lambda x: -x)

# sort by second element of tuple:
pairs.sort(key=lambda x: x[1])

# argsort (get indices):
sorted(range(len(a)), key=lambda i: a[i])

# largest number from digits (LC 179):
from functools import cmp_to_key
nums.sort(key=cmp_to_key(lambda a,b: 1 if str(a)+str(b) > str(b)+str(a) else -1), reverse=True)'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Useful one-liners',
        'badge' => 'tricks',
        'badgeColor' => 'coral',
        'note' => 'Muscle memory for contest speed.',
        'code' => '# prefix sums:
pre = [0] + list(accumulate(arr))

# matrix transpose:
T = list(zip(*matrix))

# rotate matrix 90° clockwise:
rotated = [list(row) for row in zip(*matrix[::-1])]

# all() / any():
all(x > 0 for x in arr)
any(x == 0 for x in arr)

# enumerate & zip:
for i, val in enumerate(arr, start=1): ...
for a, b in zip(arr1, arr2): ...

# int limits:
INT_MAX = float(\'inf\')  # or 2**31-1

# divmod:
q, r = divmod(17, 5)  # q=3, r=2'
    ],
    [
        'tab' => 'tricks',
        'title' => 'Bit manipulation',
        'badge' => 'bits',
        'badgeColor' => 'coral',
        'note' => 'XOR, shifts, and masks. Essential for medium/hard LC problems.',
        'code' => 'n & 1           # check odd/even (1=odd)
n >> 1           # floor divide by 2
n << 1           # multiply by 2
n & (n-1)        # clear lowest set bit
n & -n           # isolate lowest set bit
n ^ n            # 0 (XOR with itself)
a ^ b ^ a        # = b (XOR cancel)
bin(n).count(\'1\') # popcount
1 << k           # 2^k
n | (1 << k)    # set bit k
n & ~(1 << k)   # clear bit k
(n >> k) & 1    # get bit k'
    ],
];
