<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu)
    {
        $user = Auth::user();

        if ($user->level_id === 2 || $user->level_id === 3) {
            return redirect()->back();
        }

        return view('menu.index', [
            'foods' => $menu->where('category','food')->latest()->get(),
            'drinks' => $menu->where('category', 'drink')->latest()->get(),
            'dessert' => $menu->where('category', 'dessert')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->level_id === 2 || $user->level_id === 3) {
            return redirect()->back();
        }

        return view('menu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateddata = $request->validate([
           'name' => 'required|min:3',
           'modal' => 'required|regex:/([0-9]+[.,]*)+/',
           'price' => 'required|regex:/([0-9]+[.,]*)+/|gte:modal',
           'category' => 'required',
           'image' => 'required|image|file|max:3048',
           'description' => 'required'
        ]);


        $validateddata["modal"] = filter_var($request->modal, FILTER_SANITIZE_NUMBER_INT);
        $validateddata["price"] = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $validateddata["picture"] = $request->file('image')->store('menu');

        Menu::create($validateddata);

        $activity = [
            'user_id' => Auth::id(),
            'action' => 'added a menu '.strtolower($request->name)
        ];

        ActivityLog::create($activity);
        return redirect('/menu')->with('success','New menu has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Menu $menu)
    {
        $id = $request->id;
        $menu = $menu->find($id);
        $menu->diff = $menu->created_at->diffForHumans();;
        return $menu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $user = Auth::user();

        if ($user->level_id === 2 || $user->level_id === 3) {
            return redirect()->back();
        }
        
        return view('menu.edit', [
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validateddata = $request->validate([
            'name' => 'required|min:3',
            'modal' => 'required|regex:/([0-9]+[.,]*)+/',
            'price' => 'required|regex:/([0-9]+[.,]*)+/|gte:modal',
            'category' => 'required',
            'picture' => 'image|file|max:3048',
            'description' => 'required'
        ]);


        $validateddata["modal"] = filter_var($request->modal, FILTER_SANITIZE_NUMBER_INT);
        $validateddata["price"] = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);

        if ($request->file('picture')) {
            Storage::delete($menu->picture);
            $validateddata['picture'] = $request->file('picture')->store('menu'); 
        }
        
        Menu::where('id', $menu->id)
             ->update($validateddata);

        $activity = [
            'user_id' => Auth::id(),
            'action' => 'edited a menu '.strtolower($menu->name)
        ];
        ActivityLog::create($activity);

        return redirect('/menu')->with('success', 'menu has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->picture);   
        $menu->destroy($menu->id);
        $activity = [
            'user_id' => Auth::id(),
            'action' => 'deleted a menu '.strtolower($menu->name)
        ];
        ActivityLog::create($activity);
        return redirect('/menu');
    }

}

