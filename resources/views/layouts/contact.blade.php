<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!--side bar menu-->
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800" x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <div class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">agenda</div>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                <!--
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="">
                        MODULOS
                    </a>
                -->

                <div class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 text-xl bg-transparent rounded-lg dark:bg-transparent dark:focus:bg-gray-600 dark:focus:text-white dark:text-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Contacto/s ({{$contactos_cant}})</span>
                </div>

                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 text-lg bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('contactos.index') }}">
                    <span>INICIO</span>
                </a>

                <div class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <a class="flex items-center space-x-4 p-2 text-white rounded-full hover:bg-gray-600 hover:rounded-lg focus:outline-none"
                        href="{{ route('contactos.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Nuevo Contacto</span>
                    </a>
                </div>

                <!--
                    [DROPDOWN COMPONENT CLEAN]
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Dropdown3</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="w-full mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700 pointer-events-auto">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="#">

                                </a>
                            </div>
                        </div>
                    </div>
                -->
                <!---------------------------------------------------------------------->
                <div class="etiquetas-section mt-2">
                    <!-- SECCION PARA CREAR ETIQUETAS -->
                    <div class="crear-etiquetas">
                        <!-- Botón para abrir el modal -->
                        <div class="flex items-center space-x-4 block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:text-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Etiquetas</span>
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 hover:rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" type="button">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                        </div>
                        <!-- Modal para crear etiquetas -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
                            <div class="relative p-4 w-full max-w-md">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Nueva Etiqueta
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('etiquetas.store') }}" method="POST" class="p-4 md:p-5">
                                        @csrf
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Escriba el nombre de la etiqueta" required="">
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Guardar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECCION PARA EDITAR/ELIMINAR ETIQUETAS -->
                    <div class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:text-gray-200 focus:outline-none focus:shadow-outline" style="margin-top: -10px;">
                        @foreach($etiquetas as $etiqueta)
                        <div class="flex items-center space-x-1 block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:text-gray-200 focus:outline-none focus:shadow-outline" style="margin-top: -8px;">
                            <a class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('etiquetas.show', $etiqueta->id) }}">
                                {{$etiqueta->nombre}}
                            </a>
                            <!-- Botón para abrir el modal de edición -->
                            <div class="flex items-center space-x-1 block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:text-gray-200 focus:outline-none focus:shadow-outline">
                                <button data-modal-target="edit-modal-{{$etiqueta->id}}" data-modal-toggle="edit-modal-{{$etiqueta->id}}" class="p-2" type="button">
                                    <!-- Aquí un ícono de edición -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m1.768-4.768a2.5 2.5 0 010 3.536L7 21l-4 1 1-4L16.5 3.5a2.5 2.5 0 013.536 0z" />
                                    </svg>
                                </button>
                                <button del-data-modal-target="delete-modal-{{$etiqueta->id}}" del-data-modal-toggle="delete-modal-{{$etiqueta->id}}" class="p-2" type="button">
                                    <!-- Aquí un ícono de edición -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 6h18v2H3zm2 3h14l-1 14H6zM9 2h6v2H9z" />
                                    </svg>
                                </button>

                                <!-- Modal de Eliminacion -->
                                <div id="delete-modal-{{$etiqueta->id}}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
                                    <div class="relative p-4 w-full max-w-md">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Eliminar {{$etiqueta->nombre}}
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" del-data-modal-toggle="delete-modal-{{$etiqueta->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ route('etiquetas.destroy', $etiqueta->id) }}" method="POST" class="p-4 md:p-5">
                                                @csrf
                                                @method('DELETE')
                                                <div class="grid gap-4 mb-4">
                                                    <ul class="p-3 w-full space-y-1 text-sm text-gray-700 dark:text-gray-200">
                                                        <li>
                                                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <div class="flex items-center h-5">
                                                                    <input id="helper-radio-4" name="helper-radio" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" checked>
                                                                </div>
                                                                <div class="ms-2 text-sm">
                                                                    <label for="helper-radio-4" class="font-medium text-gray-900 dark:text-gray-300">
                                                                        <div>Eliminar únicamente la etiqueta</div>
                                                                        <p class="text-xs font-normal text-gray-500">Se eliminará solamente la etiqueta sin eliminar los contactos asociados a ella.</p>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <div class="flex items-center h-5">
                                                                    <input id="helper-radio-5" name="helper-radio" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                                                </div>
                                                                <div class="ms-2 text-sm">
                                                                    <label for="helper-radio-5" class="font-medium text-gray-900 dark:text-gray-300">
                                                                        <div>Eliminar la etiqueta y los contactos que contiene</div>
                                                                        <p class="text-xs font-normal text-gray-500">Se eliminarán todos los contactos asociados a la etiqueta y la etiqueta misma.</p>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Guardar
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Modal de edición -->
                        <div id="edit-modal-{{$etiqueta->id}}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
                            <div class="relative p-4 w-full max-w-md">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Editar Etiqueta
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-{{$etiqueta->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('etiquetas.update', $etiqueta->id) }}" method="POST" class="p-4 md:p-5">
                                        @csrf @method('PUT')
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Debe de escribir un nuevo nombre" value="{{$etiqueta->nombre}}" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Guardar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>

        <script>
            // Obtener el botón y el modal
            const modal = document.getElementById('crud-modal');
            const openModalButton = document.querySelector('[data-modal-toggle="crud-modal"]');
            const closeModalButton = modal.querySelector('[data-modal-toggle="crud-modal"]');

            // Función para abrir el modal
            openModalButton.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            // Función para cerrar el modal
            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Cerrar el modal cuando se hace clic fuera del contenido
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        </script>

        <script>
            // Obtener todos los botones de apertura de modal y sus respectivos modales
            document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                // Obtener el id del modal específico
                const modalId = button.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);

                // Abrir el modal correspondiente al hacer clic en el botón
                button.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });

                // Obtener el botón de cierre del modal y agregar el evento para cerrar
                const closeModalButton = modal.querySelector(`[data-modal-toggle="${modalId}"]`);
                closeModalButton.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                // Cerrar el modal cuando se hace clic fuera del contenido de edición
                window.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>

        <script>
            // Obtener todos los botones de apertura de modal y sus respectivos modales
            document.querySelectorAll('[del-data-modal-toggle]').forEach(button => {
                // Obtener el id del modal específico
                const modalId = button.getAttribute('del-data-modal-toggle');
                const modal = document.getElementById(modalId);

                // Abrir el modal correspondiente al hacer clic en el botón
                button.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });

                // Obtener el botón de cierre del modal y agregar el evento para cerrar
                const closeModalButton = modal.querySelector(`[del-data-modal-toggle="${modalId}"]`);
                closeModalButton.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                // Cerrar el modal cuando se hace clic fuera del contenido de edición
                window.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>

        <!--
        <script>
            // Obtener el botón y el modal de edición
            const editModal = document.getElementById('edit-modal');
            const openEditModalButton = document.querySelector('[data-modal-toggle="edit-modal"]');
            const closeEditModalButton = editModal.querySelector('[data-modal-toggle="edit-modal"]');

            // Función para abrir el modal de edición
            openEditModalButton.addEventListener('click', () => {
                editModal.classList.remove('hidden');
            });

            // Función para cerrar el modal de edición
            closeEditModalButton.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });

            // Cerrar el modal cuando se hace clic fuera del contenido de edición
            window.addEventListener('click', (e) => {
                if (e.target === editModal) {
                    editModal.classList.add('hidden');
                }
            });
        </script>
        -->

        <!--content-->
        <div class="flex w-full bg-slate-700">
            {{ $slot }}
        </div>
    </div>
</body>

</html>