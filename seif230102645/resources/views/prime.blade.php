<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeNumberController extends Controller
{
  
    public function isPrime(Request $request)
    {
        $number = $request->input('number');
        
        if (!is_numeric($number) || $number < 2) {
            return response()->json(['error' => 'Please enter a valid positive integer greater than 1.']);
        }
        
        if ($this->checkPrime($number)) {
            return response()->json(['result' => "$number is a prime number."]);
        }
        
        return response()->json(['result' => "$number is not a prime number."]);
    }


    private function checkPrime($number)
    {
        if ($number <= 1) return false;
        if ($number <= 3) return true;
        
        if ($number % 2 == 0 || $number % 3 == 0) return false;
        
        for ($i = 5; $i * $i <= $number; $i += 6) {
            if ($number % $i == 0 || $number % ($i + 2) == 0) {
                return false;
            }
        }
        
        return true;
    }
}
