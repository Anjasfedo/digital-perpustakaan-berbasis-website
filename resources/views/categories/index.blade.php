<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="my-6">
                        <a href="{{ route('categories.create') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                            Category</a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="categories-table"
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.tailwindcss.js"></script>
        <script>
            $(document).ready(function() {
                let table = $('#categories-table').DataTable({
                    layout: {
                        topStart: 'search',
                        topEnd: null,
                        bottomStart: 'paging',
                        bottomEnd: 'info',
                    },
                    "processing": true,
                    "paging": true,
                    "serverside": true,
                    "bDestroy": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "responsive": true,
                    "ajax": "{{ route('categories.list') }}",
                    "order": [
                        [0, "desc"]
                    ],
                    "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            "data": "name"
                        },
                        {
                            data: null,
                            render: (data, type, row) => renderAction(data, row)
                        }
                    ]
                });
            });

            function renderAction(data, row) {
                // let actionButtons = `<a href="{{ route('categories.edit', '${data}') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>`

                return '<div class="w-full flex items-center justify-center">' + actionButtons + '</div>';
            }
        </script>
    @endpush
</x-app-layout>
