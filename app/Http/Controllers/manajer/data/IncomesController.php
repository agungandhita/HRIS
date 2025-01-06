<?php

namespace App\Http\Controllers\manajer\data;

use App\Models\Daily;
use App\Models\Monthly;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomesController extends Controller
{
    public function index()
    {
        $dailyIncomes = Daily::with('user')
            ->orderBy('income_date', 'desc')
            ->paginate(10);

        $monthlyIncomes = Monthly::with('user')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->paginate(10);

        return view('manajer.incomes.index', compact('dailyIncomes', 'monthlyIncomes'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'income_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi foto
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/income_images', $imageName);
            $imagePath = 'income_images/' . $imageName;
        }

        $dailyIncome = Daily::create([
            'user_id' => auth()->user()->user_id,
            'amount' => $validated['amount'],
            'income_date' => $validated['income_date'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'user_created' => auth()->user()->user_id
        ]);

    }

    public function show($id)
    {
        $income = Daily::findOrFail($id);
        return view('incomes.show', compact('income'));
    }
}
