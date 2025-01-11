<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {

        /** @var User $user */
        $user = auth()->user();
        $user->links()->create($request->validated());

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        // $this->authorize('atualizar', $link);

        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        // $this->authorize('atualizar', $link);

        $link->fill($request->validated())
        ->save();

        return to_route('dashboard')
        ->with('message', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $this->authorize('atualizar', $link);

        $link->delete();

        return to_route('dashboard')->with('message', 'Deletado com sucesso!');
    }

    public function up(Link $link)
    {   
        $this->authorize('atualizar', $link);

        $link->moveUp();

        return back();
    }
    
    public function down(Link $link)
    {
        $this->authorize('atualizar', $link);

        $link->moveDown();

        return back();
    }
}
