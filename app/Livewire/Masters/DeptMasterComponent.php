<?php

namespace App\Livewire\Masters;

use Livewire\Component;
use App\Models\StateMaster;
use App\Models\DistMaster;
use App\Models\DeptMaster;

class DeptMasterComponent extends Component
{

    public $newmodal;
    public function render()
    {
        return view('livewire.masters.dept-master-component');
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
