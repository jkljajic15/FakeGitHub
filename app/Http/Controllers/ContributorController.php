<?php

namespace App\Http\Controllers;

use App\Contributor;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function __invoke(Contributor $contributor){

        $contributor->delete();
        return redirect()->back();
    }
}
