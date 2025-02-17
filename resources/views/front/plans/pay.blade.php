@extends('layouts.simple')
@section('page-title', 'Plans')

@section('styles')

    @if (config('paypal.mode') == 'sandbox')
        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&vault=true"></script>
    @else
        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_LIVE_CLIENT_ID') }}&vault=true"></script>
    @endif

@endsection

@section('content')
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">


            <div class="col-lg-6 col-xl-6 col-xxl-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Plan Details
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="ps-0">
                                        <a class="fw-semibold" href="javascript:void(0)">Price</a>
                                        <div class="fs-sm text-muted">Per Annum</div>
                                    </td>
                                    <td class="pe-0 fw-medium text-end">
                                        {{ config('app.currency_symbol') }}{{ $plan->price }}</td>
                                </tr>

                            </tbody>

                        </table>

                        <div class="text-center d-flex justify-content-center">
                            <!-- PayPal Button Container -->
                            <div id="paypal-button-container"></div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    /* Creates the subscription */
                    plan_id: 'P-5KR760659G103732HM6ZYVSQ'
                });
            },
            onApprove: function(data, actions) {
                console.log(data, actions);
                // create form and submit
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('user.plans.success') }}";

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'subscription_id';
                input.value = data.subscriptionID;
                form.appendChild(input);

                document.body.appendChild(form);

                // add csrf token
                var csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = "{{ csrf_token() }}";
                form.appendChild(csrf);

                form.submit();
            }
        }).render('#paypal-button-container'); // Renders the PayPal button
    </script>
@endpush
