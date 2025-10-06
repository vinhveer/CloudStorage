@extends('layout.app-layout')

@section('title', 'Alert & Card Components')

@php
    $navbarTitle = 'Component Testing';
    $activeSidebarItem = 'components';
@endphp

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Alert & Card Components</h1>
        <p class="text-gray-600 mt-2">Testing the new Alert/Notification and Card components</p>
    </div>

    <!-- Alert Components Section -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-900">Alert Components</h2>
        
        <!-- Success Alert -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Success Alert</h3>
            <x-ui.alert type="success" 
                       title="Account Created!" 
                       message="Your account has been successfully created and verified." />
        </div>
        
        <!-- Error Alert -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Error Alert</h3>
            <x-ui.alert type="error" 
                       title="Login Failed" 
                       message="Invalid email or password. Please try again." />
        </div>
        
        <!-- Warning Alert -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Warning Alert</h3>
            <x-ui.alert type="warning" 
                       title="Storage Almost Full" 
                       message="You've used 90% of your storage space. Consider upgrading your plan." />
        </div>
        
        <!-- Info Alert -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Info Alert</h3>
            <x-ui.alert type="info" 
                       title="System Maintenance" 
                       message="Scheduled maintenance will occur tonight from 2:00 AM to 4:00 AM." />
        </div>
        
        <!-- Custom Alert with Slot -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Custom Alert with Slot</h3>
            <x-ui.alert type="success" title="Update Available">
                <p>A new version of CloudStorage is available!</p>
                <div class="mt-3">
                    <a href="#" class="text-sm bg-green-100 hover:bg-green-200 text-green-800 px-3 py-1 rounded-md transition-colors">
                        Update Now
                    </a>
                </div>
            </x-ui.alert>
        </div>
        
        <!-- Non-dismissible Alert -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Non-dismissible Alert</h3>
            <x-ui.alert type="warning" 
                       :dismissible="false"
                       title="Important Notice" 
                       message="This alert cannot be dismissed and will remain visible." />
        </div>
    </div>

    <!-- Card Components Section -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-900">Card Components</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Basic Card -->
            <x-ui.card title="Basic Card" subtitle="Simple card with title and subtitle">
                <p class="text-gray-600">This is a basic card component with default styling. It includes a title, subtitle, and content area.</p>
                <x-form.button variant="primary" size="sm">Action Button</x-form.button>
            </x-ui.card>
            
            <!-- Card with Custom Padding -->
            <x-ui.card title="Custom Padding" subtitle="Card with small padding" padding="sm">
                <p class="text-gray-600">This card uses small padding for a more compact layout.</p>
                <div class="flex space-x-2">
                    <x-form.button variant="secondary" size="sm">Cancel</x-form.button>
                    <x-form.button variant="primary" size="sm">Save</x-form.button>
                </div>
            </x-ui.card>
            
            <!-- Card without Shadow -->
            <x-ui.card title="No Shadow" subtitle="Card without shadow effect" :shadow="false">
                <p class="text-gray-600">This card doesn't have a shadow effect, giving it a flatter appearance.</p>
                <x-form.button variant="success" size="sm">Complete</x-form.button>
            </x-ui.card>
        </div>
        
        <!-- Large Card with Form Elements -->
        <x-ui.card title="Contact Form" subtitle="Fill out the form below to get in touch" padding="xl" class="max-w-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.input label="First Name" placeholder="Enter your first name" required />
                <x-form.input label="Last Name" placeholder="Enter your last name" required />
            </div>
            
            <x-form.input label="Email Address" type="email" placeholder="Enter your email" required />
            
            <x-form.select label="Subject" required :options="[
                'general' => 'General Inquiry',
                'support' => 'Technical Support',
                'billing' => 'Billing Question',
                'feedback' => 'Feedback'
            ]" />
            
            <x-form.textarea label="Message" placeholder="Enter your message here..." rows="4" required />
            
            <div class="flex items-center space-x-4">
                <x-form.checkbox label="I agree to the terms and conditions" required />
            </div>
            
            <div class="flex justify-end space-x-3">
                <x-form.button variant="secondary">Cancel</x-form.button>
                <x-form.button variant="primary">Send Message</x-form.button>
            </div>
        </x-ui.card>
    </div>

    <!-- Form Card Component Section -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-900">Form Card Component Preview</h2>
        
        <div class="bg-gray-100 p-6 rounded-lg">
            <p class="text-gray-600 mb-4">The Form Card component creates a full-page centered layout. Here's a preview of how it would look:</p>
            
            <!-- Simulated Form Card (scaled down) -->
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-md mx-auto">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Login to CloudStorage</h2>
                    <p class="text-sm text-gray-600">Enter your credentials to access your account</p>
                </div>
                
                <div class="space-y-6">
                    <x-ui.alert type="error" message="Invalid email or password." />
                    
                    <x-form.input label="Email Address" type="email" placeholder="Enter your email" />
                    <x-form.input label="Password" type="password" placeholder="Enter your password" />
                    
                    <div class="flex items-center justify-between">
                        <x-form.checkbox label="Remember me" />
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
                    </div>
                    
                    <x-form.button variant="primary" size="lg" class="w-full">Sign In</x-form.button>
                </div>
            </div>
            
            <p class="text-sm text-gray-500 mt-4 text-center">
                This is a scaled-down preview. The actual Form Card component creates a full-page layout.
                <br>
                <a href="/auth/login" class="text-blue-600 hover:text-blue-500">View full login page →</a>
            </p>
        </div>
    </div>

    <!-- Interactive Demo Section -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-900">Interactive Demo</h2>
        
        <x-ui.card title="Alert Generator" subtitle="Test different alert types dynamically">
            <div x-data="alertDemo()" class="space-y-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <x-form.button @click="showAlert('success')" variant="success" size="sm">Show Success</x-form.button>
                    <x-form.button @click="showAlert('error')" variant="danger" size="sm">Show Error</x-form.button>
                    <x-form.button @click="showAlert('warning')" variant="warning" size="sm">Show Warning</x-form.button>
                    <x-form.button @click="showAlert('info')" variant="secondary" size="sm">Show Info</x-form.button>
                </div>
                
                <div x-show="currentAlert" x-transition>
                    <div x-show="currentAlert === 'success'">
                        <x-ui.alert type="success" title="Success!" message="This is a dynamically generated success alert." />
                    </div>
                    <div x-show="currentAlert === 'error'">
                        <x-ui.alert type="error" title="Error!" message="This is a dynamically generated error alert." />
                    </div>
                    <div x-show="currentAlert === 'warning'">
                        <x-ui.alert type="warning" title="Warning!" message="This is a dynamically generated warning alert." />
                    </div>
                    <div x-show="currentAlert === 'info'">
                        <x-ui.alert type="info" title="Info!" message="This is a dynamically generated info alert." />
                    </div>
                </div>
            </div>
        </x-ui.card>
    </div>
</div>

<script>
function alertDemo() {
    return {
        currentAlert: null,
        
        showAlert(type) {
            this.currentAlert = type;
            // Auto hide after 5 seconds
            setTimeout(() => {
                this.currentAlert = null;
            }, 5000);
        }
    };
}
</script>
@endsection
