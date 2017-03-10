@if(isset($loadedComponents[$viewName]))
	@if($loadedComponents[$viewName])
		@yield('component-content')
	@else
		<div class="alert alert-danger">Error loading the component {{$viewName}}:<br/>{{$componentErrors[$viewName]}}</div>
	@endif
@else
	<div class="alert alert-warning">Data of {{$viewName}} was <strong>NOT</strong> loaded!</div>
@endif