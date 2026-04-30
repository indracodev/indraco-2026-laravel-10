<?php

namespace App\Traits;

use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait HasLogAktivitas
{
    public static function bootHasLogAktivitas()
    {
        static::created(function ($model) {
            $model->createLog('created');
        });

        static::updated(function ($model) {
            $model->createLog('updated');
        });

        static::deleted(function ($model) {
            $model->createLog('deleted');
        });
    }

    public function createLog($action)
    {
        $oldData = null;
        $newData = null;

        if ($action === 'updated') {
            $newData = array_intersect_key($this->getAttributes(), $this->getDirty());
            $oldData = array_intersect_key($this->getOriginal(), $this->getDirty());
        } elseif ($action === 'created') {
            $newData = $this->getAttributes();
        } elseif ($action === 'deleted') {
            $oldData = $this->getOriginal();
        }

        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aktivitas' => $action,
            'model' => get_class($this),
            'model_id' => $this->id,
            'data_lama' => $oldData ? json_encode($oldData) : null,
            'data_baru' => $newData ? json_encode($newData) : null,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'url' => Request::fullUrl(),
        ]);
    }

    public function logView()
    {
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aktivitas' => 'viewed',
            'model' => get_class($this),
            'model_id' => $this->id,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'url' => Request::fullUrl(),
        ]);
    }
}
