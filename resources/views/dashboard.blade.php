<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marvel Characters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                <table id="table_id" class="table table-hover table-responsive w-full whitespace-nowrap">
    <thead class=" thead-dark">
       
    </thead>
    <tbody>
        
    @foreach($marvel_characters as $data)
                       
                            <tr>
                            
                            <td class="border px-6 py-6"><img src="
                            {{ $data['thumbnail']['path'] }}.{{ $data['thumbnail']['extension'] }}
                            " alt="{{$data['name']}}">{{$data['name']}}
                                
</td>                            
<td class="border px-6 py-5">{{$data['description']}}<br>
<a class="btn btn-primary float-right" role="button" href="http://marvel.com">Read More</a>
</td>
<td class="border px-6 py-2">
                                
</td>
                            </tr>
                       
                        @endforeach
    </tbody>
</table>  
<a href="{{$marvel_characters_attribution['attributionHTML']}}">{{$marvel_characters_attribution['attributionText']}}    </a>        
                </div>
                
            </div>
        </div>
    </div>
   
      
            
    
</x-app-layout>
  
<script>
    $(document).ready( function () {
    $('#table_id').DataTable({
        paging: true,
        serverside:true
    });
} );
</script>