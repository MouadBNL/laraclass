<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::paginate(20);
        return view('subject.index', compact(['subjects']));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'unique:subjects,name']
        ]);
        $data['name'] = ucwords(strtolower($data['name']));

        Subject::create($data);
        return redirect()->route('subject.index')->with('status', 'Matière crée avec succès.');
    }

    public function show(Subject $subject)
    {
        //
    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    public function update(Subject $subject)
    {
        $data = request()->validate([
            'name' => ['required', 'unique:subjects,name,'. $subject->id .',id']
        ]);

        $subject->update($data);
        return redirect()->back()->with('status', 'Matière modifier avec succès.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('status', 'Matière supprimer avec succès.');
    }
}
