<p>You have ordered arts from Wall Of Frame.</p>

Tracking Number: {{ $transaction->tracking_number }}<br/>
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
<p>This order will be delivered with a quality time to you shipping address. Thank you for the purchase.</p>
<p>
    Thanks,<br/>
    Wall OF Frame
</p>
