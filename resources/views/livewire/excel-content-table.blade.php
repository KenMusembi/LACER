
   
       <div class="py-12">    
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        </div>
    @endif
    @if(isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
       @foreach($errors->all() as $error)
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
         @endforeach
    </div>
    @endif
         
    <div class="mb-4 d-flex justify-content-between">
    <div>
    <a wire:click="export" class="btn btn-outline-primary">Export</a>

    @if($exporting && !$exportFinished)
        <div class="d-inline" wire:poll="updateExportProgress">Exporting...please wait.</div>
    @endif

    @if($exportFinished)
        Done. Download file <a class="stretched-link" wire:click="downloadExport">here</a>
    @endif
</div>                 
    

                        <div>
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        @csrf
        <input type="file" wire:model="importFile" class="@error('import_file') is-invalid @enderror">
        <button class="btn btn-outline-secondary">Import</button>
        @error('import_file')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </form>

    @if($importing && !$importFinished)
        <div wire:poll="updateImportProgress">Importing...please wait.</div>
    @endif

    @if($importFinished)
        Finished importing.
    @endif
</div>
                    </div>
        <!-- -->

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <div class="container"> 
          
  
 
                <div class="row">
    
    <div class="col-6">
                        <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
                    </div>
        
                    <div class="col-2">            
        <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="invoiceNo">Invoice Number</option>
                <option value="stockCode">Stock Code</option>
                <option value="description">Description</option>
                <option value="quantity">Quantity</option>
                <option value="invoiceDate">Invoice Date</option>
                <option value="unitPrice">Unit Price</option>                
                <option value="customerID">Customer ID</option>
                <option value="country">Country</option>                
            </select>            
        </div>

        <div class="col-2">
            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>           
        </div>

        <div class="col-2">
            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>           
        </div>       
</div>


                <x-table>
                    <x-slot name=header>
                        <x-table-column >Invoice Number</x-table-column>
                        <x-table-column>Stock Code</x-table-column>
                        <x-table-column>Description</x-table-column>
                        <x-table-column>Quantity</x-table-column>
                        <x-table-column>Invoice Date</x-table-column>
                        <x-table-column>Unit Price</x-table-column>
                        <x-table-column>Customer ID</x-table-column>
                        <x-table-column>Country</x-table-column>
                    </x-slot>
                    @foreach($excel_content as $content)
                            <tr>
                                <x-table-column>{{$content->invoiceNo}}</x-table-column>
                                <x-table-column>{{$content->stockCode}}</x-table-column>
                                <x-table-column>{{$content->description}}</x-table-column>
                                <x-table-column>{{$content->quantity}}</x-table-column>
                                <x-table-column>{{$content->invoiceDate}}</x-table-column>
                                <x-table-column>{{$content->unitPrice}}</x-table-column>
                                <x-table-column>{{$content->customerID}}</x-table-column>
                                <x-table-column>{{$content->country}}</x-table-column>
                            </tr>
                        @endforeach
                </x-table>
                <div>
                {!! $excel_content->links() !!}  
                </div>                              
                </div>
            </div>
        </div>
    </div>
