@extends('layouts.main')

@section('title','Payment Form')
@section('content')
<main>
    <form action="{{ route('payment-result') }}" method="POST">
            @csrf
            <label for="price">Price ::
            <input type="number" id="price" name="price" value="0" required><br><br></label>
        
            
            <input type="checkbox" id="has" name="hasVat">
            <label for="hasVat">Has VAT (7%)::</label>
        
        
            <input type="radio" id="vatIncluded" name="vatOption" value="included" checked>
            <label for="vatIncluded">VAT Included in Price</label>
        
            <input type="radio" id="vatExcluded" name="vatOption" value="excluded">
            <label for="vatExcluded">VAT Excluded in Price</label><br>
            
            <br>
            <input type="checkbox" id="has" name="hasTax">
            <label for="hasTax">Has Tax ::</label>
    
            <input type="radio" id="tax5" name="taxPercentage" value="5">
            <label for="tax5">Tax 5%</label>
        
            <input type="radio" id="tax3" name="taxPercentage" value="3" checked>
            <label for="tax3">Tax 3%</label>
        
            <input type="radio" id="tax2" name="taxPercentage" value="2">
            <label for="tax2">Tax 2%</label>
        
            <input type="radio" id="tax1" name="taxPercentage" value="1">
            <label for="tax1">Tax 1%</label>
            <br></br>
    
        
        <button \ type="submit">Calculate</button>
    </form>
    </main>
    @endsection