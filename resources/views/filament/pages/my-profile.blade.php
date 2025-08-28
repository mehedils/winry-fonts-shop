<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Current User Info -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center space-x-4">
                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-16 h-16 rounded-full">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        {{ auth()->user()->role === 'super_admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <form wire:submit="save">
            {{ $this->form }}
            
            <div class="mt-6 flex justify-end">
                <x-filament::button type="submit">
                    Update Profile
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
