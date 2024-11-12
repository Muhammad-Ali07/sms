<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function generateBuiltyCounter($tableName, $fieldName) {
        // Retrieve the last valid counter from the specified table and field
        $lastCode = DB::table($tableName)
                      ->where($fieldName, 'LIKE', '_____')  // Filter to only get codes of 4 digits (0001, 0002, etc.)
                      ->orderBy($fieldName, 'desc')        // Sort by the field in descending order
                      ->value($fieldName);                 // Get the last valid counter code

        // If no valid code exists, start with 0001
        if (!$lastCode) {
            return '00001';
        }

        // Convert the last code to an integer
        $numericPart = (int)$lastCode;
        // Increment the numeric part by 1
        $newNumber = $numericPart + 1;

        // Pad the new number with leading zeros to maintain 4 digits
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        // Return the new counter value
        return $formattedNumber; // Example: 0005
    }

    public function generateUniqueCode($tableName, $field)
    {
        // Get the current day and month
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $company_id = 1;
        // Get the last record for the current day and month using a raw SQL query
        $lastRecord = DB::table($tableName)
                        ->where($field, 'like', $day.$month.'%')
                        ->orderBy($field, 'desc')
                        // ->where('self_company', $company_id)
                        ->first();
    
        // Initialize the starting number
        $newNumber = 1;
        // If a record exists, increment the number part of the code
        if ($lastRecord) {
            // Extract the numeric part from the last record's code
            $lastNumber = intval(substr($lastRecord->$field, 5));
    
            // Increment the last number
            $newNumber = $lastNumber + 1;
        }
    
        // Format the new code with leading zeros for the number part
        // $uniqueCode = $day . $month . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        $uniqueCode =  str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return $uniqueCode;
    }
    
    public static function documentCode($doc_data){
        $model = $doc_data['model'];
        $code_field = $doc_data['code_field'];
        $code_prefix = $doc_data['code_prefix'];
        $form_type_field = isset($doc_data['form_type_field'])?$doc_data['form_type_field']:"";
        $form_type_value = isset($doc_data['form_type_value'])?$doc_data['form_type_value']:"";
        $company_id = 1;
        $modelN = 'App\Models\\'.$model;

        if(!empty($form_type_field) && !empty($form_type_value)){
            $max = $modelN::where($form_type_field,$form_type_value)->where('self_company',1)->max($code_field);
        }else{
            $max = $modelN::where('self_company',1)->max($code_field);
        }

        // max = "SP-0000000", type = "SP"
        if(!empty($max)){

            $max = explode('-',$max);
            $max = end($max);
            $max = $max+1;
        }else{
            $max = 1;
        }
        $new_code =  sprintf("%'05d", $max); // return 12 to 0000012
        $code = strtoupper($code_prefix)."-".$new_code; // return "SP-0000012"
        return $code; // return "SP-0000012"
    }
    
    public function generateJobCode($tableName, $fieldName) {
        // Retrieve the last code from the specified table and field
        $lastCode = DB::table($tableName)
                      ->orderBy($fieldName, 'desc')   // Sort by the field in descending order
                      ->value($fieldName);            // Get the value of the latest field
        
        // If no code is found, start with 0001
        if (!$lastCode) {
            return '0001';
        }
    
        // Increment the last code by 1
        $newCode = (int)$lastCode + 1;
        
        // Pad the new code with leading zeros to maintain 4 digits
        return str_pad($newCode, 4, '0', STR_PAD_LEFT);
    }
    
    // public function generateCodeFromName($name) {
    //     // Split the name into an array of words (by space)
    //     $nameParts = explode(' ', $name);
        
    //     // If the name contains at least two parts (first and last name)
    //     if (count($nameParts) > 1) {
    //         // Extract first character from the first name
    //         $firstChar = strtoupper($nameParts[0][0]);
            
    //         // Extract first two characters from the last name
    //         $lastName = $nameParts[count($nameParts) - 1]; // Get last word as the last name
    //         $lastChars = strtoupper(substr($lastName, 0, 2));
            
    //         // Combine the characters to form the code
    //         return $firstChar . $lastChars;
    //     } else {
    //         // If there's only one part (single name), take the first 3 characters
    //         return strtoupper(substr($nameParts[0], 0, 3));
    //     }
    // }
    
    public function generateCustomerCode($tableName, $fieldName, $customerName) {
        // Step 1: Extract the last 3 characters from the last inserted code
        $lastCode = DB::table($tableName)
                      ->orderBy($fieldName, 'desc')  // Get the last inserted code
                      ->value($fieldName);           // Retrieve the code
    
        // Step 2: Generate a new numeric part
        if ($lastCode) {
            // Extract the numeric part (the part after the hyphen)
            $numericPart = (int) substr($lastCode, strpos($lastCode, '-') + 1);
            // Increment the numeric part by 1
            $newNumber = $numericPart + 1;
        } else {
            // If no code is found, start with 0001
            $newNumber = 1;
        }
    
        // Format the new number with leading zeros (4 digits)
        $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    
        // Step 3: Extract 3 characters from the customer name
        $customerName = strtoupper($customerName);  // Ensure the name is in uppercase
        $nameParts = explode(' ', $customerName);
    
        if (count($nameParts) > 1) {
            // If the name has more than one part, use the first letter from the first name and two letters from the last name
            $firstChar = $nameParts[0][0];
            $lastChars = substr($nameParts[1], 0, 2);
        } else {
            // If only one name is provided, take the first three letters
            $firstChar = substr($nameParts[0], 0, 1);
            $lastChars = substr($nameParts[0], 1, 2);
        }
    
        // Combine the characters to form the 3-letter code
        $threeLetterCode = strtoupper($firstChar . $lastChars);
    
        // Step 4: Concatenate the 3-letter code with the formatted number
        $customerCode = $threeLetterCode . '-' . $formattedNumber;
    
        return $customerCode;
    }

    public function generateWalkinCustomerCode($tableName, $fieldName) {
            // Retrieve the last walk-in customer code from the specified table and field
            $lastCode = DB::table($tableName)
                          ->where('cutomer_type', 'Walkin')      // Filter by walk-in customers
                          ->orderBy($fieldName, 'desc')           // Sort by the field in descending order
                          ->value($fieldName);                    // Get the last walk-in customer code
    
            // If no code exists, start with W-0001
            if (!$lastCode) {
                return 'W-0001';
            }
    
            // Extract the numeric part (after the hyphen) from the last code
            $numericPart = (int) substr($lastCode, strpos($lastCode, '-') + 1);
    
            // Increment the numeric part by 1
            $newNumber = $numericPart + 1;
    
            // Pad the new number with leading zeros to maintain 4 digits
            $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    
            // Create the new walk-in customer code
            return 'W-' . $formattedNumber; // Example: W-0011
        }

    // Function to generate new computer number
    public function generateComputerNo($tableName, $fieldName, $prefix) {
        // Capitalize the first three letters of the prefix
        $prefix = strtoupper(substr($prefix, 0, 3)); // Take the first three characters and convert to uppercase

        // Retrieve the last computer number for the given prefix
        $lastComputerNo = DB::table($tableName)
            ->where($fieldName, 'like', $prefix . '-%') // Find all matching prefixes
            ->orderBy($fieldName, 'desc') // Order by field in descending order
            ->value($fieldName); // Get the last computer number

        // If no computer number is found, start with 0001
        if (!$lastComputerNo) {
            return $prefix . '-0001'; // No previous entry, start with 0001
        }

        // Extract the numeric part from the last computer number
        preg_match('/-(\d+)$/', $lastComputerNo, $matches); // Extract the number after '-'
        $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0; // Get the number, default to 0 if not found

        // Increment the last number
        $newNumber = $lastNumber + 1;

        // Format the new number to be 4 digits with leading zeros
        $newComputerNo = $prefix . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return $newComputerNo; // Return the new computer number
    }


}
