<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

trait Loggable {
    public static function bootLoggable() {
        static::created(function ($model) {
            static::logChange($model, 'created');
        });

        static::updated(function ($model) {
            static::logChange($model, 'updated');
        });

        static::deleted(function ($model) {
            static::logChange($model, 'deleted');
        });
    }

    protected static function logChange($model, $action) {
        // هنا يمكنك تنفيذ الكود الخاص بك لتسجيل التغييرات
        // على سبيل المثال، يمكنك استخدام نموذج Log لتخزين البيانات في قاعدة البيانات
        Log::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'model_type' => get_class($model),
            'model_id' => $model->getKey(),
            'action' => $action,
            'changes' => $action == 'updated' ? $model->getChanges() : [],
            // يمكنك إضافة المزيد من التفاصيل حسب الحاجة
        ]);
    }
}