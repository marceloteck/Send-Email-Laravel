<?php

namespace App\Http\Controllers;

use App\Models\modelosModel;
use App\Models\professionalModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public $indexAdmin;
    public $newEmail;
    public $modeloEmail;
    public $Authentication;
    public $tableProfessional;
    public $modelosModel;

    public function __construct()
    {
        $this->indexAdmin = 'Pages/admin/index';
        $this->newEmail = 'Pages/admin/newEmail';
        $this->modeloEmail = 'Pages/admin/modeloEmail';
        $this->Authentication = auth()->check();
        $this->tableProfessional = professionalModel::all();
        $this->modelosModel = modelosModel::all();
    }

    public function index()
    {
        return Inertia::render($this->indexAdmin, [
            'isLoggindStatus' => $this->Authentication,
        ]);
    }
    public function newEmail()
    {
        return Inertia::render($this->newEmail, [
            'tableProfessional' => $this->tableProfessional,
        ]);
    }
    public function modeloEmail()
    {
        return Inertia::render($this->modeloEmail, [
            'modelosModel' => $this->modelosModel,
        ]);
    }
}