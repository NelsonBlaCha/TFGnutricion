const crearMasPlatos = document.getElementById('crearMasPlatos');
const platos = document.getElementById('platos');
let numero_campos_platos = 1;

crearMasPlatos.addEventListener('click', (event) => {
    event.preventDefault;
    crear_nuevo_plato();
})

function crear_nuevo_plato() {
    const select = document.createElement("select");
    const desayuno = document.createElement("option");
    const mediamanana = document.createElement("option");
    const comida = document.createElement("option");
    const merienda = document.createElement("option");
    const cena = document.createElement("option");
    const recena = document.createElement("option");
    const otro = document.createElement("option");
    const input = document.createElement("input");

    select.className =
        'border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800';
    input.className =
        'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4';

    numero_campos_platos++;
    select.name = `select_plato_${numero_campos_platos}`;
    input.name = `input_plato_${numero_campos_platos}`;

    input.placeholder = 'Introduzca el plato';

    desayuno.textContent = 'Desayuno'
    mediamanana.textContent = 'Media mañana'
    comida.textContent = 'Comida'
    merienda.textContent = 'Merienda'
    cena.textContent = 'Cena'
    recena.textContent = 'Recena'
    otro.textContent = 'Otro'

    select.appendChild(desayuno);
    select.appendChild(mediamanana);
    select.appendChild(comida);
    select.appendChild(merienda);
    select.appendChild(cena);
    select.appendChild(recena);
    select.appendChild(otro);

    platos.insertBefore(select, crearMasPlatos);
    platos.insertBefore(input, crearMasPlatos);
}
