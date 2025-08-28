<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        // Check if status was changed to completed
        if ($order->isDirty('status') && $order->status === 'completed') {
            // Only increment if the previous status wasn't already completed
            $originalStatus = $order->getOriginal('status');
            // Only increment for premium fonts (price > 0), free fonts handle their own increment
            if ($originalStatus !== 'completed' && $order->font && $order->font->price > 0) {
                $order->font->incrementDownloadCount();
            }
            
            // Set completed_at timestamp if not already set (without triggering another update event)
            if (!$order->completed_at) {
                $order->completed_at = now();
                $order->saveQuietly(); // Save without triggering events
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
