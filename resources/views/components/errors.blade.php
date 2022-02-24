@if ($errors->any())
<div class="mt-2 bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 px-4 py-3 mb-2 rounded relative text-left">
    @foreach ($errors->All() as $error)
    <li>{{ $error }}</li>    
    @endforeach

</div>

    
@endif