<?php

namespace App\Livewire\Masters;
use App\Models\StateMaster;
use Livewire\WithPagination;

use Livewire\Component;

class StateMasterComponent extends Component
{
    use WithPagination;
    public $isOpen = false;
    public $statename;
    public $stateabr;
    public $newmodal;   

    public function render()
    {        
        $tableData = StateMaster::paginate(10);
        return view('livewire.masters.state-master-component',['tableData'=>$tableData]);
    }

    public function mount(){
        $states = StateMaster::all();
    }

    public function newstate(){
        $lastState = StateMaster::orderBy('id', 'desc')->first();
        if ($lastState) {
            $lastStateCode = $lastState->stcode;
            $lastNumber = intval(substr($lastStateCode, 1));
            $nextNumber = $lastNumber + 1;
            $this->stateCode = 'S' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
        } else {
            $this->stateCode = 'S01';
        }
        StateMaster::create([
            'stname' => $this->statename,
            'stabbr' => $this->stateabr,
            'stcode' => $this->stateCode,
        ]);
        request()->session()->flash('success', 'New state entry created successfully.');
        $this->stateName = '';
        $this->stateAbbreviation = ''; 
              
        $this->toggle('newmodal');

    }

    public function toggle($key)
    {
        switch ($key) {
            case "newmodal":
                $this->newmodal = !$this->newmodal;
                break;
            case "editmodal":
                $this->editmodal = !$this->editmodal;
                break;
            case "confirmupdatemodal":
                $this->confirmupdatemodal = !$this->confirmupdatemodal;
                break;
        }
    }
}
   
   


