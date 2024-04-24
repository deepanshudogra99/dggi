<?php

namespace App\Livewire\Masters;
use App\Models\StateMaster;

use Livewire\Component;

class StateMasterComponent extends Component
{
    public $isOpen = false;
    public $statename;
    public $newmodal;


    
  

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

    public function render()
    {
        
        return view('livewire.masters.state-master-component');
    }

    public function mount(){
        $states = StateMaster::all();
    }

    public function newstate(){
        dd($this->statename);

    }

   
   

}
