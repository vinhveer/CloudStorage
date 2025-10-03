/**
 * Modal Component JavaScript
 */

// Global modal functions
window.openModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
    }
};

window.closeModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
};

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('bg-black/30') || 
        event.target.classList.contains('backdrop-blur-sm')) {
        const modal = event.target.closest('[id^="modal-"]');
        if (modal) {
            modal.classList.add('hidden');
        }
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const visibleModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
        visibleModals.forEach(modal => {
            modal.classList.add('hidden');
        });
    }
});
