<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Manage Departments</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="{{ $isEditMode ? 'updateDepartment' : 'createDepartment' }}">
        <div class="mb-4">
            <label class="block text-gray-700">Department Name:</label>
            <input type="text" wire:model="name" class="w-full p-2 border rounded">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea wire:model="description" class="w-full p-2 border rounded"></textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <button type="submit"
            class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            {{ $isEditMode ? 'Update' : 'Create' }}
        </button>
        @if ($isEditMode)
            <button type="button" wire:click="resetFields"
                class="px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700">
                Cancel
            </button>
        @endif
    </form>

    <!-- Department List -->
    <table class="w-full mt-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $department->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button wire:click="editDepartment({{ $department->id }})"
                            class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Edit
                        </button>
                        <button wire:click="deleteDepartment({{ $department->id }})"
                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
