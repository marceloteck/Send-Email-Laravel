<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public $indexAdmin;
    public function __construct()
    {
        $this->indexAdmin = 'Pages/admin/index';
    }

    public function index()
    {
        return Inertia::render($this->indexAdmin);
    }
}