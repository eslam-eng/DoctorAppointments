<?php

namespace App\Http\Controllers;

use App\Models\User;
use Sentinel;
use Illuminate\Support\Facades\Auth;

class LocalizationController extends Controller
{

    public function __invoke($locale)
    {
        if (!in_array($locale,config('app.availableLocales'))) {
            abort(400);
        }
        $expire_in = 7 * 60 * 24;
        $previous_url = str_replace(url('/'), '', url()->previous());
        setLanguage($locale);
        if (!in_array($locale,config('app.availableLocales'))) {
            abort(400);
        }
        $previous_url = str_replace(url('/'), '', url()->previous());
        $user = Sentinel::getUser();
        User::query()->where('id',$user->id)->update(['lang'=>$locale]);
        setLanguage($locale);
        return redirect($previous_url)->cookie('user-language', $locale,$expire_in);

    }
}
