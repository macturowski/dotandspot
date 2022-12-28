<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tasks list') }}
                            </h2>
                        </header>
                    </section>
                    <section class="space-y-6">
                        <div>
                            <x-input-success :messages="Session::get('message')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('task.create') }} ">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Add new Task
                                </button>
                            </a>
                        </div>
                        <div class="flex w-full">
                           
                           <div class="w-full pr-2">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">
                                    {{ __('Todo') }}
                                </h2>
                                @foreach ($tasks_todo as $task)
                                    @include('task.listitem', ['status' => 1, 'color' => 'red', 'changebutton' => 'done'])
                                @endforeach
                            </div>
                            <div class="w-full pl-2">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">
                                    {{ __('Done') }}
                                </h2>
                                @foreach ($tasks_done as $task)
                                    @include('task.listitem', ['status' => 0, 'color' => 'green', 'changebutton' => 'todo'])
                                @endforeach
                            </div>
                            
                            
                        </div>
                        
                        
                        
                        
                    </section>
                </div>
            </div>
    </div>
</x-app-layout>