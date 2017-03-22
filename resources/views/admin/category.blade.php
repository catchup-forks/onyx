@extends('admin.master')

@section('content')
    <div class="row">
        @foreach($loadedComponents as $loadedComponent => $loaded)
            @if($loaded)
                @include($loadedComponent, $loadedData[$loadedComponent])
            @endif
        @endforeach
    </div>
@endsection