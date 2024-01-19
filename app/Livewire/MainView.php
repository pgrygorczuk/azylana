<?php

namespace App\Livewire;

use App\Models\Village;
use Livewire\Component;
use Livewire\Attributes\On;

class MainView extends Component
{
    public $item_id = NULL;
    public $item_class = NULL;
    public $mid_table_id = NULL;
    public $mid_table_class = NULL;

    #[On('item-clicked')]
    public function loadData($data)
    {
        $this->item_id = $data['item_id'];
        $this->item_class = $data['item_class'];
        $this->mid_table_id = $data['mid_table_id'];
        $this->mid_table_class = $data['mid_table_class'];
    }

    public function render()
    {
        if(!$this->item_class)
        {
            $this->item_id = session('curr_village_id');
            $this->item_class = Village::class;
            return view('livewire.main-view.village-view')
                ->with('item', $this->item_class::find($this->item_id));
        }
        elseif($this->item_class == 'App\Models\Building')
        {
            $mid_table_item = $this->mid_table_class::find($this->mid_table_id);
            $item = $this->item_class::find($this->item_id);
            $resource = $item->getRequiredResources($mid_table_item->level + 1);

            if( $mid_table_item->level < 0 ) // Field is locked.
            {
                return view('livewire.main-view.unlock-building-view')
                    ->with('item', $item)
                    ->with('mid_table_item', $mid_table_item)
                    ->with('resource', $resource);
            }
            else // Field is unlocked or contains building.
            {
                $resource = NULL;
                $field_is_empty = $item->id == 1;
                if( !$field_is_empty ) // Not empty field.
                    $resource = $item->getRequiredResources($mid_table_item->level + 1);

                return view('livewire.main-view.building-view')
                    ->with('item', $item)
                    ->with('mid_table_item', $mid_table_item)
                    ->with('resource', $resource);
            }
        }
        else
        {
            return view('livewire.main-view.common');
        }
    }
}
