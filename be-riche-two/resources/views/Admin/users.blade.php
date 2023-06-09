@extends('admin.dashboard_template')


@section('admin')
<main class="relative z-0 flex-1 pb-8 px-6 bg-white">
    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Users
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Role</th>
                        <th></th>
                    </tr>
                    @foreach ($users as $item)
                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5"><input type="text" value="{{$item->name}}" class="bg-transparent"></td>
                        <td class="p-3 px-5"><input type="text" value="{{$item->email}}" class="bg-transparent"></td>
                        <td class="p-3 px-5">
                            @foreach ($item->roles as $role)
                            <input type="text" value="{{$role->name}}" class="bg-transparent">
                        @endforeach
                            
                        </td>
                        <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                    </tr>
                    @endforeach
                    
                    
                   
                    
                    
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection