<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * @var array $data data to be included in the returned response.
	 */
    protected $data;
	/**
	 * @var array $loadedComponents Index of loaded components' features and their data status.
	 */
    protected $loadedComponents = [];
	/**
	 * @var array $componentObjects Index of instantiated component objects.
	 */
    protected $componentObjects = [];

	/**
	 * Loading accompanied data of the required UI components' features
	 * each component MUST follow the format "ComponentName@featureName"
	 *
	 * @param string[] ...$components components to have their data loaded.
	 */
	protected function loadComponentsData(...$components){
		foreach($components as $component){
			$component = explode('@', $component);
			if(!isset($this->componentObjects[$component[0]])){
				$componentClass = "\\App\\Components\\$component[0]";
				$this->componentObjects[$component[0]] = new $componentClass();
			}
			$componentName = $this->getComponentName($component[0], $component[1]);
			try{
				$this->data[$componentName] += $this->componentObjects[$component[0]]->$component[1]();
				$this->loadedComponents[$componentName] = true;
			} catch(\Exception $e){
				if(!isset($this->data['componentErrors']))
					$this->data['componentErrors'] = [];
				$this->data['componentErrors'] += [$componentName => $e->getMessage()];
				$this->loadedComponents[$componentName] = false;
			}
		}
    }

	/**
	 * Getting UI component name according to Laravel views naming conventions.
	 *
	 * @param string $name Component class name.
	 * @param string $feature Component class method.
	 * @return string "component.feature" view name.
	 */
	private function getComponentName($name, $feature){
		$name = str_replace('_', '-', snake_case($name));
		$feature = str_replace('_', '-', snake_case($feature));
		return "$name.$feature";
    }

	/**
	 * Returning view response to clients with the collected data and components.
	 *
	 * @param string $view Layout view name to be responded with.
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    protected function respond($view){
		return view($view, $this->data + ['loadedComponents' => $this->loadedComponents]);
	}
}
