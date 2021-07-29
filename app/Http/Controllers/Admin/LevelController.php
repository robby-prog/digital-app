<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function create()
    {
        return view('admin.levels.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:levels'
        ]);

        Level::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.level')->with('success', 'Level Created Successfully!');
    }
}
