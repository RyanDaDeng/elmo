<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/3
 * Time: 9:28 PM
 */

namespace App\Modules\UI\Controllers;


use App\Http\Controllers\Controller;

class UIController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('ui::index');
    }

}