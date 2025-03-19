<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'code' => 'required|unique:coupons',
        'discount' => 'required|numeric',
        'expires_at' => 'nullable|date',
    ]);

    $coupon = Coupon::create($request->all());

    return response()->json($coupon, 201);
}
public function index()
{
    $coupons = Coupon::all();
    return response()->json($coupons);
}
public function show($id)
{
    $coupon = Coupon::findOrFail($id);
    return response()->json($coupon);
}
public function update(Request $request, $id)
{
    $request->validate([
        'code' => 'required|unique:coupons,code,' . $id,
        'discount' => 'required|numeric',
        'expires_at' => 'nullable|date',
    ]);

    $coupon = Coupon::create([
        'code' => $request->input('code'),
        'discount' => $request->input('discount'),
        'expires_at' => $request->input('expires_at', null), 
        'created_at' => now(),  
        'updated_at' => now(),  
    ]);

    $coupon = Coupon::findOrFail($id);
    $coupon->update($request->all());

    return response()->json($coupon);
}
public function destroy($id)
{
    $coupon = Coupon::findOrFail($id);
    $coupon->delete();

    return response()->json(['message' => 'Coupon deleted successfully']);
}

}