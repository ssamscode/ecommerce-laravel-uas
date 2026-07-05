<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::with(['user', 'product'])
            ->latest()
            ->get();

        return view(
            'pages.admin.history.index',
            compact('histories')
        );
    }

    public function detail($id)
    {
        $data = History::with(['user', 'product'])
            ->findOrFail($id);

        return view(
            'pages.admin.history.detail',
            compact('data')
        );
    }
}