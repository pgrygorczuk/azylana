<?php

namespace App\Livewire;

use App\Models\Village;
use Livewire\Component;
use App\Models\Building;

class BuildingDetails extends Component
{
    public $building_id = NULL;
    public $buildingvillage_id = NULL;

    #[On('item-clicked')]
    public function loadBuilding($data)
    {
        $this->building_id = $data['building_id'];
        $this->buildingvillage_id = $data['buildingvillage_id'];
    }

    public function render()
    {
        if(!$this->building_id)
        {
            $village = Village::find(session('curr_village_id'));
            return <<<HTML
                <div class="item-view-component">
                    <div class="item-name">$village->name</div>
                </div>
            HTML;
        }

        return view('livewire.building-details')
            ->with('building', Building::find($this->building_id))
            ->with('buildingvillage', $buildingvillage_id ?
                BuildingVillage::find($buildingvillage_id) : NULL);
    }
}
