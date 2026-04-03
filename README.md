# LC_Lib 📚
**The Ultimate Multilingual LeetCode Interview Cheatsheet**

LC_Lib is a high-speed, minimalist Single Page Application (SPA) designed for software engineers preparing for technical interviews. It provides instant access to the most critical syntax, data structures, and algorithmic patterns across the four most popular interview languages.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)

## ✨ Features
- **Zero Latency:** All language data is pre-loaded; switching between Python, JS, Java, and PHP is instantaneous.
- **Deep Linking:** Use hash-based IDs (e.g., `#java`) to bookmark or share specific language sections.
- **Color Science UI:** Optimized for long study sessions with custom Slate-based Dark and Light themes.
- **Mobile Responsive:** Study on the go with a fully responsive Tailwind-powered layout.
- **Clean Syntax:** High-contrast code blocks with logic-specific badges (O(n), BFS, DFS, etc.).

## 🚀 Quick Start

### Hosting on GitHub Pages (Recommended)
This project is built as a static SPA, making it perfect for GitHub Pages.
1. Fork this repository.
2. Ensure your `index.html` is in the root directory.
3. Go to **Settings > Pages** and enable deployment from the `main` branch.

### Local Development
Since the project uses a single-file data architecture, you can run it locally without a complex build step:
```bash
# Clone the repo
git clone [https://github.com/yourusername/lc-lib.git](https://github.com/yourusername/lc-lib.git)

# Open index.html in your browser
# (Optional) Use a local server for the best experience
npx serve .
