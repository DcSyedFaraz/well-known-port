<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Website  extends Authenticatable
{

    public $table = "websites";

    public $timestamps = false;

    protected $fillable = [
        'title',
        'domain',
        'slug',
        'api_token',
    ];

    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }

}
