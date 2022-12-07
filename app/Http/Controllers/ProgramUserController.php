<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramUserController extends Controller
{
    public function store(Request $request)
    {
        $program = Program::find($request['program_id']);
        $program->users()->attach(auth()->user()->id);
        return redirect($request['program_link']);
    }
}
