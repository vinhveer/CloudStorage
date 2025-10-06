/**
 * UI Components JavaScript
 * General UI interactions and utilities
 */

// Account Dropdown Component
window.accountDropdownComponent = function(userName = 'User', userEmail = 'user@example.com') {
    return {
        open: false,
        userName: userName,
        userEmail: userEmail,
        
        getInitials() {
            const nameParts = this.userName.split(' ');
            let initials = '';
            for (const part of nameParts) {
                if (part.trim()) {
                    initials += part.charAt(0).toUpperCase();
                }
            }
            return initials.substring(0, 2);
        },
        
        toggle() {
            this.open = !this.open;
        },
        
        close() {
            this.open = false;
        }
    };
};

// Sidebar Component
window.sidebarComponent = function(activeItem = 'home') {
    return {
        activeItem: activeItem,
        
        setActive(item) {
            this.activeItem = item;
            // Store in localStorage
            localStorage.setItem('sidebarActiveItem', item);
        },
        
        init() {
            // Load saved active item
            const savedItem = localStorage.getItem('sidebarActiveItem');
            if (savedItem) {
                this.activeItem = savedItem;
            }
        }
    };
};

// Offcanvas Component
window.offcanvasComponent = function(id) {
    return {
        open: false,
        id: id,
        
        show() {
            this.open = true;
            document.body.style.overflow = 'hidden';
        },
        
        hide() {
            this.open = false;
            document.body.style.overflow = '';
        },
        
        toggle() {
            if (this.open) {
                this.hide();
            } else {
                this.show();
            }
        },
        
        init() {
            // Listen for global offcanvas events
            this.$watch('open', (value) => {
                if (value) {
                    // Close other offcanvas panels
                    window.dispatchEvent(new CustomEvent('offcanvas-opened', { 
                        detail: { id: this.id } 
                    }));
                }
            });
        }
    };
};

// Global event listeners for offcanvas
document.addEventListener('alpine:init', () => {
    window.addEventListener('offcanvas-opened', (e) => {
        // Close all other offcanvas panels
        const openPanels = document.querySelectorAll('[x-data*="offcanvasComponent"]');
        openPanels.forEach(panel => {
            const alpineData = Alpine.$data(panel);
            if (alpineData && alpineData.id !== e.detail.id && alpineData.open) {
                alpineData.hide();
            }
        });
    });
});

// Utility functions
window.UIHelpers = {
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
};

window.UIHelpers.scrollTo = function(elementId, offset = 0) {
    const element = document.getElementById(elementId);
    if (element) {
        const top = element.offsetTop - offset;
        window.scrollTo({ top, behavior: 'smooth' });
    }
};

// Copy text to clipboard
window.UIHelpers.copyToClipboard = async function(text) {
        try {
            await navigator.clipboard.writeText(text);
            return true;
        } catch (err) {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            const successful = document.execCommand('copy');
            document.body.removeChild(textArea);
            return successful;
    }
};

// Format file size
window.UIHelpers.formatFileSize = function(bytes) {
    if (bytes === 0) return '0 Bytes';
        const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
};

// Format date
window.UIHelpers.formatDate = function(date, options = {}) {
    const defaultOptions = {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    };
    return new Intl.DateTimeFormat('en-US', { ...defaultOptions, ...options }).format(new Date(date));
};
