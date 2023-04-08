<section class="flex justify-center">
    <div class="mb-3 xl:w-96">
        <form action="{{ route('modificar_cliente') }}" method="post"
            class="relative mb-4 flex w-full flex-wrap items-stretch">
            @csrf
            <div class="relative mb-4">
                <select id="selectClientes" onchange="this.form.submit()" name="selectClientes"
                    class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
                    <option disabled selected>Selecciona una opción</option>
                    @php
                        foreach ($clientes as $id_cliente => $cliente) {
                            $cliente_elegido = '';
                            if (isset($cliente_seleccionado) && $cliente_seleccionado['id_cliente'] == $id_cliente) {
                                $cliente_elegido = 'selected';
                            }
                            echo "<option value='$id_cliente' $cliente_elegido>$cliente</option>";
                        }
                    @endphp
                </select>
            </div>
        </form>
    </div>
</section>
