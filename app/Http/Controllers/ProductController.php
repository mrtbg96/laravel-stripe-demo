<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('index', [
            'products' => Product::all(),
            'orders' => Order::all()
        ]);
    }

    public function checkout(Request $request)
    {
        $lineItems = [];
        $totalPrice = 0;
        $products = Product::all();

        foreach ($products as $product) {
            $totalPrice += $product->price;
            $lineItems[] = [
                'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $product->name,
                    'images' => [$product->image]
                ],
                'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ];
        }

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route(name: 'success', absolute: true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route(name: 'cancel', absolute: true)
        ]);

        Order::create([
            'status' => 'unpaid',
            'total_price' => $totalPrice,
            'session_id' => $session->id
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        try {
            $sessionId = $request->get('session_id');

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

            $session = $stripe->checkout->sessions->retrieve($sessionId);

            if (! $session) {
                abort(404);
            }

            $order = Order::where('session_id', $sessionId)
                ->first();

            if (!$order) {
                abort(404);
            }

            if ($order->status == 'unpaid') {
                $order->update([
                    'status' => 'paid'
                ]);
            }

            return view('success', [
                'customer' => User::find(1)
            ]);

        } catch(\Exception $exception) {
            \Log::error("Payment Success Error: $exception");
            abort(404);
        }
    }

    public function cancel()
    {
        return view('cancel');
    }

    public function webhook()
    {
        $event = null;
        $payload = @file_get_contents('php://input');

        try {
            $event = \Stripe\Event::constructFrom(json_decode($payload, true));
        } catch(\UnexpectedValueException $e) {
            return response('', 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::where('session_id', $session->id)
                    ->first();

                if ($order && $order->status == 'unpaid') {
                    $order->update([
                        'status' => 'paid'
                    ]);
                }

                break;
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('', 200);
    }
}
