<?php

namespace App\Filters;

use Closure;

class CatFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->has('bread_name')) {
            $query->where('bread_name','like','%'.request()->get('bread_name').'%');
        }

        if (request()->has('temperament')) {
            $query->where('temperament','like','%'.request()->get('temperament').'%');
        }

        foreach (request()->except('temperament','bread_name') as $key => $value){
            $query->where($key,$value);
        }
        return $next($query);
    }
}
