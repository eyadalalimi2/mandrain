// Admin JS for Mandrain Admin Panel

document.addEventListener('DOMContentLoaded', function () {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Theme Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const themeIcon = themeToggle.querySelector('i');

    // Load theme from localStorage
    const currentTheme = localStorage.getItem('theme') || 'light';
    body.classList.remove('theme-light', 'theme-dark');
    body.classList.add(`theme-${currentTheme}`);
    themeIcon.classList.toggle('fa-sun', currentTheme === 'light');
    themeIcon.classList.toggle('fa-moon', currentTheme === 'dark');

    themeToggle.addEventListener('click', function () {
        const newTheme = body.classList.contains('theme-light') ? 'dark' : 'light';
        body.classList.remove('theme-light', 'theme-dark');
        body.classList.add(`theme-${newTheme}`);
        localStorage.setItem('theme', newTheme);
        themeIcon.classList.toggle('fa-sun');
        themeIcon.classList.toggle('fa-moon');
    });

    // Clear Cache Modal
    const clearCacheBtn = document.getElementById('clear-cache-btn');
    const clearCacheModal = new bootstrap.Modal(document.getElementById('clearCacheModal'));
    const confirmClearCache = document.getElementById('confirm-clear-cache');

    clearCacheBtn.addEventListener('click', function () {
        clearCacheModal.show();
    });

    confirmClearCache.addEventListener('click', function () {
        fetch('/admin/tools/clear-cache', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                clearCacheModal.hide();
                showToast(data.message, data.success ? 'success' : 'error');
            })
            .catch(error => {
                clearCacheModal.hide();
                showToast('حدث خطأ أثناء مسح الكاش', 'error');
            });
    });

    // Mark all notifications as read
    const markAllRead = document.getElementById('mark-all-read');
    markAllRead.addEventListener('click', function (e) {
        e.preventDefault();
        fetch('/admin/notifications/read-all', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                showToast(data.message, data.success ? 'success' : 'error');
                // Update badge
                document.getElementById('notifications-badge').textContent = '0';
            })
            .catch(error => {
                showToast('حدث خطأ', 'error');
            });
    });

    // Toast function
    function showToast(message, type) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        toastMessage.textContent = message;
        toast.classList.remove('bg-success', 'bg-danger');
        toast.classList.add(type === 'success' ? 'bg-success' : 'bg-danger');
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
    }

    // Load messages and notifications (placeholder)
    loadMessages();
    loadNotifications();

    function loadMessages() {
        // Fetch messages from API
        fetch('/admin/messages/latest')
            .then(response => response.json())
            .then(data => {
                // Populate messages dropdown
                const messagesDropdown = document.querySelector('#messagesDropdown + .dropdown-menu');
                const badge = document.getElementById('messages-badge');
                badge.textContent = data.unread_count;
                // Add message items
            });
    }

    function loadNotifications() {
        // Fetch notifications from API
        fetch('/admin/notifications/latest')
            .then(response => response.json())
            .then(data => {
                // Populate notifications dropdown
                const notificationsDropdown = document.querySelector('#notificationsDropdown + .dropdown-menu');
                const badge = document.getElementById('notifications-badge');
                badge.textContent = data.unread_count;
                // Add notification items
            });
    }
});