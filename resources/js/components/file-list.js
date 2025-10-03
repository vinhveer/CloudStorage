/**
 * File List Component JavaScript
 * Handles file selection and view mode switching
 */

// File List Alpine.js Component
window.fileListComponent = function(viewMode = 'list', filesCount = 0) {
    return {
        currentViewMode: viewMode,
        open: false,
        selectionMode: false,
        selectedItems: [],
        viewModes: {
            'list': { icon: 'fas fa-list', label: 'List View' },
            'grid': { icon: 'fas fa-th', label: 'Grid View' },
            'tiles': { icon: 'fas fa-th-large', label: 'Tiles View' },
            'details': { icon: 'fas fa-align-justify', label: 'Details View' }
        },
        
        getCurrentViewIcon() {
            return this.viewModes[this.currentViewMode]?.icon || 'fas fa-list';
        },
        
        getCurrentViewLabel() {
            return this.viewModes[this.currentViewMode]?.label || 'List View';
        },
        
        changeViewMode(mode) {
            this.currentViewMode = mode;
            // Store preference in localStorage
            localStorage.setItem('fileListViewMode', mode);
        },
        
        toggleSelectionMode() {
            this.selectionMode = !this.selectionMode;
            if (!this.selectionMode) {
                this.selectedItems = [];
            }
        },
        
        toggleItem(index) {
            if (this.selectedItems.includes(index)) {
                this.selectedItems = this.selectedItems.filter(i => i !== index);
            } else {
                this.selectedItems.push(index);
            }
        },
        
        isSelected(index) {
            return this.selectedItems.includes(index);
        },
        
        selectAll() {
            this.selectedItems = [...Array(filesCount).keys()];
        },
        
        deselectAll() {
            this.selectedItems = [];
        },
        
        // Initialize component
        init() {
            // Load saved view mode from localStorage
            const savedViewMode = localStorage.getItem('fileListViewMode');
            if (savedViewMode && this.viewModes[savedViewMode]) {
                this.currentViewMode = savedViewMode;
            }
        }
    };
};
