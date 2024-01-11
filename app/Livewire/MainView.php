<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class MainView extends Component
{
    public $item;
    public $level;

    #[On('item-clicked')]
    public function loadItem($data)
    {
        // $this->item->name = $data['class'];
        $this->item = $data['class']::where('id', $data['id'])->first();
        $this->level = $data['level'];
    }

    public function render()
    {
        return view('livewire.main-view');
    }
}
