<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'contacts';
protected $fillable = [
		'id',
		'user_id',
        'name',
        'email',
        'subject',
        'message',
        'status',
		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function user(){
      return $this->hasOne(\App\Models\User::class);
   }

   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($contact) {
         });
   }
		
}
