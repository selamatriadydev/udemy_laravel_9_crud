<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UpdateEnvController extends Controller
{
    public function edit(){
        return view('crud.Env.edit');
    }

    public function update(Request $request){
        dd($request->all());
        $request->validate([
            'host' => 'required',
            'email' => 'required|email',
        ]);

        // Artisan::call('env:set MAIL_HOST='.$request->host);

        // Artisan::call('config:clear');

        return redirect()->route('env.edit')->with('success', "Data updated is succesfully");
    }
}
