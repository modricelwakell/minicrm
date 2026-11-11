
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Task') }}
            </h2>

            <a href="{{ route('tasks.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                &larr; {{ __('Back to Tasks') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full"
                            type="text" name="title"
                            :value="old('title', $task->title)"
                            required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            rows="4">{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Assigned To -->
                    <div class="mt-4">
                        <x-input-label for="user_id" :value="__('Assigned To')" />

                        <select id="user_id" name="user_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="">Select User</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    @selected(old('user_id', $task->user_id) == $user->id)>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    <!-- Client -->
                    <div class="mt-4">
                        <x-input-label for="client_id" :value="__('Client')" />

                        <select id="client_id" name="client_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="">Select Client</option>

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    @selected(old('client_id', $task->client_id) == $client->id)>
                                    {{ $client->company_name }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                    </div>

                    <!-- Project -->
                    <div class="mt-4">
                        <x-input-label for="project_id" :value="__('Project')" />

                        <select id="project_id" name="project_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="">Select Project</option>

                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    @selected(old('project_id', $task->project_id) == $project->id)>
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                    </div>

                    <!-- Deadline -->
                    <div class="mt-4">
                        <x-input-label for="deadline" :value="__('Deadline')" />
                        <x-text-input id="deadline" class="block mt-1 w-full"
                            type="date" name="deadline"
                            :value="old('deadline', $task->deadline?->format('Y-m-d'))"
                            required />
                        <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                    </div>

                    <!-- Status -->
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Status')" />

                        <select id="status" name="status"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="">Select Status</option>

                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}"
                                    @selected(old('status', $task->status->value) == $status->value)>
                                    {{ ucfirst($status->value) }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 mt-6">
                        <a href="{{ route('tasks.index') }}"
                           class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                            {{ __('Cancel') }}
                        </a>

                        <x-primary-button>
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
