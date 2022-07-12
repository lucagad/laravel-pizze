<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
    
    public function pizzas(){
        return $this->belongsToMany('App\Pizza');
    }

    public static function generateSlug($name){
        $slug = Str::slug($name, '-');
        $standard_slug = $slug;
        $i = 0;

        $is_already_present = Pizza::where('slug', $slug)->first();

        while($is_already_present){
            $slug = $standard_slug . '-' . $i;
            $i++;
            $is_already_present = Pizza::where('slug', $slug)->first();
        }

        return $slug;
    }

}
