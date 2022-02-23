window.onload = function () {
    var form = null;
    var formMethod = null;

    //dependiendo del form recuperamos un elemento y especificamos el method
    if (document.getElementById("createForm")) {
        form = document.getElementById("createForm");
        formMethod = "POST";
    } else if (document.getElementById("editForm")) {
        form = document.getElementById("editForm");
        formMethod = "PUT";
    } else if (document.getElementById("deleteForm")) {
        form = document.getElementById("deleteForm");
        formMethod = "DELETE";
    }

    //si existe un form en el DOM añadimos handle
    if (form !== null) form.addEventListener("submit", handleFormSubmit);

    /**
     * Event handler for a form submit event.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/API/HTMLFormElement/submit_event
     *
     * @param {SubmitEvent} event
     */
    async function handleFormSubmit(event) {
        /**
         * This prevents the default behaviour of the browser submitting
         * the form so that we can handle things instead.
         */
        event.preventDefault();

        /**
         * This gets the element which the event handler was attached to.
         *
         * @see https://developer.mozilla.org/en-US/docs/Web/API/Event/currentTarget
         */
        const form = event.currentTarget;

        /**
         * This takes the API URL from the form's `action` attribute.
         */
        const url = form.action;

        try {
            /**
             * This takes all the fields in the form and makes their values
             * available through a `FormData` instance.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/API/FormData
             */
            const formData = new FormData(form);
            const responseData = await postFormDataAsJson({
                url,
                formData,
                formMethod,
            });

            //si el method no es DELETE, funcionará, sino dará error porqué el obj ya no existe
            if (formMethod != 'DELETE') {
                window.location.href =
                "http://localhost/LARAVEL/proyectoAPI/public/" +
                responseData.id;

            } else {
                alert('Centro eliminado:' + JSON.stringify(responseData));
                window.location.href = "/LARAVEL/proyectoAPI/public/";
            }

        } catch (error) {
            console.error(error);
        }
    }
};

/**
 * Helper function for POSTing data as JSON with fetch.
 *
 * @param {Object} options
 * @param {string} options.url - URL to POST data to
 * @param {FormData} options.formData - `FormData` instance
 * @param {string} formMethod - method form
 * @return {Object} - Response body from URL that was POSTed to
 */
async function postFormDataAsJson({ url, formData, formMethod }) {
    /**
     * We can't pass the `FormData` instance directly to `fetch`
     * as that will cause it to automatically format the request
     * body as "multipart" and set the `Content-Type` request header
     * to `multipart/form-data`. We want to send the request body
     * as JSON, so we're converting it to a plain object and then
     * into a JSON string.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/POST
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/fromEntries
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify
     */
    const plainFormData = Object.fromEntries(formData.entries());
    const formDataJsonString = JSON.stringify(plainFormData);

    const fetchOptions = {
        /**
         * The default method for a request with fetch is GET,
         * so we must tell it to use the POST HTTP method to store / PUT to update.
         */
        method: formMethod,
        /**
         * These headers will be added to the request and tell
         * the API that the request body is JSON and that we can
         * accept JSON responses.
         */
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        /**
         * The body of our POST request is the JSON string that
         * we created above.
         */
        body: formDataJsonString,
    };

    const response = await fetch(url, fetchOptions);

    if (!response.ok) {
        const errorMessage = await response.text();
        throw new Error(errorMessage);
    }

    return response.json();
}

/* Ajax con javascript */
function api_js_index() {
    console.log("Entrando en la función AJAX - index");
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        //vacío el contenido
        document.getElementById("response").innerHTML = "";
        //añado la tabla
        document
            .getElementById("response")
            .appendChild(crearTable(JSON.parse(xhttp.responseText)));

        console.log(xhttp.responseText); //sin parsear en una string
        console.log(JSON.parse(xhttp.responseText)); //parseado se puede iterar
    };

    //método GET, sin parámetros ejecuta el método index del controller
    xhttp.open("GET", "api/apirest", true);
    // xhttp.setRequestHeader('Content-Type', 'application/vnd.api+json');
    // xhttp.setRequestHeader('Accept', 'application/vnd.api+json');
    xhttp.send();
}

/**
 * Render a table with centre data in index view
 *
 * @param {Object} centros
 * @returns table html
 */
