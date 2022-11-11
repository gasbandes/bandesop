<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Operativo;

class Operativos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $usuario_id, $personal_id, $ente_id, $gerencia_id, $producto_id, $mes, $year, $hora, $cantidad, $confirmed;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.operativos.view', [
            'operativos' => Operativo::latest()
						->orWhere('usuario_id', 'LIKE', $keyWord)
						->orWhere('personal_id', 'LIKE', $keyWord)
						->orWhere('ente_id', 'LIKE', $keyWord)
						->orWhere('gerencia_id', 'LIKE', $keyWord)
						->orWhere('producto_id', 'LIKE', $keyWord)
						->orWhere('mes', 'LIKE', $keyWord)
						->orWhere('year', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('cantidad', 'LIKE', $keyWord)
						->orWhere('confirmed', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->usuario_id = null;
		$this->personal_id = null;
		$this->ente_id = null;
		$this->gerencia_id = null;
		$this->producto_id = null;
		$this->mes = null;
		$this->year = null;
		$this->hora = null;
		$this->cantidad = null;
		$this->confirmed = null;
    }

    public function store()
    {
        $this->validate([
		'usuario_id' => 'required',
		'personal_id' => 'required',
		'ente_id' => 'required',
		'gerencia_id' => 'required',
		'producto_id' => 'required',
		'mes' => 'required',
		'year' => 'required',
		'hora' => 'required',
		'cantidad' => 'required',
		'confirmed' => 'required',
        ]);

        Operativo::create([ 
			'usuario_id' => $this-> usuario_id,
			'personal_id' => $this-> personal_id,
			'ente_id' => $this-> ente_id,
			'gerencia_id' => $this-> gerencia_id,
			'producto_id' => $this-> producto_id,
			'mes' => $this-> mes,
			'year' => $this-> year,
			'hora' => $this-> hora,
			'cantidad' => $this-> cantidad,
			'confirmed' => $this-> confirmed
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Operativo Successfully created.');
    }

    public function edit($id)
    {
        $record = Operativo::findOrFail($id);

        $this->selected_id = $id; 
		$this->usuario_id = $record-> usuario_id;
		$this->personal_id = $record-> personal_id;
		$this->ente_id = $record-> ente_id;
		$this->gerencia_id = $record-> gerencia_id;
		$this->producto_id = $record-> producto_id;
		$this->mes = $record-> mes;
		$this->year = $record-> year;
		$this->hora = $record-> hora;
		$this->cantidad = $record-> cantidad;
		$this->confirmed = $record-> confirmed;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'usuario_id' => 'required',
		'personal_id' => 'required',
		'ente_id' => 'required',
		'gerencia_id' => 'required',
		'producto_id' => 'required',
		'mes' => 'required',
		'year' => 'required',
		'hora' => 'required',
		'cantidad' => 'required',
		'confirmed' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Operativo::find($this->selected_id);
            $record->update([ 
			'usuario_id' => $this-> usuario_id,
			'personal_id' => $this-> personal_id,
			'ente_id' => $this-> ente_id,
			'gerencia_id' => $this-> gerencia_id,
			'producto_id' => $this-> producto_id,
			'mes' => $this-> mes,
			'year' => $this-> year,
			'hora' => $this-> hora,
			'cantidad' => $this-> cantidad,
			'confirmed' => $this-> confirmed
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Operativo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Operativo::where('id', $id);
            $record->delete();
        }
    }
}
