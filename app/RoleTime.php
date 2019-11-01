<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Roletime extends Model
{
    use LogsActivity;
    use SoftDeletes; //add this line
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'admin_id', 'role_id', 'pay_id', 'note', 'start', 'end'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
  
    public function user()
    {
        return $this->belongsTo('App\User');
    }
 public function admin()
    {
        return $this->belongsTo('App\User','admin_id');
    }
      public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function pay()
    {
        return $this->belongsTo('App\Pay');
    }
   
/**
 * visszatér az előző jog lejártának időpontjával vagy a mai nappal 
 */
    public static function getRoleStart($user_id, $role_id)
    {
        $date = Carbon::now();
        $dateStr=Carbon::now()->format('Y-m-d'); 
        $roletimes = Roletime::where([
            ['user_id', '=', $user_id],
            ['role_id', '=', $role_id],
        ])->orderBy('end', 'DESC')->first();

        $startStr = $roletimes->end ?? $dateStr;
        $start =Carbon::createFromFormat('Y-m-d', $startStr);
        if ($start < $date) {$startStr = $dateStr;}
        return $startStr;
    }
    public static function hasRole($user_id, $role_id)
    {
        $res = false;
        $date = Carbon::now();
        $roletimes = Roletime::where([
            ['user_id', '=', $user_id],
            ['role_id', '>=', $role_id],
        ])->get();
        foreach ($roletimes as $roletime) {
            if ($roletime->start <= $date && $roletime->end >= $date) {$res = true;}
        }

        return $res;
    }

}
