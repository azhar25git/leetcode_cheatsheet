<?php
// Load all data arrays once from the data folder
$data = [
    'python' => include __DIR__ . '/data/python.php',
    'javascript' => include __DIR__ . '/data/javascript.php',
    'java' => include __DIR__ . '/data/java.php',
    'php' => include __DIR__ . '/data/php.php',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LC_Lib | Universal Cheatsheet</title>
    
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        theme: {
                            main: 'var(--bg-main)',
                            nav: 'var(--bg-nav)',
                            card: 'var(--bg-card)',
                            code: 'var(--bg-code)',
                            border: 'var(--border)',
                            accent: 'var(--accent)',
                            text: 'var(--text-main)',
                            muted: 'var(--text-muted)',
                        }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], mono: ['Fira Code', 'monospace'] }
                }
            }
        }
    </script>
</head>
<body class="flex flex-col min-h-screen font-sans bg-theme-main text-theme-text transition-colors duration-150">

    <nav class="sticky top-0 z-50 bg-theme-nav border-b border-theme-border px-6 h-16 grid grid-cols-3 items-center">
        <div class="justify-self-start">
            <a href="#python" class="font-mono font-black text-theme-accent tracking-tighter text-xl uppercase italic">
                LC_Lib
            </a>
        </div>

        <div class="justify-self-center hidden md:flex items-center gap-1 bg-theme-main p-1 border border-theme-border rounded-lg">
            <?php foreach(array_keys($data) as $lang): ?>
                <a href="#<?= $lang ?>" id="nav-<?= $lang ?>" 
                   class="nav-link px-4 py-1.5 font-mono text-[10px] uppercase tracking-widest transition-all rounded-md">
                    <?= $lang === 'javascript' ? 'JS' : strtoupper($lang) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="justify-self-end">
            <button onclick="toggleTheme()" class="w-10 h-10 flex items-center justify-center rounded-lg border border-theme-border text-theme-text hover:border-theme-accent transition-colors">
                <span id="theme-icon">🌙</span>
            </button>
        </div>
    </nav>

    <main class="container mx-auto max-w-4xl px-4 py-12 flex-grow">
        <header class="mb-12 border-l-[6px] border-theme-accent pl-8">
            <h1 id="page-title" class="font-mono text-5xl font-black text-theme-text tracking-tighter uppercase italic">PYTHON</h1>
            <p class="text-theme-muted text-sm font-medium mt-2">Instant reference for algorithmic syntax and patterns.</p>
        </header>

        <div id="cheatsheet-container" class="grid gap-4">
            </div>
    </main>

    <footer class="border-t border-theme-border p-8 text-center text-theme-muted font-mono text-[10px] uppercase tracking-widest">
        Optimized for LeetCode Prep &copy; <?= date('Y') ?>
    </footer>

    <script>
        const ALL_DATA = <?= json_encode($data) ?>;

        /**
         * Core Routing Logic
         */
        function handleRouting() {
            // Get hash from URL (e.g., #java), default to #python
            const hash = window.location.hash.replace('#', '') || 'python';
            const validLangs = Object.keys(ALL_DATA);
            
            const targetLang = validLangs.includes(hash) ? hash : 'python';
            
            updateUI(targetLang);
            renderCards(targetLang);
        }

        function updateUI(lang) {
            // Update Title
            document.getElementById('page-title').innerText = lang === 'javascript' ? 'JAVASCRIPT' : lang.toUpperCase();
            
            // Update Nav Active State
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('bg-theme-accent', 'text-theme-main');
                link.classList.add('text-theme-muted');
            });
            
            const activeLink = document.getElementById('nav-' + lang);
            if (activeLink) {
                activeLink.classList.add('bg-theme-accent', 'text-theme-main');
                activeLink.classList.remove('text-theme-muted');
            }
        }

        function renderCards(lang) {
            const container = document.getElementById('cheatsheet-container');
            const items = ALL_DATA[lang] || [];
            
            container.innerHTML = items.map((item, index) => `
                <div class="bg-theme-card border border-theme-border rounded-lg overflow-hidden transition-all shadow-sm">
                    <div class="px-6 py-4 flex items-center justify-between cursor-pointer group select-none" onclick="toggleCard(${index})">
                        <div class="flex items-center gap-4">
                            <span class="text-[9px] font-bold px-2 py-0.5 border border-theme-accent text-theme-accent uppercase tracking-tighter">
                                ${item.badge}
                            </span>
                            <span class="text-theme-text font-bold text-sm tracking-tight group-hover:text-theme-accent transition-colors">
                                ${item.title}
                            </span>
                        </div>
                        <svg id="icon-${index}" class="w-4 h-4 text-theme-muted group-hover:text-theme-accent transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div id="body-${index}" class="hidden px-6 pb-6 border-t border-theme-border bg-theme-nav/10">
                        <div class="py-4">
                            <p class="text-theme-muted text-xs font-mono mb-4 leading-relaxed uppercase tracking-tighter">
                                // ${item.note}
                            </p>
                            <pre class="bg-theme-code p-5 rounded border border-theme-border text-[13px] leading-relaxed font-mono text-theme-text overflow-x-auto"><code>${escapeHtml(item.code)}</code></pre>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function toggleCard(id) {
            const body = document.getElementById('body-' + id);
            const icon = document.getElementById('icon-' + id);
            body.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Listen for back/forward button and link clicks
        window.onhashchange = handleRouting;

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', handleRouting);
    </script>
    <script src="/js/main.js"></script>
</body>
</html>