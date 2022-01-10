<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExcelContent;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Jobs\ImportJob;
use App\Jobs\ExportJob;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class ExcelContentTable extends Component
{
    use WithFileUploads, WithPagination;

    //variable for pagination of the table
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'invoiceNo';
    public $orderAsc = true;

    //variables for file import with livewire
    public $batchId;
    public $importFile;
    public $importing = false;
    public $importFilePath;
    public $importFinished = false;

    public $exporting = false;
    public $exportFinished = false;

    //import function
    public function import()
    {
        $this->validate([
            'importFile' => 'required',
        ]);

        $this->importing = true;
        $this->importFilePath = $this->importFile->store('imports');

        $batch = Bus::batch([
            new ImportJob($this->importFilePath),
        ])->dispatch();

        $this->batchId = $batch->id;
    }

    public function getImportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function updateImportProgress()
    {
        $this->importFinished = $this->importBatch->finished();

        if ($this->importFinished) {
            Storage::delete($this->importFilePath);
            $this->importing = false;
            return back()->withStatus("Excel file Imported Succesffuly. Refresh page.");
        }
    }


    //exporting
    public function export()
    {
        $this->exporting = true;
        $this->exportFinished = false;

        $batch = Bus::batch([
            new ExportJob(),
        ])->dispatch();

        $this->batchId = $batch->id;
    }

    public function getExportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function downloadExport()
    {
        return Storage::download('stock_invoice.csv');
    }

    public function updateExportProgress()
    {
        $this->exportFinished = $this->exportBatch->finished();

        if ($this->exportFinished) {
            $this->exporting = false;
            return back()->withStatus("Excel file Loaded, Click below to export.");
        }
    }

    
    public function render()
    {        

        return view('livewire.excel-content-table',[
            'excel_content' => ExcelContent::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage),
        ]);
    }
}
