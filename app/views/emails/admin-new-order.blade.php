<p>New order has been received.</p>

Tracking Number: {{ $transaction->tracking_number }}<br/>
Buyer: {{ $transaction->user->present()->name }}<br/>
Email: {{ $transaction->user->present()->email }}<br/>
Total Amount: {{ $transaction->total_amount }}<br/>
Products:
<ul>
    <?php
        $products = json_decode($transaction->products);
        if(count($products)):
            foreach($products as $product) :?>
            <li>Name: {{ $product->name }} <br/>
            Size: {{ $product->options->width .'&quot; x '. $product->options->height . '&quot;' }} <br/>
            Quality: {{ $product->qty }} <br/>
            SubTotal: {{ $product->subtotal }}</li>
        <?php
            endforeach;
        endif;
     ?>
</ul>

<p>This is an automated message. No need to reply.</p>
