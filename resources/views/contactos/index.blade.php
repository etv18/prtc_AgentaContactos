<x-contact-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="width: 70%;">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del Contacto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3">
                                email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
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
                                <form action="{{ route('contactos.destroy', $contacto) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a href="{{ route('contactos.destroy', $contacto) }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <!-- Contenido del archivo SVG -->
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