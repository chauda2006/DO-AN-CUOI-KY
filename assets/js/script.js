const themeToggle = document.getElementById('themeToggle');

// 1. Kiểm tra lựa chọn giao diện cũ của người dùng từ bộ nhớ trình duyệt
const currentTheme = localStorage.getItem('theme');
if (currentTheme === 'dark') {
    document.documentElement.setAttribute('data-theme', 'dark');
    themeToggle.textContent = '☀️ Chế độ sáng';
}

// 2. Xử lý sự kiện khi người dùng click vào nút
themeToggle.addEventListener('click', () => {
    let theme = document.documentElement.getAttribute('data-theme');
    
    if (theme === 'dark') {
        document.documentElement.removeAttribute('data-theme');
        themeToggle.textContent = '🌙 Chế độ tối';
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.setAttribute('data-theme', 'dark');
        themeToggle.textContent = '☀️ Chế độ sáng';
        localStorage.setItem('theme', 'dark');
    }
});