<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NameChartSetup;
use App\Models\CategorySetup;
use App\Models\ItemSetup;
class MultiSelectAssets extends Component
{


     public $categorys_detail ;
     public $name_charts ;
     public $name_chart_id;
     public $get_category_id = 0 ;
     public $items_detail =  0;



    public function render()
    {
        $this->name_charts =  NameChartSetup::ActiveNameChart();
        return view('livewire.multi-select-assets');
    }

    public function updatedNameChartId(){
        $this->categorys_detail =   CategorySetup::where("name_chart_id",$this->name_chart_id)->get();
    }

    public function updatedGetCategoryId($value){
       
        $this->items_detail =   ItemSetup::where("category_id",$this->get_category_id)->get();
       
    }



    

}
