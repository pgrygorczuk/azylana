<?php

namespace App\Livewire;

use Livewire\Component;

class ActionButton extends Component
{
    public $item;
    public $level;

    public function click()
    {
        $this->dispatch('item-clicked', [
            'id' => $this->item->id,
            'class' => $this->item::class,
            'level' => $this->level,
        ]);
    }

    public function render()
    {
        return view('livewire.action-button');
    }
}
