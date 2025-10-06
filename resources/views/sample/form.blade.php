@extends('layout.app-layout')

@section('title', 'Form Components')
@section('navbarTitle', 'CloudStorage')
@section('activeSidebarItem', 'files')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Form Components</h1>
        <p class="text-gray-600 mt-2">Apple-style form components showcase</p>
    </div>

    <!-- Basic Inputs -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Basic Inputs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.input 
                label="Full Name" 
                placeholder="Enter your full name" 
                required 
            />
            <x-form.input 
                label="Email Address" 
                type="email" 
                placeholder="Enter your email" 
                required 
            />
            <x-form.input 
                label="Password" 
                type="password" 
                placeholder="Enter your password" 
                required 
            />
            <x-form.input 
                label="Phone Number" 
                type="tel" 
                placeholder="Enter your phone number" 
                help="Include country code" 
            />
        </div>
    </div>

    <!-- Textarea -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Textarea</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.textarea 
                label="Message" 
                placeholder="Enter your message here..." 
                rows="4" 
                required 
            />
            <x-form.textarea 
                label="Description" 
                placeholder="Brief description..." 
                rows="3" 
                help="Keep it concise" 
            />
        </div>
    </div>

    <!-- Select Dropdowns -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Select Dropdowns</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.select 
                label="Country" 
                :options="[
                    'us' => 'United States',
                    'ca' => 'Canada',
                    'uk' => 'United Kingdom',
                    'de' => 'Germany',
                    'fr' => 'France',
                    'jp' => 'Japan'
                ]" 
                required 
            />
            <x-form.select 
                label="Plan" 
                :options="[
                    'basic' => 'Basic Plan',
                    'pro' => 'Pro Plan',
                    'enterprise' => 'Enterprise Plan'
                ]" 
                help="Choose your subscription plan" 
            />
        </div>
    </div>

    <!-- Checkboxes and Radio -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Checkboxes & Radio</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900">Checkboxes</h3>
                <x-form.checkbox 
                    label="I agree to the terms and conditions" 
                    required 
                />
                <x-form.checkbox 
                    label="Subscribe to newsletter" 
                />
                <x-form.checkbox 
                    label="Enable notifications" 
                    help="Get notified about updates" 
                />
            </div>
            
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900">Radio Buttons</h3>
                <x-form.radio 
                    label="Preferred Contact Method" 
                    name="contact_method"
                    :options="[
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'sms' => 'SMS'
                    ]" 
                    required 
                />
            </div>
        </div>
    </div>

    <!-- Switch Toggle -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Toggle Switches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.switch 
                label="Enable Dark Mode" 
            />
            <x-form.switch 
                label="Auto-save Documents" 
                help="Automatically save your work" 
            />
            <x-form.switch 
                label="Public Profile" 
            />
            <x-form.switch 
                label="Email Notifications" 
            />
        </div>
    </div>

    <!-- File Upload -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">File Upload</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.file-upload 
                label="Profile Picture" 
                accept="image/*" 
                help="Upload a profile picture (JPG, PNG)" 
            />
            <x-form.file-upload 
                label="Documents" 
                accept=".pdf,.doc,.docx" 
                multiple 
                help="Upload multiple documents" 
            />
        </div>
    </div>

    <!-- Buttons -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Buttons</h2>
        <div class="space-y-6">
            <!-- Button Variants -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Button Variants</h3>
                <div class="flex flex-wrap gap-3">
                    <x-form.button variant="primary">Primary</x-form.button>
                    <x-form.button variant="secondary">Secondary</x-form.button>
                    <x-form.button variant="danger">Danger</x-form.button>
                    <x-form.button variant="success">Success</x-form.button>
                    <x-form.button variant="warning">Warning</x-form.button>
                </div>
            </div>

            <!-- Button Sizes -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Button Sizes</h3>
                <div class="flex flex-wrap items-center gap-3">
                    <x-form.button size="sm">Small</x-form.button>
                    <x-form.button size="md">Medium</x-form.button>
                    <x-form.button size="lg">Large</x-form.button>
                    <x-form.button size="xl">Extra Large</x-form.button>
                </div>
            </div>

            <!-- Button States -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Button States</h3>
                <div class="flex flex-wrap gap-3">
                    <x-form.button>Normal</x-form.button>
                    <x-form.button disabled>Disabled</x-form.button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Group Example -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Form Group</h2>
        <x-form.group label="Personal Information">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.input label="First Name" placeholder="John" required />
                <x-form.input label="Last Name" placeholder="Doe" required />
                <x-form.input label="Email" type="email" placeholder="john@example.com" required />
                <x-form.input label="Phone" type="tel" placeholder="+1 (555) 123-4567" />
            </div>
        </x-form.group>
    </div>

    <!-- Error States Example -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Error States</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form.input 
                label="Email" 
                type="email" 
                placeholder="Enter email" 
                error="Please enter a valid email address" 
            />
            <x-form.select 
                label="Country" 
                :options="['us' => 'United States']" 
                error="Please select a country" 
            />
            <x-form.checkbox 
                label="Terms and Conditions" 
                error="You must agree to the terms" 
            />
            <x-form.textarea 
                label="Message" 
                placeholder="Enter message" 
                error="Message is required" 
            />
        </div>
    </div>
</div>
@endsection
