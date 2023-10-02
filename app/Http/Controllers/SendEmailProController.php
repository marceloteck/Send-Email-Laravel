<?php

namespace App\Http\Controllers;

use App\Models\professionalModel;
use Illuminate\Http\Request;
use Inertia\Inertia;


class SendEmailProController extends Controller
{
    public $indexEmail;
    public $editEmail;
    public function __construct()
    {
        $this->editEmail = 'Pages/email/editEmail';
        $this->indexEmail = 'Pages/email/indexEmail';
    }
    public function index()
    {
        return Inertia::render($this->indexEmail);
    }
    public function editEmail()
    {
        return Inertia::render($this->editEmail);
    }
    public function viewEmail()
    {
        return view('TemplatesEmail/CurriculoEmail', [
            'dadosUser' => professionalModel::all(),
        ]);
    }
    public function SendEmail(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'job' => 'required|string',
                'email' => 'required|email',
                'whatsapp' => 'required|numeric',
                'codtecno' => 'required|string',
                'linkedin' => 'nullable|string',
                'github' => 'nullable|string',
                'facebook' => 'nullable|string',
            ]);

            professionalModel::create($data);

            return Inertia::render($this->editEmail, [
                'resposta' => 'Cadastrado com sucesso!',
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return Inertia::render($this->editEmail, [
                'resposta' => 'Não foi possivel cadastrar',
                'status' => 'error'
            ]);
        }













    }
}