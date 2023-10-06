<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public $indexAdmin;
    public $Authentication;
    public function __construct()
    {
        $this->indexAdmin = 'Pages/admin/index';
        $this->Authentication = auth()->check();
    }

    public function index()
    {
        return Inertia::render($this->indexAdmin, [
            'isLoggindStatus' => $this->Authentication,
        ]);
    }
}