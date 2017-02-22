<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    protected $table = 'cache';
    public $timestamps = false;

    public function getAllCache()
    {
        $caches = $this->get();

        $cache = new \stdClass();
        foreach ($caches as $key => $value) {
            $cache->{$value['key']} = $value['value'];
        }
        return $cache;
    }

    public function saveCache($key, $value)
    {
        $Cache = $this;
        $cache = $Cache->where('key', '=', $key)->get();
        if (count($cache) > 0) {
            $Cache->where('key', '=', $key)
                ->update(['value' => $value]);
        } else {
            $Cache->key = $key;
            $Cache->value = $value;
            $Cache->expiration = 0;
            $Cache->save();
        }
    }
}
