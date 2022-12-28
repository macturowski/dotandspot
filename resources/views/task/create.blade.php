<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Create new Task') }}
                            </h2>
                        </header>
                    </section>
                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                        <form method="post" action="{{ route('task.index') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')

                            <div>
                                <x-input-label for="name" :value="__('Task name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                                <x-input-error :messages="$errors->all()" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                        </div>
                    </section>
                </div>
            </div>
    </div>
</x-app-layout>