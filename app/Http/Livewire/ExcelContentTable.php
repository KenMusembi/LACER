<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExcelContent;
use Livewire\WithPagination;

class ExcelContentTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'invoiceNo';
    public $orderAsc = true;
    
    public function render()
    {        

        return view('livewire.excel-content-table',[
            'excel_content' => ExcelContent::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage),
        ]);
    }
}
