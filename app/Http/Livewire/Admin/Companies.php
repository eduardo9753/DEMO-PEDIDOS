<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
    public $company_id;
    public $razon_social_empresa;
    public $sucursal_empresa;
    public $logotipo_empresa;
    public $numero_ruc_empresa;
    public $direccion_empresa;
    public $mapa_empresa;
    public $numero_uno_empresa;
    public $numero_dos_empresa;
    public $numero_tres_empresa;
    public $correo_empresa;
    public $user_id;

    public $companies;


    public function mount()
    {
        $this->companies = Company::all();
    }

    public function render()
    {
        return view('livewire.admin.companies');
    }

    public function create()
    {
        $this->validate([
            'razon_social_empresa' => 'required',
            'numero_ruc_empresa' => 'required',
            'direccion_empresa' => 'required',
            'mapa_empresa' => 'required',
            'numero_uno_empresa' => 'required',
            'correo_empresa' => 'required',
        ]);

        Company::create([
            'razon_social_empresa' => $this->razon_social_empresa,
            'numero_ruc_empresa' => $this->numero_ruc_empresa,
            'direccion_empresa' => $this->direccion_empresa,
            'mapa_empresa' => $this->mapa_empresa,
            'numero_uno_empresa' => $this->numero_uno_empresa,
            'numero_dos_empresa' => $this->numero_dos_empresa,
            'correo_empresa' => $this->correo_empresa,
            'user_id' => auth()->user()->id
        ]);

        $this->reload();
        $this->resetFormFields();
    }

    public function edit($id)
    {
        $company = Company::find($id);
        $this->company_id = $company->id;
        $this->razon_social_empresa = $company->razon_social_empresa;
        $this->numero_ruc_empresa = $company->numero_ruc_empresa;
        $this->direccion_empresa = $company->direccion_empresa;
        $this->mapa_empresa = $company->mapa_empresa;
        $this->numero_uno_empresa = $company->numero_uno_empresa;
        $this->numero_dos_empresa = $company->numero_dos_empresa;
        $this->correo_empresa = $company->correo_empresa;
    }

    public function update()
    {
        $this->validate([
            'razon_social_empresa' => 'required',
            'numero_ruc_empresa' => 'required',
            'direccion_empresa' => 'required',
            'mapa_empresa' => 'required',
            'numero_uno_empresa' => 'required',
            'correo_empresa' => 'required',
        ]);

        $company = Company::find($this->company_id);
        $company->update([
            'razon_social_empresa' => $this->razon_social_empresa,
            'numero_ruc_empresa' => $this->numero_ruc_empresa,
            'direccion_empresa' => $this->direccion_empresa,
            'mapa_empresa' => $this->mapa_empresa,
            'numero_uno_empresa' => $this->numero_uno_empresa,
            'numero_dos_empresa' => $this->numero_dos_empresa,
            'correo_empresa' => $this->correo_empresa,
            'user_id' => auth()->user()->id
        ]);

        $this->reload();
        $this->resetFormFields();
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();

        $this->reload();
        $this->resetFormFields();
    }

    public function reload()
    {
        $this->companies = Company::all();
    }

    public function resetFormFields()
    {
        $this->company_id = '';
        $this->razon_social_empresa = '';
        $this->numero_ruc_empresa = '';
        $this->direccion_empresa = '';
        $this->mapa_empresa = '';
        $this->numero_uno_empresa = '';
        $this->numero_dos_empresa = '';
        $this->correo_empresa = '';
    }
}
