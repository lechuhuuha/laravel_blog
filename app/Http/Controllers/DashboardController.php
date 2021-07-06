<?php

use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin-auth')->only('editUsers');
        $this->middleware('team-member')->except('editUsers');
    }
}
