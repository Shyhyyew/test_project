@extends('layout.app')

@section('main')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            @foreach($data as $item)
                <div class="p-10 w-6/12" x-data="{ id: @js($item->id) }" :id="'data-'+id">
                    <div class="shadow-2xl rounded-xl bg-white">
                        <div class="p-4 border-b flex justify-between">
                            <span>
                                Data id <b>{{ $item->id }}</b>
                            </span>
                            <span @click="deleteItem(id)" class="text-gray-400 hover:text-red-400 cursor-pointer">
                                Delete
                            </span>
                        </div>
                        <div class="p-8">
                            @foreach($item->json as $key => $list_item)
                                <x-tree-list :item="$list_item" :name="$key"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        const deleteItem = (id) => {
            axios.delete('data/'+id+'/delete').then(() => {
                document.getElementById('data-'+id).remove();
            }).catch((e) => {
                alert(e.response.data.message)
            })
        }
    </script>
@endsection
