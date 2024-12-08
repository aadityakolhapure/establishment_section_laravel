<?php

// namespace App\Http\Livewire;
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Validator;

class LeaveTypeManagement extends Component
{
    // Public properties for form inputs
    public $leaveTypeId = null;
    public $name = '';
    public $days_assigned = 0;

    public $leaveTypes = [];

    // Lifecycle method to initialize data
    public function mount()
    {
        // Fetch leave types during component initialization
        $this->leaveTypes = LeaveType::all();
    }

    // Public property to control modal visibility
    public $isModalOpen = false;

    // Listeners for frontend interactions
    protected $listeners = [
        'deleteLeaveType' => 'delete',
        'editLeaveType' => 'edit'
    ];

    // Validation rules
    protected function rules()
    {
        return [
            'leave_name' => 'required|string|max:100|unique:leave_types,leave_name,' . $this->leaveTypeId,
            'days_assigned' => 'required|integer|min:0|max:365'
        ];
    }


    // Custom validation messages
    protected function messages()
    {
        return [
            'name.required' => 'Leave type name is required.',
            'name.unique' => 'This leave type name already exists.',
            'days_assigned.min' => 'Days allowed must be a positive number.',
            'days_assigned.max' => 'Days allowed cannot exceed 365.'
        ];
    }

    // Render the component view
    public function render()
    {
        // Add comprehensive logging for debugging
        \Log::info('Rendering Leave Type Management', [
            'leaveTypes_count' => $this->leaveTypes->count(),
            'leaveTypes_data' => $this->leaveTypes->toArray()
        ]);

        // Return view with explicit data passing
        return view('livewire.admin.leave-type-management', [
            'leaveTypes' => $this->leaveTypes
        ]);
    }



    // Open modal for creating new leave type
    public function openCreateModal()
    {
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    // Reset input fields
    public function resetInputFields()
{
    $this->leaveTypeId = null;
    $this->leave_name = ''; // Use leave_name instead of name
    $this->days_assigned = 0;
}


    // Save or update leave type
    public function save()
{
    $validatedData = $this->validate();

    if ($this->leaveTypeId) {
        $leaveType = LeaveType::findOrFail($this->leaveTypeId);
        $leaveType->update($validatedData); // Automatically maps 'leave_name'
        session()->flash('message', 'Leave Type updated successfully.');
    } else {
        LeaveType::create($validatedData);
        session()->flash('message', 'Leave Type created successfully.');
    }

    $this->isModalOpen = false;
    $this->resetInputFields();
}


    // Prepare leave type for editing
    public function edit($id)
    {
        $leaveType = LeaveType::findOrFail($id);

        $this->leaveTypeId = $leaveType->id;
        $this->leave_name = $leaveType->leave_name; // Use leave_name
        $this->days_assigned = $leaveType->days_assigned;

        $this->isModalOpen = true;
    }


    // Delete leave type
    public function delete($id)
    {
        $leaveType = LeaveType::findOrFail($id);

        try {
            $leaveType->delete();
            session()->flash('message', 'Leave Type deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Could not delete leave type: ' . $e->getMessage());
        }
    }
}
