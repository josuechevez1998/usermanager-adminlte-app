<?php

namespace App\Http\Controllers;

use App\Models\GeneralWallet;
use App\Http\Requests\GeneralWalletRequest;
use Illuminate\Http\Request;

/**
 * Class GeneralWalletController
 * @package App\Http\Controllers
 */
class GeneralWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalWallets = GeneralWallet::paginate();

        return view('general-wallet.index', compact('generalWallets'))
            ->with('i', (request()->input('page', 1) - 1) * $generalWallets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generalWallet = new GeneralWallet();
        return view('general-wallet.create', compact('generalWallet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneralWalletRequest $request)
    {
        GeneralWallet::create($request->validated());

        return redirect()->route('general-wallets.index')
            ->with('success', 'GeneralWallet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $generalWallet = GeneralWallet::find($id);

        return view('general-wallet.show', compact('generalWallet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $generalWallet = GeneralWallet::find($id);

        return view('general-wallet.edit', compact('generalWallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralWalletRequest $request, GeneralWallet $generalWallet)
    {
        $generalWallet->update($request->validated());

        return redirect()->route('general-wallets.index')
            ->with('success', 'GeneralWallet updated successfully');
    }

    public function destroy($id)
    {
        GeneralWallet::find($id)->delete();

        return redirect()->route('general-wallets.index')
            ->with('success', 'GeneralWallet deleted successfully');
    }

    // API REQUEST
    public function getAll(Request $request)
    {
        return response()->json([], 200);
    }
}
