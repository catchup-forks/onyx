@extends('admin.master')

@section('content')
    <div class="row">
        @foreach($loadedComponents as $loadedComponent => $loaded)
            @if($loaded)
                @include($loadedComponent, $loadedData[$loadedComponent])
            @else
                <div class="col-sm-12">
                    <div class="alert alert-danger col-sm-12">
                        <strong>Exception in {{$loadedComponent}}:</strong><br/>
                        {!! nl2br($loadedData[$loadedComponent]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection