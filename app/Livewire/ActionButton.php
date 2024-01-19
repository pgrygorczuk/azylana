<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class ActionButton extends Component
{
    public $item_id = NULL;
    public $item_class = NULL;
    public $mid_table_id = NULL;
    public $mid_table_class = NULL;

    public function click()
    {
        $mid_table_item = $this->mid_table_class::find($this->mid_table_id, ['level']);

        $this->dispatch('item-clicked', [
            'item_id' => $this->item_id,
            'item_class' => $this->item_class,
            'mid_table_id' => $this->mid_table_id,
            'mid_table_class' => $this->mid_table_class,
        ]);
    }

    public function render()
    {
        $now = Carbon::now();
        return view('livewire.action-button')
            ->with('item', $this->item_class::find($this->item_id))
            ->with('mid_table_item', $this->mid_table_class::find($this->mid_table_id))
            ->with('now', $now);
    }
}
