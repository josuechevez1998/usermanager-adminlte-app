<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralWallet
 *
 * @property $id
 * @property $month
 * @property $year
 * @property $balance
 * @property $userId
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GeneralWallet extends Model
{

    protected $table = 'general_wallets';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['month', 'year', 'balance', 'userId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'userId', 'id');
    }


}
