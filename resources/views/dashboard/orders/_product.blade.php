{{-- {{$products}} --}}

<div id="print-area">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @if ($products->count())
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>{{$product->pivot->quantity * $product->sale_price}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="total-price">
        <p class="d-inline-block font-weight-bold">Total Price</p> &colon;
        <span class="total">
            {{$order->total_price}}
        </span>
    </div>
    <button class="btn btn-primary btn-print" type="submit">
        <i class="fas fa-print"></i> Print
    </button>

</div>
