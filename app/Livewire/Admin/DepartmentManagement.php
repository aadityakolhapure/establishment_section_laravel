<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class DepartmentManagement extends Component
{
    use WithPagination;

    // Public properties with default values
    public $name = '';
    public $description = '';
    public $code = '';
    public $departmentId = null;

    // Search and sorting
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Mount method to initialize properties
    public function mount()
    {
        $this->reset();
    }

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

    // Render method
    public function render()
    {
        $departments = Department::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.department-management', [
            'departments' => $departments
        ]);
    }

    // Save method
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
        $this->reset();
    }

    // Edit method
    public function edit(Department $department)
    {
        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->description = $department->description;
        $this->code = $department->code;
    }

    // Delete method
    public function delete(Department $department)
    {
        $department->delete();
        session()->flash('message', 'Department deleted successfully.');
        $this->reset();
    }

    // Cancel editing
    public function cancel()
    {
        $this->reset();
    }
}
