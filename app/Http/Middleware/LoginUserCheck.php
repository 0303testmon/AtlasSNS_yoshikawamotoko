<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
         //ログインユーザーIDを取得
        //  $loginId = Auth::id();
         //カート情報のユーザーIDを取得
        //  $requestId = $request->username;
        //   $requestId->middleware('auth');

         //ログイン者とカート情報作成者が一致しなければ別のページにリダイレクト
        //  if ($loginId != $requestId) {
        //     return redirect(route('login'));
        //  }



       public function handle($request, Closure $next)
   {


      //チェックに合格し次の処理に進むことができる
      return $next($request);
      }

}
