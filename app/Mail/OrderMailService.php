<?php

namespace App\Mail;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMailService extends Mailable
{
    use Queueable, SerializesModels;

    protected $orders = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $orders)
    {
        $this->orders = $orders;
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Order Successfull',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $products = $this->orders->orderItems()->get();
        $products->map(function ($product) {
            $product->name = Product::find($product->product_id)->title;
            return $product;
        });

        return new Content(
            view: 'OrderConfirm',
            with: [
                'orders' => $this->orders,
                'products' => $products,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
