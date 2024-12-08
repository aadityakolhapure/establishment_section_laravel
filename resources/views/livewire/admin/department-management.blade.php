<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Manage Departments</h2>

    {{-- Success Message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Department Form --}}
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Department Name
                    </label>
                    <input
                        wire:model="name"
                        class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name"
                        type="text"
                        placeholder="Enter department name"
                    >
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                        Department Code
                    </label>
                    <input
                        wire:model="code"
                        class="shadow appearance-none border @error('code') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="code"
                        type="text"
                        placeholder="Enter department code"
                    >
                    @error('code')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea
                    wire:model="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description"
                    placeholder="Enter department description"
                    rows="3"
                ></textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    {{ $departmentId ? 'Update Department' : 'Create Department' }}
                </button>

                @if($departmentId)
                    <button
                        wire:click.prevent="cancel"
                        type="button"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Cancel
                    </button>
                @endif
            </div>
        </form>
    </div>

    {{-- Departments Table --}}
    <table class="w-full mt-6 border-collapse border border-gray-300" style="border-radius: 20px">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->description ?? 'No description' }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <button
                                wire:click="edit({{ $department->id }})"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded"
                            >
                                Edit
                            </button>
                            <button
                                wire:click="delete({{ $department->id }})"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                            >
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $departments->links() }}
    </div>
</div>
