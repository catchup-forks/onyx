<?php namespace App\Contracts;

trait Localizable{
	/**
	 * Getting all localizations of a model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function locales(){
		return $this->hasMany(self::class.'Locale');
	}

	/**
	 * Getting specific localization of a model.
	 *
	 * @param string $locale Localization language code
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function locale($locale){
		return $this->locales()->whereLocale($locale);
	}
}