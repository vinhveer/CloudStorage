/**
 * Form Components JavaScript
 * Handles form interactions and validations
 */

// Switch Toggle Component
window.switchComponent = function(initialState = false) {
    return {
        checked: initialState,
        
        toggle() {
            this.checked = !this.checked;
            // Emit custom event for external listeners
            this.$dispatch('switch-changed', { checked: this.checked });
        },
        
        setValue(value) {
            this.checked = Boolean(value);
        }
    };
};

// File Upload Component with Drag & Drop
window.fileUploadComponent = function() {
    return {
        isDragging: false,
        files: [],
        
        handleDrop(e) {
            e.preventDefault();
            this.isDragging = false;
            this.files = Array.from(e.dataTransfer.files);
            this.$refs.fileInput.files = e.dataTransfer.files;
            
            // Emit custom event
            this.$dispatch('files-selected', { files: this.files });
        },
        
        handleDragOver(e) {
            e.preventDefault();
            this.isDragging = true;
        },
        
        handleDragLeave(e) {
            e.preventDefault();
            this.isDragging = false;
        },
        
        handleFileSelect(e) {
            this.files = Array.from(e.target.files);
            this.$dispatch('files-selected', { files: this.files });
        }
    };
};

// Form Validation Helpers
window.FormHelpers = {
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    },
    
    validateRequired(value) {
        return value !== null && value !== undefined && value.toString().trim() !== '';
    },
    
    validateMinLength(value, minLength) {
        return value && value.toString().length >= minLength;
    },
    
    validateMaxLength(value, maxLength) {
        return !value || value.toString().length <= maxLength;
    }
};
