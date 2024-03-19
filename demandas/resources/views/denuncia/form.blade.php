<div class="bg-edit flex justify-center  max-w-screen  mt-12 mb-12">
    <div class="flex justify-content box main-container p-12 shadow-lg rounded-md w-9/12 h-auto	h-full mb-12">
        <div class="container   justify-center">
            <div class="flex items-center justify-between main-div">
                <h2 class="text-2xl text-blue-500 font-bold mb-4">{{__('messages.formComplain')}}</h2>
                <div id="voice" class="form-group voice-container mt-8">
                    <button type="button" id="start" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('Iniciar reconocimiento
                                    de voz') }}</button>
                </div>
            </div>
            <form action="{{ route('denuncia.form') }}" method="post" enctype="multipart/form-data" class="w-full h-screen">
                <div class="form-group">
                    @csrf
                    {{ Form::label('intern', 'Tipo de Denuncia', ['class' => 'block text-sm font-semibold text-gray-600']) }}
                    <div class="form-check">
                        {{ Form::radio('intern', '1', $denuncia->intern === 'interno', ['class' => 'form-check-input' . ($denuncia->intern === 'interno' ? ' is-internal' : ' is-external') . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                        {{ Form::label('intern', trans('messages.intern'), ['class' => 'form-check-label text-sm']) }}
                    </div>
                    <div class="form-check">
                        {{ Form::radio('intern', '0', $denuncia->intern === 'externo', ['class' => 'form-check-input' . ($denuncia->intern === 'externo' ? ' is-internal' : ' is-external') . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                        {{ Form::label('intern', trans('messages.extern'), ['class' => 'form-check-label text-sm']) }}
                        {!! $errors->first('intern', '<div class="invalid-feedback text-red-500">'.trans('messages.intern_error').'</div>') !!}
                    </div>
                    <div class="mb-4">
                        {{ Form::label('descripcio', trans('messages.description'), ['class' => 'block text-sm font-semibold text-gray-600']) }}
                        {{ Form::textarea('descripcio', $denuncia->descripcio, ['class' => 'form-control resize-none w-full' . ($errors->has('descripcio') ? ' is-invalid' : ''), 'placeholder' => trans('messages.description')]) }}
                        {!! $errors->first('descripcio', '<div class="invalid-feedback text-red-500">'.trans('messages.description_error').'</div>') !!}
                    </div>

                    <div class="mb-4">
                        {{ Form::label('testigos', trans('messages.witnesses'), ['class' => 'block text-sm font-semibold text-gray-600']) }}
                        {{ Form::textarea('testigos', $denuncia->testigos, ['class' => 'form-control resize-none w-full' . ($errors->has('testigos') ? ' is-invalid' : ''), 'placeholder' => trans('messages.witnesses')]) }}
                        {!! $errors->first('testigos', '<div class="invalid-feedback text-red-500">'.trans('messages.witness_error').'</div>') !!}
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">{{__('messages.typology')}}</h3>

                        <div class="form-check">
                            {{ Form::radio('type', 'acoso', $denuncia->type === 'acoso', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('intern_acoso', trans('messages.harassment'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'industry', $denuncia->type === 'industry', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('industry', trans('messages.industry'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'competence', $denuncia->type === 'competence', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('intern_competence', trans('messages.competence'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'hacienda', $denuncia->type === 'hacienda', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('intern_hacienda', trans('messages.grants'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'integrity', $denuncia->type === 'integrity', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('integrity', trans('messages.humanRights'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'bribery', $denuncia->type === 'bribery', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('bribery', trans('messages.bribery'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'influence', $denuncia->type === 'influence', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('influence', trans('messages.influence'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'Interests', $denuncia->type === 'Interests', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('Interests', trans('messages.interestConflict'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'hazards', $denuncia->type === 'hazards', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('hazards', trans('messages.hazards'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'Criminal', $denuncia->type === 'criminal', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('Criminal', trans('messages.penal'), ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('type', 'administrative', $denuncia->type === 'administrative', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                            {{ Form::label('administrative', trans('messages.administrative'), ['class' => 'form-check-label']) }}
                        </div>
                    </div>

                    <div class="flex justify-center mt-12 mb-12 max-w-2xl mx-auto mb-36 items-center ç">
                        <div class="relative h-4xl flex flex-col items-center justify-center">
                            <label for="toggleArchivo" class="cursor-pointer bg-gray-200 px-4 py-2 rounded-md shadow-md">
                                ¿Quieres añadir un archivo?
                            </label>
                            <input type="checkbox" id="toggleArchivo" class="hidden">
                            <div id="archivo" class="absolute top-full fileInput  rounded-md mt-2 mb-12  py-2  hidden">
                                <div class="fileDiv md:w-full ">
                                    <label id="labelFile" for="formInput" class="flex flex-col items-center  py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-200">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        {{ Form::file('archivo', ['class' => 'form-control' . ($errors->has('archivo') ? ' is-invalid' : ''),'id' => 'fileInput']) }}
                                        {!! $errors->first('archivo', '<div class="invalid-feedback text-red-500"></div>') !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Botón de enviar --}}
                    <div class="box-footer mt-6">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ trans('messages.complainRegister') }}</button>

                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apiKey = "{{ env('API_KEY') }}";


        var toggleArchivo = document.getElementById('toggleArchivo');
        var archivoDropdown = document.getElementById('archivo');

        toggleArchivo.addEventListener('change', function() {
            archivoDropdown.classList.toggle('hidden', !toggleArchivo.checked);
        });

        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();

            recognition.lang = 'es-ES'; // Idioma del reconocimiento de voz

            recognition.onstart = () => {
                console.log('El reconocimiento de voz ha comenzado.');
            };

            recognition.onresult = (event) => {
                const result = event.results[0][0].transcript;
                console.log('Result:', result);
                sendToApi(result);
            };

            recognition.onend = () => {
                console.log('Speech Recognition finished.');
            };

            recognition.onerror = (event) => {
                console.error('Error:', event.error);
            };

            document.getElementById('start').addEventListener('click', () => {
                recognition.start();
            });
        } else {
            console.log('Speech Recognition is not supported in this browser.');
        }

        //Esta funcion llama al ruteo que crea la pagina
        function createComplain(intern, type, descripcio, testigos) {
            fetch('/formulario/pagina1', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    intern: intern,
                    type: type,
                    descripcio: descripcio,
                    testigos: testigos,
                })
            })
        }

        //KEY de Opein AI 

        //Fetch texto a voz
        function reproducirTexto(texto) {
            const requestOptions = {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${apiKey}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    model: 'tts-1',
                    input: texto,
                    voice: 'alloy'
                })
            };

            fetch('https://api.openai.com/v1/audio/speech', requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.arrayBuffer();
                })
                .then(arrayBuffer => {
                    // Decodificar el array buffer en un audio
                    return new Promise((resolve, reject) => {
                        const audioContext = new(window.AudioContext || window.webkitAudioContext)();
                        resolve({
                            audioContext,
                            arrayBuffer
                        });
                    });
                })
                .then(({
                    audioContext,
                    arrayBuffer
                }) => {
                    // Reproducir el audio después de un evento de usuario
                    document.getElementById("errorButton").addEventListener('click', () => {
                        event.preventDefault()
                        const source = audioContext.createBufferSource();
                        audioContext.decodeAudioData(arrayBuffer, (buffer) => {
                            source.buffer = buffer;
                            source.connect(audioContext.destination);
                            source.start();
                        });
                    }, {
                        once: true
                    });
                })
                .catch(error => {
                    console.error('Hubo un problema con la solicitud fetch:', error);
                });
        }


        //Fetch a la API
        function sendToApi(text) {
            const requiredFields = ['intern', 'type', 'descripcio', 'testigos'];

            fetch('https://api.openai.com/v1/chat/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${apiKey}`,
                    },
                    body: JSON.stringify({
                        model: "gpt-3.5-turbo-0125",
                        messages: [{
                            role: "system",
                            content: "El usuario te pasara un texto y tendras que separar en un formato JSON clave valor, la clave ira entre comillas despues dos puntos y entro comillas el valor,las claves seran (intern,type,descripcio y testigos) dentro rellenaras los campos, deberas de captar si es interna o externa la denuncia y guardarlo como true o false(true si es interna,false si no lo es) si no se indica deberas deducirlo con la descripcion dada por el usuario, el tipo de denuncia si el usuario dice acoso laboral guardaras acoso si dice Propiedad industrial o intelectual guardaras industry si dice libre competencia guardaras competence si dice Subvenciones Hacienda publica o seguirdad social guardaras hacienda si dice integridad moral o derechos humanos guardaras integrity si dice cochecho guardaras bribery si dice trafico de influencias guardaras influence si dice conflicto de intereses guardaras interests si dice riesgos laborales guardaras hazards si dice Otras infracciones penales guardaras criminal si dice Otras infracciones Administrativas graves o muy traves guardaras administrative, despues tendras que guardar la descripcio de la denuncia y guardaras los testigos que indique el usuario lo guardaras como String, solo quiero el JSON, si no se define tipo intenta deducirlo con el texto de la descripcion, los datos que no se especifiquen los guardaras como vacios o nulos"
                        }, {
                            role: "user",
                            content: text,
                        }],
                        max_tokens: 100,
                    }),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    return response.json(); // o response.text() si la respuesta no es JSON
                })
                .then(data => {
                    //Cogemos la respuesta de la API que viene como String la parseamos y cogemos los datos que nos interesan
                    //Llamamos a la API de denuncias para crear una denuncia con los datos que se han pasado
                    const datas = data.choices[0].message.content;
                    const dataJson = JSON.parse(datas)
                    console.log(dataJson)
                    if (Object.values(dataJson).some(value => value === "undefined" || value === '' || value === null || value === "Unknown")) {
                        alert("Faltan campos por rellenar");
                        const missingField = requiredFields.find(field => !dataJson[field]);
                        text = `El valor para "${missingField}" no puede estar vacío`;
                        buton = document.createElement("button");
                        buton.id = "errorButton";
                        buton.textContent = "Reproducir Error"
                        buton.classList = 'text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2'
                        document.getElementById("voice").appendChild(buton)
                        reproducirTexto(text);
                        //BP
                    } else {
                        console.log("Aqui no deberias estar")
                        createComplain(dataJson.intern, dataJson.type, dataJson.descripcio, dataJson.testigos);
                        window.location.href = "/formulario/pagina2"
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
        sendToApi("Genera una denuncia con testigo Edgar Montero")
    })
</script>