<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\UserController;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];


    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // public function getNameAttribute($name){
    //     return ucfirst($name);
    // }

    public static function uploadAvatar($image){
        $fileName= $image->getClientOriginalName();
        
        (new self())->deleteOldImage();
        $image->storeAs('images', $fileName, 'public');
        auth()->user()->update(['avatar'=>$fileName]);
    }

    protected function deleteOldImage(){
      
        if($this->image){
            Storage::delete('/public/images/'. $this->image);
        }
    }
}
