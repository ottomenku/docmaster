<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bariontransaction extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bariontransactions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *    
     * @var array
     */
    protected $fillable = ['time','user_id','billingdata_id','order_id','total','days'];

  
    public function user()
    {
        return $this->belongsTo('App\User');
    }
      public function barion()
    {
        return $this->hasMany('App\Barion');
    }
    public function billingdata()
    {
        return $this->belongsTo('App\Billingdata');
    }
    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
