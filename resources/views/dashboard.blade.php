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
                        <!-- below we have our table to showcase the marvel characters-->
                        <table id="table_id" class="table table-hover table-responsive w-full whitespace-nowrap">
                            <thead class=" thead-dark">

                            </thead>
                            <tbody>
                                <!-- we loop through the array with characters from the controller -->
                                @foreach($marvel_characters as $data)

                                <tr>

                                    <td class="border px-6 py-6"><img src="
                                {{ $data['thumbnail']['path'] }}.{{ $data['thumbnail']['extension'] }}
                                " alt="{{$data['name']}}">{{$data['name']}}

                                    </td>
                                    <td>
                                        @if($data['description'] == '')
                                        <p>
                                            No description of this character is available available.
                                        </p>
                                        @else
                                        {{$data['description']}}<br>
                                        @endif
                                        <a class="btn btn-primary float-right" role="button" href="http://marvel.com">Read More</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>

                        <a class="btn btn-primary float-right" role="button" href="/dashboard/offset/{{$offset}}">Load More</a><br>
                        <a href="{{$marvel_characters_attribution['attributionHTML']}}">{{$marvel_characters_attribution['attributionText']}} </a>
                    </div>

                </div>
            </div>
        </div>




    </x-app-layout>