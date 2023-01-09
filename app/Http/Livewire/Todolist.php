<?php

namespace App\Http\Livewire;

use App\Models\Todolist as ModelsTodolist;
use Livewire\Component;

class Todolist extends Component
{
    public $title, $todo;
    protected $rules = [
        'title' => 'min:3',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    private function resetInputFields()
    {
        $this->title = '';
    }
    public function store()
    {
        $this->validate();
        ModelsTodolist::create([
            'tittle' => $this->title,
            'subtitle' => 'Text some description',
            'done' => false
        ]);
        $this->resetInputFields();
    }
    public function destroy($id)
    {
        dd($id);
        $todo = ModelsTodolist::findOrFail($id);
        $todo->delete();
    }

    public function render()
    {
        $this->todo = ModelsTodolist::all();
        return view('livewire.todolist');
    }
}
