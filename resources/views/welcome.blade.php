<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contattaci</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/app.css">
    {{-- Nasconde i box di alert al refresh --}}
    <style>
        [v-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>
    {{-- FORM DI CONTATTO --}}
    <div id="app" v-cloak>
        <contact-component inline-template>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        {{-- MESSAGGIO - SUCCESS --}}
                        <div class="contact-form-success alert alert-success mt-5 text-center" v-if="success">
                            <p class="mb-0"><strong>Grazie!</strong> I tuoi dati sono stati salvati correttamente.</p>
                        </div>
    
                        {{-- MESSAGGIO - ERROR --}}
                        <div class="contact-form-error alert alert-danger mt-5 text-center" v-if="error">
                            <p class="mb-0"><strong>Attenzione!</strong> I tuoi dati non sono stati salvati a causa di un errore.</p>
                            <span class="mail-error-message text-1 d-block"></span>
                        </div>

                        <form @submit.prevent="storeContact" method="POST" class="contact-form mt-5 mb-5 d-flex justify-content-center" novalidate="novalidate" @keydown="clearError">
                            @csrf
                            <div class="card px-1 py-4">
                                <div class="card-body">
                                    <h6 class="text-center">Inserisci qui le tue informazioni personali</h6>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input :class="hasError('name') ? 'is-invalid' : ''" class="form-control" type="text" placeholder="Nome" v-model="formData.name" name="name" value="">
                                                <div v-if="hasError('name')" class="invalid-feedback">
                                                    @{{getError('name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group"> 
                                                    <input :class="hasError('surname') ? 'is-invalid' : ''" class="form-control" type="text" placeholder="Cognome" v-model="formData.surname" name="surname" value="">
                                                    <div v-if="hasError('surname')" class="invalid-feedback">
                                                        @{{getError('surname')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group"> 
                                                    <input :class="hasError('email') ? 'is-invalid' : ''" class="form-control" type="text" placeholder="Email" v-model="formData.email" name="email" value="">
                                                    <div v-if="hasError('email')" class="invalid-feedback">
                                                        @{{getError('email')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center px-5 mt-3 mb-3"> 
                                        <small class="agree-text">Inviando i tuoi dati accetti i nostri<br /></small><a href="#" class="terms">Termini e condizioni</a>
                                    </div> 
                                    <button :disabled="hasAnyError" type="submit" value="Invia i dati" class="btn btn-primary btn-block confirm-button">Iscriviti</button>
                                    <button @click.prevent="reset" class="btn btn-warning btn-block reset-button mt-3">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </contact-component>
    </div>
    {{-- SCRIPT --}}
    <script src="/js/app.js">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>
</html>