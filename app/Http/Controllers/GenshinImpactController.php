<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GenshinImpactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $elementId = $request->query('element_id');
        $playable = $request->query('is_playable');
        $sort = $request->query('sort', 'name');

        if (! in_array($sort, ['name', 'rarity'])) {
            $sort = 'name';
        }

        $query = Character::with('element');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($elementId !== null && $elementId !== '') {
            $query->where('element_id', $elementId);
        }

        if ($playable !== null && $playable !== '') {
            $query->where('is_playable', $playable);
        }

        $characters = $query
        ->orderBy($sort)
        ->paginate(6)
        ->withQueryString();
        
        $elements = Element::all();

        return view('characters.index', [
            'characters' => $characters,
            'elements' => $elements,
            'search' => $search,
            'elementId' => $elementId,
            'playable' => $playable,
            'sort' => $sort,
        ]);
    }

    public function create()
    {
        $elements = Element::all();

        return view('characters.create', compact('elements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'element_id' => 'required|exists:elements,id',
            'weapon' => 'required|in:Sword,Claymore,Polearm,Catalyst,Bow',
            'rarity' => 'required|numeric|in:4,5',
            'is_playable' => 'required|boolean',
            'remarks' => 'nullable',
        ]);

        Character::create($validated);

        return redirect()
            ->route('characters.index')
            ->with('success', 'Character added successfully.');
    }

    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    public function edit(Character $character)
    {
        $elements = Element::all();

        return view('characters.edit', compact('character', 'elements'));
    }

public function update(Request $request, Character $character)
{
    $validated = $request->validate([
        'name' => 'required|max:100',
        'element_id' => 'required|exists:elements,id',
        'weapon' => 'required|in:Sword,Claymore,Polearm,Catalyst,Bow',
        'rarity' => 'required|numeric|in:4,5',
        'is_playable' => 'required|boolean',
        'remarks' => 'nullable',
    ]);

    $character->update($validated);

    Log::info('Character updated', [
        'id' => $character->id,
    ]);

    return redirect()->route('characters.index');
}

public function destroy(Character $character)
{
    abort_if($character->element->characters()->count() === 1, 403);

    $character->delete();

    return redirect()->route('characters.index');
}

    public function featured()
    {
        $character = Character::with('element')->findOrFail(4);

        return view('characters.featured', compact('character'));
    }
}
