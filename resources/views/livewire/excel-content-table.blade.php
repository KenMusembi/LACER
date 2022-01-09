

    <div class="py-12">
    <div class="row ">
            <a href="{{ url('excelcontent/export') }}"> Export </a>                                
        

        <form action="/excelcontent/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="file"/>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

 
                <div class="w-full flex pb-7">
    
    <div class="w-4/6 mx-1">
                        <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
                    </div>
        
                    <div class="w-1/6 relative mx-1">            
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

        <div class="w-1/6 relative mx-1">
            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>           
        </div>

        <div class="w-1/6 relative mx-1">
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
                        <x-table-column>Invoice Number</x-table-column>
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

