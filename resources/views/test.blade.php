@extends('layouts.app')

<div>
    <pre>
        {{ print_r($cartItems) }}
    </pre>
</div>


@section('footer_scripts')
    <script>
        $(document).ready((e) => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/cart/toggle-cart-item',
                type: 'post',
                data: {
                    productId: 1,
                },
                success: (response) => {
                    console.log('ok');
                    console.log(response);
                },
                error: (e) => {
                    console.log('error');
                    console.log(e);
                }
            });
        });
        console.log('script')
    </script>

@endsection
