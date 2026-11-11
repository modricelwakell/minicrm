<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Projects') }}
            </h2>

            <a href="{{ route('projects.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Add Project
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                @if (session('success'))
                    <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned to</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="px-4 py-4">
                                        {{ $project->title }}
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap">
                                        {{ $project->user?->first_name }} {{ $project->user?->last_name }}
                                    </td>

                                    <td class="px-4 py-4">
                                        {{ $project->client?->company_name }}
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap">
                                        {{ $project->deadline?->format('Y-m-d') }}
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap">
                                        {{ $project->status->value }}
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="text-indigo-600 hover:underline">
                                                Edit
                                            </a>
                                            @can('delete projects')
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                                    Delete
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                        No projects found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $projects->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>