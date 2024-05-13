<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block; // Assuming your model for blocks is named 'Block'

class MinedTransactionController extends Controller
{
    public function index()
    {
        $blocks = Block::all();
        return view('home.index', compact('blocks'));
    }

    public function show($id)
    {
        $block = Block::find($id);
        return view('home.index', compact('block'));
    }
}
