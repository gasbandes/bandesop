<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Personal;
use App\Imports\PersonalImport;
use Livewire\WithFileUploads;


class Personals extends Component
{
    use WithPagination, WithFileUploads;


	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tx_nombres, $tx_apellidos, $nu_cedula,$empresa_id, $gerencia_id, $tipo_empleado, $status, $usuario_id, $file;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.personals.view', [
            'personals' => Personal::latest()
						->orWhere('tx_nombres', 'LIKE', $keyWord)
						->orWhere('nu_cedula', 'LIKE', $keyWord)
						->orWhere('tx_apellidos', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->orWhere('gerencia_id', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						//->orWhere('usuario_id', 'LIKE', $keyWord)
						->get(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->tx_nombres = null;
        $this->tx_apellidos = null;
		$this->nu_cedula = null;
		$this->tx_gerencia = null;
		$this->empresa_id = null;
		$this->gerencia_id = null;
		$this->tipo_empleado = null;
		$this->nu_telefono = null;
		//$this->fe_nacimiento = null;
		$this->status = null;
		//$this->usuario_id = null;
    }

    public function store()
    {

       // dd($this->gerencia_id);
        $personal = new Personal();

        $personal->tx_nombres = $this->tx_nombres;
        $personal->tx_apellidos = $this->tx_apellidos;
        $personal->nu_cedula = $this->nu_cedula;
        $personal->status = $this->status;
        $personal->empresa_id = \Auth::user()->empresa_id;
        $personal->gerencia_id = $this->gerencia_id;
        $personal->tipo_empleado = $this->tipo_empleado;
        $personal->usuario_id = \Auth::user()->id;
        $personal->save();
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Personal Successfully created.');
    }

    public function edit($id)
    {
        $record = Personal::findOrFail($id);

        $this->selected_id = $id;
		$this->tx_nombres = $record->tx_nombres;
		$this->nu_cedula = $record->nu_cedula;
		$this->tx_apellidos = $record->tx_apellidos;
		$this->empresa_id = $record->empresa_id;
		$this->gerencia_id = $record->gerencia_id;
		$this->status = $record->status;
        $this->tipo_empleado = $record->tipo_empleado;

		$this->usuario_id = $record->usuario_id;

        $this->updateMode = true;
    }

    public function update()
    {


        if ($this->selected_id) {
			$personal = Personal::find($this->selected_id);
            $personal->tx_nombres = $this->tx_nombres;
            $personal->tx_apellidos = $this->tx_apellidos;
            $personal->nu_cedula = $this->nu_cedula;
            $personal->status = $this->status;
            $personal->empresa_id = \Auth::user()->empresa_id;
            $personal->gerencia_id = $this->gerencia_id;
            $personal->tipo_empleado = $this->tipo_empleado;
            $personal->usuario_id = \Auth::user()->id;
            $personal->save();

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Personal Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Personal::where('id', $id);
            $record->delete();
        }
    }

     public function reversar()
    {

        $personal = Personal::where('tipo_empleado',2)
                  ->update(['tipo_empleado' => 1]);



       session()->flash('message', 'Personal Reversado.');
    }


     public function import()
    {

        //dd($this->file);

        Excel::import(new PersonalImport, $this->file);
        session()->flash('message', 'Importación cargada satisfactoriamente');
    }

}
