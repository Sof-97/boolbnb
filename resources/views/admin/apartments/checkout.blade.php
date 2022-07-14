@extends('layouts.backOffice')
@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex-center position-ref full-height">
        <form id="payment-form" action="{{ route('admin.checkout', [$apartment, $sponsorship]) }}" method="post">
            @csrf
            @method('POST')
            <div id="dropin-container"></div>
            <input type="hidden" id="nonce" name="payment_method_nonce" />
            <input type="submit" class="button_accent" />
        </form>
    </div>
@endsection

@section('script')
    <script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.js"></script>
    <script type="text/javascript">
        const form = document.getElementById('payment-form');
        let token = "{{ $token }}"


        // Step two: create a dropin instance using that container (or a string
        //   that functions as a query selector such as `#dropin-container`)
        braintree.dropin.create({
            locale: 'it-IT',
            container: document.getElementById('dropin-container'),
            authorization: token,
            // ...plus remaining configuration
        }, (error, dropinInstance) => {
            if (error) console.error(error)
            form.addEventListener('submit', event => {
                event.preventDefault();
                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
            // Use `dropinInstance` here
            // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        });
    </script>
@endsection