function crearTable(centros) {
    let aux = document.createElement("th"); //aux para ir modificando el value
    let tabla = document.createElement("table");
    tabla.classList.add("table", "table-dark", "table-responsive");
    let cabecera = document.createElement("tr");
    let columnas = Object.keys(centros[0]); //me quedo con el nombre de las columnas

    //call to action para editar el obj
    aux.innerHTML = "Ver/Editar";
    cabecera.appendChild(aux);

    //añado columnas
    columnas.forEach((col) => {
        aux = document.createElement("th");
        aux.innerHTML = col;
        cabecera.appendChild(aux);
    });

    //agrego cabecera a la tabla
    tabla.appendChild(cabecera);

    //generamos las filas de la tabla
    centros.forEach((centro) => {
        //cada centro es una row
        aux = document.createElement("tr");
        let verEditar = document.createElement("td");
        verEditar.innerHTML =
            "<button type='button' onclick='getCentro(" +
            centro.id +
            ")' class='btn btn-warning'>Ver</button>";
        aux.appendChild(verEditar);

        for (let i = 0; i < columnas.length; i++) {
            //añado el valor para cada columna
            let columna = document.createElement("td");
            columna.innerHTML = centro[Object.keys(centro)[i]];

            //añado la fila al tr
            aux.appendChild(columna);
        }

        //agrego fila a la tabla
        tabla.appendChild(aux);
    });

    return tabla;
}

/**
 * POST insert with XMLHttpRequest()
 * It's necesary .preventDefault() when submit
 * es + limpio con fetch
 *
 * @param {Object} form form html element
 */
function api_js_create(form) {
    console.log("Entrando en la función AJAX - create");

    let centro = {
        nombre: form.nombre.value,
        cod_asd: form.cod_asd.value,
        fec_comienzo_actividad: form.fec_comienzo_actividad.value,
        opcion_radio: form.opcion_radio.value,
        guarderia: form.guarderia.value,
        categoria: form.categoria.value,
    };

    //Turn the data object into an array of URL-encoded key/value pairs.
    let urlEncodedDataPairs = [];
    for (prop in centro) {
        urlEncodedDataPairs.push(
            encodeURIComponent(prop) + "=" + encodeURIComponent(centro[prop])
        );
    }

    let params = urlEncodedDataPairs.toString().replaceAll(",", "&");

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/LARAVEL/proyectoAPI/public/api/apirest", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onload = function () {
        window.location.href = JSON.parse(xhttp.responseText).id;
        console.log(xhttp.responseText); //parseado se puede iterar
    };

    xhttp.send(params);
}

/**
 * Change windows.location to render show view
 *
 * @param {int} id $id del centro
 */
function showCentro(id) {
    window.location.href += id;
}

/**
 * Recuperamos el centro educativo con el id indicado
 * 
 * @param {integer} id 
 */
function getCentro(id) {
    console.log("Entrando en la función AJAX - show");
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        alert(xhttp.responseText);

        console.log(JSON.parse(xhttp.responseText));

        //vacío el contenido
        document.getElementById("response").innerHTML = "";
        //añado la tabla
        document
            .getElementById("response")
            .appendChild(crearTable(JSON.parse(xhttp.responseText)));

    };

    //método GET, sin parámetros ejecuta el método index del controller
    xhttp.open("GET", `api/apirest/${id}`, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function showCentroHtml(){

}

/**
 * Ajax PUT method to update an object
 *
 * @param {Object} form
 * @param {int} centroId
 */
function api_js_edit(form, centroId) {
    console.log("Entrando en la función AJAX - edit");

    let centro = {
        nombre: form.nombre.value,
        cod_asd: form.cod_asd.value,
        fec_comienzo_actividad: form.fec_comienzo_actividad.value,
        opcion_radio: form.opcion_radio.value,
        guarderia: form.guarderia.value,
        categoria: form.categoria.value,
    };

    //Turn the data object into an array of URL-encoded key/value pairs.
    let urlEncodedDataPairs = ["id=" + centroId];
    for (prop in centro) {
        urlEncodedDataPairs.push(
            encodeURIComponent(prop) + "=" + encodeURIComponent(centro[prop])
        );
    }

    let params = urlEncodedDataPairs.toString().replaceAll(",", "&");

    const xhttp = new XMLHttpRequest();
    xhttp.open(
        "PUT",
        "/LARAVEL/proyectoAPI/public/api/apirest/" + centroId,
        true
    );
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onload = function () {
        window.location.href =
            "http://localhost/LARAVEL/proyectoAPI/public/" + centroId;
        console.log(xhttp.responseText); //parseado se puede iterar
    };

    xhttp.send(params);
}

/**
 * Ajax DELETE method to remove an object
 *
 * @param {int} centroId
 */
function api_js_delete(centroId) {
    console.log("Entrando en la función AJAX - edit");

    const xhttp = new XMLHttpRequest();
    xhttp.open(
        "DELETE",
        "/LARAVEL/proyectoAPI/public/api/apirest/" + centroId,
        true
    );
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onload = function () {
        alert("registro eliminado: " + xhttp.responseText);
        window.location.href = "/LARAVEL/proyectoAPI/public/";
    };

    xhttp.send();
}
