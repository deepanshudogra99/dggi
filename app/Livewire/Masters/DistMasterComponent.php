<?php

namespace App\Livewire\Masters;

use Livewire\Component;
use App\Models\StateMaster;
use App\Models\DistMaster;

use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class DistMasterComponent extends Component
{
    public $newmodal;
    public $states;
    public $statename;
    public $distname;
    public $distabbr;

    public function render()
    
    {
        $tableData = DistMaster::paginate(10);
        return view('livewire.masters.dist-master-component',['tableData'=>$tableData]);
    }

    public function mount(){
        $this->states = StateMaster::get(['stcode','stname'])->toArray();
    }


    public function newdistrict (){
        $existingDistrict = DistMaster::where('stcode', $this->statename)
                                ->where('dtname',$this->distname)
                                ->orWhere('dtabbr', $this->distabbr)
                                ->first();
        if ($existingDistrict) {            
            request()->session()->flash('error', 'A district with the same name or abbreviation already exists.');
            $this->toggle('newmodal');
        } else {
            $lastDistrict = DistMaster::orderBy('id', 'desc')->first();
            if ($lastDistrict) {
                $lastDistCode = $lastDistrict->dtcode;
                $lastNumber = intval(substr($lastDistCode, 1));
                $nextNumber = $lastNumber + 1;
                if(strlen($nextNumber) >= 2){
                    $this->districtCode = 'D' . $nextNumber;
                }else{
                    $this->districtCode = 'D' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
                }            
            } else {
                $this->districtCode = 'D01';
            }
            
            // Retrieve the state code for the district's associated state
            $stateCode = $this->statename; // Replace this with your logic to get the state code
            
            // Concatenate state code with district code to form dtkey
            $dtkey = $stateCode.$this->districtCode;
            
            DistMaster::create([
                'stcode'=> $this->statename,
                'dtname' =>$this->distname,
                'dtabbr' => $this->distabbr,
                'dtcode' => $this->districtCode,
                'dtkey' => $dtkey
            ]);
        request()->session()->flash('success', 'New state entry created successfully.');
        $this->reset(['statename', 'distname','distabbr']);               
        $this->toggle('newmodal');
        }
    }

    public function getDistrictPDF(){
        $districtData = DistMaster::all();
        $headers = [            
            'Sr. no.',
            'District Name',
            'District Abbreviation',          
        ];
    
        $options = new Options();
        $options->set('isPhpEnabled', true); 
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); 
    
        $pdfContent = PDF::loadView('reports.districtmasterreport', ["headers" => $headers, "pdfdata" => $districtData])
            ->setPaper('a4', 'portrait')
            ->setWarnings(false)
            ->setOptions([$options])
            ->output();        
    
        return response()->streamDownload(
            function () use ($pdfContent) {
                print($pdfContent);
            },
            "District Master Report.pdf"
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
