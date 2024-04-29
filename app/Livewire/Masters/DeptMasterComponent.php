<?php

namespace App\Livewire\Masters;

use Livewire\Component;
use App\Models\StateMaster;
use App\Models\DistMaster;
use App\Models\DeptMaster;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class DeptMasterComponent extends Component
{

    public $newmodal;
    public $statename;
    public $distname;
    public $states;
    public $dists;
    public $dtcode;
    public $stcode;
    public $deptname;


    public function render()
    {
        //$states = StateMaster::get(['stcode','stname'])->toArray();
        $tableData = DeptMaster::paginate(10);
        return view('livewire.masters.dept-master-component',['tableData'=>$tableData]);
    }

    public function mount(){
        $this->dtcode = Auth::user()->dtcode;
        $this->stcode = Auth::user()->stcode;
        //dd($this->stcode);
        $this->states = StateMaster::get(['stcode','stname'])->toArray();
        
    }

    public function getdistricts(){
        $this->dists = DistMaster::where('stcode',$this->statename)->get();
        //dd($this->dists);
    }
     
    public function newDepartment(){
        $existingDepartment = DeptMaster::where('stcode', $this->statename)
                                ->where('deptname', $this->deptname)
                                ->first();    
        if ($existingDepartment) {
            request()->session()->flash('error', 'A department with the same name or abbreviation already exists.');
            $this->toggle('newmodal');
        } else {            $lastDepartment = DeptMaster::orderBy('id', 'desc')->first();
            
            if ($lastDepartment) {
                $lastDeptCode = $lastDepartment->deptcode;
                $lastNumber = intval(substr($lastDeptCode, 1));
                $nextNumber = $lastNumber + 1;
                $this->departmentCode = 'D' . $nextNumber;
            } else {
                $this->departmentCode = 'D1';
            }            
            // Retrieve the state code for the department's associated state
            $stateCode = $this->statename; // Replace this with your logic to get the state code            
            // Concatenate state code with department code to form deptkey
            $deptkey = $stateCode . $this->departmentCode;
            
            DeptMaster::create([
                'stcode'=> $this->statename,
                'dtcode'=> $this->distname,
                'deptcode'=> $this->departmentCode,
                'deptname' =>$this->deptname,              
                'deptkey' => $this->statename.$this->distname.$this->departmentCode,
            ]);
            
            request()->session()->flash('success', 'New department entry created successfully.');
            $this->reset(['statename', 'deptname','distname']);               
            $this->toggle('newmodal');
        }
    }

    public function getDepartmentPDF(){
        $departmentData = DeptMaster::all();
        $headers = [            
            'Sr. no.',
            'Department Name',
            'Model Name', // Assuming this is the department model name
            'ID' // Assuming this is the ID of the department
        ];
    
        $options = new Options();
        $options->set('isPhpEnabled', true); 
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); 
    
        $pdfContent = PDF::loadView('reports.departmentmasterreport', ["headers" => $headers, "pdfdata" => $departmentData])
            ->setPaper('a4', 'portrait')
            ->setWarnings(false)
            ->setOptions([$options])
            ->output();        
    
        return response()->streamDownload(
            function () use ($pdfContent) {
                print($pdfContent);
            },
            "Department Master Report.pdf"
        ); 
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
