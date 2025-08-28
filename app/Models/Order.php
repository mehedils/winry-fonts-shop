<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'uuid',
        'font_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'note',
        'payment_method',
        'transaction_id',
        'payment_screenshot',
        'amount',
        'status',
        'admin_notes',
        'approved_at',
        'completed_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime'
    ];

    // Relationships
    public function font()
    {
        return $this->belongsTo(Font::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Mutators
    public function generateOrderNumber()
    {
        $this->order_number = 'ORD-' . now()->format('Ymd') . '-' . str_pad($this->id ?? rand(1000, 9999), 4, '0', STR_PAD_LEFT);
    }

    // Boot method to generate order number and UUID
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            if (!$order->order_number) {
                $order->order_number = 'ORD-' . now()->format('Ymd') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            }
            if (!$order->uuid) {
                $order->uuid = (string) Str::uuid();
            }
        });
    }

    // Route key name for URL binding
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
