@extends('layouts.main')

@section('title', 'Payment Result')
@section('content')
<main>
    <h1>Payment-Result</h1>

    <div class="grid-container">
        <div class="grid-item">
            <p><b>Price excluding VAT <span style="color: blue;">::</span></span> </b>
                <b>{{ number_format((float) $priceExcludeVat, 2) }}</p></b>
        </div>

        <div class="grid-item">
            @if ($message === '')
            <p><b>VAT Cost (7%) <span style="color: blue;">::</span> </b>
            {{ number_format((float) $vatCost, 2) }}</p>

            <p><b>Payment including VAT <span style="color: blue;">::</span> </b>
                <b><span class="double-underline">{{ number_format((float) $priceIncludeVat, 2) }}</span></p></b>

            <p><b>Tax Cost <span style="color: blue;">::</span> </b>
            {{ number_format($taxCost, 2) }}</p>
            @endif

            @if ($message === 'No Tax')
            <p><b>VAT Cost (7%) <span style="color: blue;">::</span> </b>{{ number_format((float) $vatCost, 2) }}</p>

            <p><b>Payment including VAT <span style="color: blue;">::</span></b>
            <b><span class="double-underline">{{ number_format((float) $priceIncludeVat, 2) }}</span></p></b>
            @endif
        </div>

        <div class="grid-item">
            @if (!empty($message))
            <p><em>{!! nl2br(e($message)) !!}</em></p>
            @endif

            @if ($message === 'No Vat')
            <p><b>Tax Cost <span style="color: blue;">::</span> </b>
            {{ number_format($taxCost, 2) }}</p>
            @endif

            <p><b>Payment <span style="color: blue;">::</span> </b>
           <b> <span class="double-underline">{{ number_format((float) $payment, 2) }}</span></p></b>

           <button class="back-button" onclick="window.location.href='/payment-form'">Back</button>
        </div>
    </div>

</main>
@endsection

@section('styles')

@endsection

