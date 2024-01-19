<?php

namespace App\View\Components;

use Closure;
use App\Models\Resource;
use Illuminate\View\Component;
use App\View\Components\Resources;
use Illuminate\Contracts\View\View;

class Resources extends Component
{
    // public $resourceId = NULL;
    public $resource = NULL;
    public $autoincrement = FALSE;

    /**
     * Create a new component instance.
     */
    public function __construct($resource, $autoincrement=FALSE)
    {
        // $this->resourceId = $resourceId;
        $this->resource = $resource;
        $this->autoincrement = $autoincrement;
    }

    public function shouldRender(): bool
    {
        return !empty($this->resource) &&
            $this->resource->wood  + $this->resource->clay + $this->resource->ore +
            $this->resource->stone + $this->resource->food > 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.resources')
            ->with('resource', $this->resource);
    }
}
