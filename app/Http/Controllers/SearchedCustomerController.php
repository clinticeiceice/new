<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCustomerRequest;
use App\Models\Customer;
use App\Services\CustomersFromKeyword;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SearchedCustomerController extends Controller
{

    public function index(SearchCustomerRequest $request)
    {
        $customers=(new CustomersFromKeyword)->get($request->keyword);
                            
        $customers=new Paginator($customers->all(),10);
                
        return view('pages.customers-list',[
                            'customers'=>$customers,
                            'keyword'=>$request->keyword
                    ]);
    }

   
}
