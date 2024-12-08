<div class="container mx-auto p-6">
    {{-- Success and Error Messages --}}
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Create Button --}}
    <div class="mb-4">
        <button wire:click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded">
            Create New Leave Type
        </button>
    </div>

    {{-- Leave Types Table --}}
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">Leave Name</th>
                <th class="px-4 py-2">Days Allowed</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveTypes as $leaveType)
                <tr>
                    <td class="border px-4 py-2">{{ $leaveType->leave_name }}</td> <!-- Updated -->
                    <td class="border px-4 py-2">{{ $leaveType->days_assigned }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $leaveType->id }})" class="text-blue-500 mr-2">Edit</button>
                        <button wire:click="$emit('confirmDelete', {{ $leaveType->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    {{-- Modal for Create/Edit --}}
    @if($isModalOpen)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-xl w-1/2">
                <h2 class="text-xl mb-4">{{ $leaveTypeId ? 'Edit' : 'Create' }} Leave Type</h2>

                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label class="block mb-2">Leave Name</label>
                        <input type="text" wire:model="leave_name" class="w-full border rounded p-2" required>
                        @error('leave_name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="mb-4">
                        <label class="block mb-2">Days Allowed</label>
                        <input type="number" wire:model="days_assigned" class="w-full border rounded p-2" required>
                        @error('days_assigned') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="button" wire:click="$set('isModalOpen', false)" class="mr-4 text-gray-600">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('confirmDelete', function (id) {
            if(confirm('Are you sure you want to delete this leave type?')) {
                @this.call('delete', id);
            }
        });
    });
</script>
