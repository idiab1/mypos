@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Home page')}}
@endsection


{{-- Page name --}}
@section('page_name')
    {{__('Dashboard')}}
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><pre id="token_response"></pre></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary btn-block" onclick="pay(10)">Pay $10</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-success btn-block" onclick="pay(50)">Pay $50</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-info btn-block" onclick="pay(100)">Pay $100</button>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
<script src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    function pay(amount) {
        var handler = StripeCheckout.configure({
        key: 'pk_test_51IQO3HDwgXWB6jTgxuqWbcN3IcI7KJsMwYij3mjf9bPMvinDjIdKn4yYEXCHkkgck1nGGupJnpR4wwy8PqslpZ2K00Xr0DfA6w', // your publisher key id
        locale: 'auto',
        token: function (token) {
            // You can access the token ID with `token.id`.
            // Get the token ID to your server-side code for use.
            console.log('Token Created!!');
            console.log(token)
            $('#token_response').html(JSON.stringify(token));
            $.ajax({
                url: '{{ url("store") }}',
                method: 'post',
                data: { tokenId: token.id, amount: amount },
                success: (response) => {
                    console.log(response)
                },
                error: (error) => {
                    console.log(error);
                    alert('Oops! Something went wrong')
                }
            })
        }
    });
    handler.open({
        name: 'Demo Site',
        description: '2 widgets',
        amount: amount * 100
    });
}
</script>
@endsection


