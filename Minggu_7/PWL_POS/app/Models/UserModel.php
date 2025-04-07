<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; //Implementasi class Authenticatable

class UserModel extends Model
class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //mendefinisikan primary key tabel yang digunakan oleh model ini

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password'
        'password',
        'created_at',
        'updated_at'
     ];
 
     protected $hidden = ['password'];
 
     protected $casts = ['password' => 'hashed'];
 
     public function level():BelongsTo{
         return $this->belongsTo(LevelModel::class, 'level_id','level_id');
         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
     }
 
 }
