<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserEventSubscriber
{
    /**
     * Handle user login events
     *
     */
    public function handleUserLogin($event)
    {
        Cart::instance('cart')
        ->restore($event->user->instanceCartName());
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleUserLogout($event)
    {
        // dd($event);
        // dd(Cart::instance('cart')->count()->count());
        if(Cart::instance('cart')->count() > 0) {
            Cart::instance('cart')
            ->store($event->user->instanceCartName());
        }
    } 

    /**
     * Register he listeners for the subscribe
     * 
     * @param \Illuminate\Events\Dispatcher $event
     */
    public function subscribe($event)
    {
        $event->listen(
            'Illuminate\Auth\Events\login',
            'App\Listeners\UserEventSubscriber@handleUserLogin'
        );

        $event->listen(
            'Illuminate\Auth\Events\login',
            'App\Listeners\UserEventSubscriber@handleUserLogout'
        );
    }
}
