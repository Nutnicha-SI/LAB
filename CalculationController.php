<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class CalculationController extends Controller
{
     function showForm(): View
    {
        return view('example-01-form');
    }
    function showareaForm(): View
    {
        return view('area-form');
    }
    function showpaymentForm(): View
    {
        return view('payment-form');
    }
    function showmulForm(): View
    {
        return view('mul-form');
    }

     function showResult(ServerRequestInterface $request): View
    {
        $data = $request->getParsedBody();
        $price = (float)$data['price'];
        $discount = (float)$data['discount'];
        $discountCost = $discount / 100 * $price;
        $netPrice = $price - $discountCost;

        return view('example-01-result', [
            'price' => $price,
            'discount' => $discount,
            'discountCost' => $discountCost,
            'netPrice' => $netPrice,
        ]);
    }
    function showareaResult(ServerRequestInterface $request): View
    {
        $data = $request->getParsedBody();
        $option = $data['option'];
        $width = (float) $data['width'];
        $height = (float) $data['height'];
        $area = 0;

        // Calculate area based on the selected option
        if ($option === 'Rectangular') {
            $area = $width * $height;
        } elseif ($option === 'Triangle') {
            $area = 0.5 * $width * $height;
        }

        return view('area-result', [
            'option' => $option,
            'width' => $width,
            'height' => $height,
            'area' => $area,
        ]);
    }
   
    function showpaymentResult(ServerRequestInterface $request): View
    {
        $data = $request->getParsedBody();
        $price = (float) $data['price'];
        $priceExcludeVat = $price; 
    
        
        $taxCost = 0;
        if (isset($data['hasTax'])) {
            $taxPercentage = (float) $data['taxPercentage'];
            if (isset($data['hasVat']) && $data['hasVat'] === 'included') {
               
                $priceIncludeVat = $price; 
                $taxCost = $priceIncludeVat * (100 / 107) * ($taxPercentage / 100);
            } else {
               
                $taxCost = $price * ($taxPercentage / 100);
            }
        }
    
       
        $vatCost = 0;
        if (isset($data['hasVat'])) {
            $vatOption = $data['vatOption'];
            if ($vatOption === 'included') {
             
                $priceExcludeVat = $price * (100 / 107);
               
                $vatCost = $price - $priceExcludeVat;
         
                if (isset($data['hasTax'])) {
                    $taxPercentage = (float) $data['taxPercentage'];
                    $taxCost = $price * (100 / 107) * ($taxPercentage / 100);
                }
            } else {
               
                $priceExcludeVat = $price;
                $vatCost = $price * (7 / 100);
                if (isset($data['hasTax'])) {
                    $taxPercentage = (float) $data['taxPercentage'];
                    $taxCost = $price * ($taxPercentage / 100);
                }
            }
        }
    
     
        $priceIncludeVat = $priceExcludeVat + $vatCost;
    
        $message = '';
        if (!isset($data['hasTax']) && !isset($data['hasVat'])) {
            $message = "No Tax\nNo Vat";
        } elseif (!isset($data['hasTax'])) {
            $message = 'No Tax';
        } elseif (!isset($data['hasVat'])) {
            $message = 'No Vat';
        }
    
      
        if (isset($data['hasTax']) && isset($data['hasVat'])) {
       
            $payment = $priceIncludeVat - $taxCost;
        } elseif (!isset($data['hasTax']) && isset($data['hasVat'])) {
            
            $payment = $priceIncludeVat;
        } elseif (isset($data['hasTax']) && !isset($data['hasVat'])) {
            
            $payment = $priceExcludeVat - $taxCost;
        } else {
          
            $payment = $priceExcludeVat + $taxCost;
        }
    
        return view('payment-result', [
            'price' => $price,
            'priceExcludeVat' => $priceExcludeVat,
            'priceIncludeVat' => $priceIncludeVat,
            'vatCost' => $vatCost,
            'taxCost' => $taxCost,
            'payment' => $payment, 
            'message' => $message,
        ]);
    }
    
    

    
    function showmulResult(ServerRequestInterface $request): View
    {
        $data = $request->getParsedBody();
        
        if (!isset($data['number'])) {
            
            return redirect()->back()->withErrors('Please select a number.');
        }
        $number = (int) $data['number']; 
        if ($number < 2 || $number > 12) {
            
            return redirect()->back()->withErrors('Please select a number between 2 and 12.');
        }
        $multiplicationTable = [];
    
      
        for ($k = 2; $k <= $number; $k++) {
            $table = [];
            for ($j = 1; $j <= 12; $j++) {
                $table[] = [
                    'multiplier' => $k,
                    'multiplicand' => $j,
                    'result' => $k * $j,
                ];
            }
            $multiplicationTable[] = $table;
        }
    
      
        return view('mul-result', [
            'number' => $number,
            'multiplicationTable' => $multiplicationTable,
        ]);
    }
}    