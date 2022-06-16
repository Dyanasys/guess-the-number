<template>
    <div class="p-5 bg-dark">
        <!-- Copy this code to have a working example -->
        <div class="d-flex justify-content-center">
            <div>
                <div class="form-outline form-white">
                    <label class="form-label text-light" for="formWhite"
                           v-html="ocupado?'Pensando...':'Introduce un número del 1 al 10000000000 y presiona Enter'"></label>
                    <input v-bind:disabled="ocupado" v-bind:class="{'disabled':ocupado}" v-on:keyup.enter="onClick" type="number" id="formWhite"
                           class="form-control m-auto" v-model="texto" style="max-width: 200px" max="10000000000"
                           min="1"/>
                    <h1 class="display-1 text-light m-5">Tu número es.. {{ resultado }}</h1>
                    <button v-bind:class="{'disabled':ocupado || !texto}" v-bind:disabled="ocupado || !texto"
                            type="button" class="btn btn-primary mb-3" v-on:click="onClick">Adivinar
                    </button>
                </div>
            </div>
        </div>
        <!--/ Copy this code to have a working example -->
    </div>
</template>

<script>



import axios from 'axios';

export default {
    mounted() {
        console.log('Component mounted.')
    },
    props: ["texto", "resultado", "ocupado"],
    "methods": {
        "onClick": async function () {
            this.ocupado = true;
            let x = await axios.get(base_url + "/calculate/" + this.texto);
            this.resultado = x.data;
            this.ocupado = false;
        }
    },
}
</script>
