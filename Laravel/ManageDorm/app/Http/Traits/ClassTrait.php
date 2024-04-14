<?php
    namespace App\Http\Traits;
    trait ClassTrait {
        public function checkRequestData($request){
            $requestData = $request->all();
            $filteredData = array_filter($requestData, function($value) {
                return !is_null($value);
            });
            if(count($filteredData) != count($requestData)){
                return false;
            }
            return true;
        }
    }
?>