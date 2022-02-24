<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class SearchEvent extends Component
{
    public $term;

    public function render()
    {
        sleep(1);

        $events = Event::when($this->term , function($query, $term) {
            return $query->where('title' , 'LIKE', "%$term%");
            
        })->paginate(10);

        $data =  [
            'events' => $events,
        ];

        return view('livewire.search-event', $data);
    }
}
