<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Gerencia\Entities\Gerencia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GerenciasExport;
use App\Imports\GerenciasImport;
use Livewire\WithFileUploads;


class Gerencias extends Component
{
    use WithPagination;
    use WithFileUploads;

     public $file;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $empresa_id, $descripcion;
    public $updateMode = false;
    public $perPage = '5';
    public $selectedRows = [];
    public $selectPageRows = false;



    public function render()
    {

		$keyWord = '%'.$this->keyWord .'%';
        $pagina = $this->perPage;
        return view('livewire.gerencias.view', [
            'gerencias' => Gerencia::with('ente')
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->get(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	

     public function clear()
    {

        $this->keyWord = '';
    }

    private function resetInput()
    {		
		$this->empresa_id = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'empresa_id' => 'required',
		'descripcion' => 'required',
        ]);

        Gerencia::create([ 
			'empresa_id' => $this->empresa_id,
			'descripcion' => $this->descripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Gerencia Successfully created.');
    }

    public function edit($id)
    {
        $record = Gerencia::findOrFail($id);

        $this->selected_id = $id; 
		$this->empresa_id = $record-> empresa_id;
		$this->descripcion = $record-> descripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'empresa_id' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Gerencia::find($this->selected_id);
            $record->update([ 
			'empresa_id' => $this->empresa_id,
			'descripcion' => $this->descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Gerencia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Gerencia::where('id', $id);
            $record->delete();
        }
    }

    public function export()
    {
        return Excel::download(new GerenciasExport, 'gerencias.xlsx');
    }

    public function import()
    {
        Excel::import(new GerenciasImport, $this->file);
        session()->flash('message', 'Gerencia Successfully updated.');
    }
}
