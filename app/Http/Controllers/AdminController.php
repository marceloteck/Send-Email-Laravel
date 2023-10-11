<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public $indexAdmin;
    public $newEmail;
    public $modeloEmail;
    public $Authentication;
    public function __construct()
    {
        $this->indexAdmin = 'Pages/admin/index';
        $this->newEmail = 'Pages/admin/newEmail';
        $this->modeloEmail = 'Pages/admin/modeloEmail';
        $this->Authentication = auth()->check();
    }

    public function index()
    {
        return Inertia::render($this->indexAdmin, [
            'isLoggindStatus' => $this->Authentication,
        ]);
    }
    public function newEmail()
    {
        return Inertia::render($this->newEmail);
    }
    public function modeloEmail()
    {
        return Inertia::render($this->modeloEmail);
    }
}