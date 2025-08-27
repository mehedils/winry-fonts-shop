<x-filament-panels::page>
    <div class="max-w-6xl mx-auto space-y-8">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Site Settings
            </h1>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Manage your website configuration, contact information, and social media links.
                Changes will be applied immediately to your website.
            </p>
        </div>

        <!-- Form -->
        <form wire:submit="saveSettings" class="space-y-8">
            {{ $this->form }}

            <!-- Save Button Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Save Changes
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Click the button below to save all your settings changes.
                        </p>
                    </div>
                    <x-filament::button
                        type="submit"
                        color="primary"
                        size="lg"
                        icon="heroicon-o-check"
                        class="px-8"
                    >
                        Save All Settings
                    </x-filament::button>
                </div>
            </div>
        </form>
    </div>
</x-filament-panels::page>
