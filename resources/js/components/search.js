/**
 * Search Component JavaScript
 * Handles search functionality with debounce
 */

// Search Component with Debounce
window.searchComponent = function() {
    return {
        query: '',
        results: [],
        showResults: false,
        isLoading: false,
        debounceTimer: null,
        
        init() {
            console.log('Search component initialized');
        },
        
        handleSearch() {
            console.log('handleSearch called with query:', this.query);
            
            // Clear existing timer
            if (this.debounceTimer) {
                clearTimeout(this.debounceTimer);
            }
            
            // Set new timer
            this.debounceTimer = setTimeout(() => {
                this.performSearch();
            }, 300);
        },
        
        async performSearch() {
            const query = this.query.trim();
            console.log('performSearch called with query:', query);
            
            if (query.length < 2) {
                this.results = [];
                this.showResults = false;
                return;
            }
            
            this.isLoading = true;
            this.showResults = true;
            
            try {
                // Simulate API call - replace with actual search endpoint
                const response = await this.mockSearchAPI(query);
                this.results = response;
                console.log('Search results:', this.results);
                
                // Always show results container if we have a query, even if empty
                this.showResults = true;
            } catch (error) {
                console.error('Search error:', error);
                this.results = [];
                this.showResults = true;
            } finally {
                this.isLoading = false;
            }
        },
        
        // Mock search API - replace with actual implementation
        async mockSearchAPI(query) {
            console.log('mockSearchAPI called with query:', query);
            
            // Simulate network delay
            await new Promise(resolve => setTimeout(resolve, 200));
            
            // Mock search results
            const mockData = [
                { id: 1, title: 'Documents', description: 'All your documents', icon: 'fas fa-folder', url: '#' },
                { id: 2, title: 'Images', description: 'Photo gallery', icon: 'fas fa-images', url: '#' },
                { id: 3, title: 'Videos', description: 'Video files', icon: 'fas fa-video', url: '#' },
                { id: 4, title: 'Settings', description: 'Account settings', icon: 'fas fa-cog', url: '#' },
                { id: 5, title: 'Shared Files', description: 'Files shared with you', icon: 'fas fa-share', url: '#' }
            ];
            
            const filtered = mockData.filter(item => 
                item.title.toLowerCase().includes(query.toLowerCase()) ||
                item.description.toLowerCase().includes(query.toLowerCase())
            );
            
            console.log('Filtered results:', filtered);
            return filtered;
        }
    };
};
