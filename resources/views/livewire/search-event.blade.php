
<div>
    <div class="px-10 space-y-4">
        <div class="flex flex-row">
        <form method="GET" class="shadow-none p-0 m-0 bg-transparent border-none w-full">
            @csrf
            <input class="p-2 w-96 outline-none rounded-full" 
                type="text" placeholder="Search For Events ..." wire:model="term"/>
            </form>
        <div wire:loading class="text-gray-300">Searching events...
            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-white"></div>
        </div>
        </div>
        <div wire:loading.remove>
            

        @if ($term == "")
            <div class="text-gray-500 text-sm">
                Enter a term to search for users.
            </div>
        @else
            @if($events->isEmpty())
                <div class="text-gray-500 text-sm">
                    😢 No matching result was found.
                </div>
            @else
                @foreach($events as $event)
                    <div class="bg-white">
                        <a href="{{ route('events.show', ['event' => $event->id ])}}" class="text-lg text-gray-900 text-bold">{{$event->title}}
                        </a>
                        <hr>
                    </div>
                @endforeach
            @endif
        @endif
        </div>
    </div>
    <div class="px-4 mt-4">
        {{$events->links()}}
    </div>
</div>
