<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class BackupsController extends Controller
{
    public function index() 
    { 
        return view('backups.index');
    }

    public function clean() 
    { 
        Artisan::call("backup:clean");
        return redirect()->route('backup.index');
    }

    public function all() 
    { 
        Artisan::call("backup:run");
        return redirect()->route('backup.index');
    }

    public function onlyDb() 
    { 
        Artisan::call("backup:run --only-db");
        return redirect()->route('backup.index');
    }

    public function onlyFiles() 
    { 
        Artisan::call("backup:run --only-files");
        return redirect()->route('backup.index');
    }


}
