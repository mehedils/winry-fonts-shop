<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function create(Font $font)
    {
        // For free fonts, redirect to download
        if ($font->price == 0) {
            return $this->download($font);
        }

        $paymentMethods = PaymentMethod::active()->ordered()->get();

        return view('orders.create', compact('font', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'font_id' => 'required|exists:fonts,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'note' => 'nullable|string|max:1000',
            'payment_method' => 'required|string',
            'transaction_id' => 'required|string|max:100',
            'payment_screenshot' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
        ]);

        $font = Font::findOrFail($validated['font_id']);

        // Prevent creating orders for free fonts
        if ($font->price == 0) {
            return redirect()->route('fonts.download', $font)->with('info', 'এই ফন্টটি ফ্রি। সরাসরি ডাউনলোড করুন।');
        }

        // Handle screenshot upload
        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $screenshotPath = $request->file('payment_screenshot')->store('orders/screenshots', 'public');
        }

        // Create order
        $order = Order::create([
            'font_id' => $font->id,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'],
            'note' => $validated['note'],
            'payment_method' => $validated['payment_method'],
            'transaction_id' => $validated['transaction_id'],
            'payment_screenshot' => $screenshotPath,
            'amount' => $font->price,
            'status' => 'pending'
        ]);

        return redirect()->route('orders.success', $order->uuid)->with('success', 'আপনার অর্ডার সফলভাবে জমা দেওয়া হয়েছে। আমরা শীঘ্রই যাচাই করে আপনাকে জানাবো।');
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }

    public function download(Font $font)
    {
        if ($font->price > 0) {
            return redirect()->route('orders.create', $font)->with('error', 'এই ফন্টটি পেইড। অনুগ্রহ করে কিনুন।');
        }

        if (!$font->file_path || !Storage::disk('public')->exists($font->file_path)) {
            return back()->with('error', 'ফন্ট ফাইল পাওয়া যায়নি।');
        }

        // Increment download count
        $font->incrementDownloadCount();

        return Storage::disk('public')->download($font->file_path, $font->name . '.zip');
    }
}
