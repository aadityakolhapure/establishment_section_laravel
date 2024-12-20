<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class DepartmentManagement extends Component
{
    use WithPagination;

    // Form properties
    public $name = '';
    public $description = '';
    public $code = '';
    public $departmentId = null;

    // Search and sorting
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Validation rules
    protected function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('departments', 'name')->ignore($this->departmentId)
            ],
            'description' => 'nullable|max:500',
            'code' => [
                'required',
                'max:50',
                Rule::unique('departments', 'code')->ignore($this->departmentId)
            ]
        ];
    }

    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Render the component
    public function render()
    {
        $departments = Department::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.department-management', [
            'departments' => $departments
        ]);
    }

    // Save or update department
    public function save()
    {
        $validatedData = $this->validate();

        if ($this->departmentId) {
            // Update existing department
            $department = Department::findOrFail($this->departmentId);
            $department->update($validatedData);
            session()->flash('message', 'Department updated successfully.');
        } else {
            // Create new department
            Department::create($validatedData);
            session()->flash('message', 'Department created successfully.');
        }

        // Reset form
        $this->reset(['name', 'description', 'code', 'departmentId']);
    }

    // Prepare department for editing
    public function edit(Department $department)
    {
        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->description = $department->description;
        $this->code = $department->code;
    }

    // Delete department
    public function delete(Department $department)
    {
        $department->delete();
        session()->flash('message', 'Department deleted successfully.');

        // Reset pagination to first page if needed
        $this->resetPage();
    }

    // Sort departments
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // Reset form
    public function cancel()
    {
        $this->reset(['name', 'description', 'code', 'departmentId']);
    }
}
