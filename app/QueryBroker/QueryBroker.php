<?php namespace App\QueryBroker;

/**
 * Class QueryBroker
 *
 * Factory class that retrieves any predefined query needed by the application.
 */
class QueryBroker{
    /*
     * @var QueryBroker[] $initializedBrokers array of loaded brokers to be reused in subsequent retrievals.
     */
    public static $initializedBrokers = [];

    /**
     * Getting the query required by an identifier that matches the pattern `Module[at]Entity\Aspect`.
     *
     * @param $query string Query identifier corresponding to the query needed.
     * @return \Illuminate\Database\Eloquent\Builder Query builder object representing the required query.
     */
    public static function make($query){
        $query = explode('@', $query);
        $queryBroker = "\\App\\QueryBroker\\$query[0]";
        if(($existingBroker = array_search($queryBroker, self::$initializedBrokers)) !== false)
            $queryBroker = $existingBroker;
        else{
            $queryBroker = new $queryBroker();
            self::$initializedBrokers[] = $queryBroker;
        }
        return $queryBroker->{$query[1]}();
    }
}