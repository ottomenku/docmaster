<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pay extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pays';

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
    protected $fillable = ['user_id','admin_id','action_id','billingdata_id','order_id','type','total','days','note'];

  
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function admin()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function billingdata()
    {
        return $this->belongsTo('App\Billingdata');
    }
 
    public function roletime()
    {
        return $this->hasMany('App\Roletime');
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
