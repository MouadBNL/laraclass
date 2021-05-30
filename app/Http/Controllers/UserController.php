<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        \DB::beginTransaction();

        try {
            
            $data = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

                'roles' => 'present|array',
                'roles.*' => 'exists:roles,id',
                
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // Hashing user password
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);

            $user->roles()->sync($data['roles']);

            \DB::commit();
            return redirect()->route('user.index')->with('status', 'Enseignant ajouter avec succès.');

        } catch (\Throwable $th) {
            \DB::rollback();
            return redirect()->back()->with('status', 'Oups! une erreur s\'est produite, veuillez réessayer.');
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        \DB::beginTransaction();

        try {
            
            $data = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id .',id'],

                'roles' => 'present|array',
                'roles.*' => 'exists:roles,id',
                
            ]);

            $user->update($data);

            $user->roles()->sync($data['roles']);

            \DB::commit();
            return redirect()->route('user.index')->with('status', 'Enseignant ajouter avec succès.');

        } catch (\Throwable $th) {
            \DB::rollback();
            return redirect()->back()->with('status', 'Oups! une erreur s\'est produite, veuillez réessayer.');
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status', 'Enseignant supprimer avec succès.');
    }
}
