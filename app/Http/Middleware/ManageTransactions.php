<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ManageTransactions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    // بدء معاملة قاعدة البيانات
    DB::beginTransaction();

    try {
        $response = $next($request);

        // تحقق من رمز الاستجابة للطلب
        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            // الطلب ناجح، تأكيد المعاملة
            DB::commit();
        } else {
            // الطلب فشل، التراجع عن المعاملة
            DB::rollBack();
        }

        return $response;
    } catch (\Exception $e) {
        // حدث استثناء، التراجع عن المعاملة
        DB::rollBack();
        // يمكنك إعادة رمي الاستثناء أو التعامل معه بطريقة أخرى
        throw $e;
    }    }
}
