<x-contact-layout>
    <div class="py-12 w-full flex justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8 w-3/4">
            <div class="flex space-x-2">
                <a href="{{ route('contactos.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Volver a Inicio</a>
            </div>
            <div class=" mt-4 relative overflow-x-auto shadow sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <!-- Encabezado del título y contador -->
                    <div class="p-2 text-xl font-semibold text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <div class="flex items-center space-x-4 ml-2">
                            <span>{{ $etiqueta->nombre }} ({{ $contactos_cantidad }})</span>
                        </div>
                    </div>
                    <!-- Encabezado de la tabla -->
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del Contacto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @foreach($contactos as $contacto)
                        <tr onclick="window.location='{{ route('contactos.show', $contacto->id) }}'" class="cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $contacto->nombre.' '.$contacto->apellido }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $contacto->telefono }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $contacto->email }}
                            </td>
                            <td class="px-6 py-4 text-right" onclick="event.stopPropagation()">
                                <form action="{{ route('etiquetas.removerContacto', [$etiqueta->id, $contacto->id]) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <a href="{{ route('etiquetas.removerContacto', [$etiqueta->id, $contacto->id]) }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 6h18v2H3zm2 3h14l-1 14H6zM9 2h6v2H9z" />
                                        </svg>
                                    </a>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-contact-layout>