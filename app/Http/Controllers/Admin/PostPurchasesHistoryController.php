<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchasesHistory;
use Illuminate\Http\Request;

class PostPurchasesHistoryController extends Controller
{
    public function status_change(Request $request, PurchasesHistory $purchases_history)
    {
        $row = $purchases_history::find($request->id);
        $row->Status = $request->status;
        $row->save();
        return back();
    }
}
