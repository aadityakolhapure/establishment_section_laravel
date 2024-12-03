<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;

class DepartmentComponent extends Component
{
    public $departments, $name, $description, $departmentId;
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|min:3',
        'code' => 'required|min:3',
        'description' => 'nullable|max:255',
    ];

    // public function render()
    // {
    //     $this->departments = Department::all();
    //     return view('livewire.admin.department');
    // }
    public function render()
    {
        return view('livewire.admin.department');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->code = '';
        $this->departmentId = null;
        $this->isEditMode = false;
    }

    public function createDepartment()
    {
        $this->validate();

        Department::create([
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Department created successfully.');
        $this->resetFields();
    }

    public function editDepartment($id)
    {
        $department = Department::find($id);

        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->code = $department->code;
        $this->description = $department->description;
        $this->isEditMode = true;
    }

    public function updateDepartment()
    {
        $this->validate();

        $department = Department::find($this->departmentId);
        $department->update([
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Department updated successfully.');
        $this->resetFields();
    }

    public function deleteDepartment($id)
    {
        Department::find($id)->delete();
        session()->flash('message', 'Department deleted successfully.');
    }
}
