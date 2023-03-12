<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index');
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        // dd($id);
        return Inertia::render('Inertia/Show',
        [
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => [
                'required',
                'max:20'
            ],
            'content' => [
                'required'
            ]
        ]);

        $inerTiaTest          = new InertiaTest();
        $inerTiaTest->title   = $request->title;
        $inerTiaTest->content = $request->content;
        $inerTiaTest->save();

        return to_route('inertia.index');
    }
}
