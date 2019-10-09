<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class shop extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'shop';

        protected $fillable = [
            'name', 'phone','img','description', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }