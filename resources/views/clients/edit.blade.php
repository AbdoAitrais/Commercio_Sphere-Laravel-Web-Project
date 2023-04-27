<x-layout>

    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <h1 class="title">
            Profile
          </h1>
          <button class="button light">Button</button>
        </div>
      </section>
      
    <section class="section main-section">
        <x-card>
            <x-card-header>
                <span class="icon"><i class="fa fa-user-circle"></i></span>
                Edit Profile
            </x-card-header>
            <x-card-content>
                <form method="POST" action="/clients/{{$client->id}}">
                    @csrf
                    @method('PUT')
                    {{-- <div class="field">
                    <label class="label">Avatar</label>
                    <div class="field-body">
                        <div class="field file">
                        <label class="upload control">
                            <a class="button blue">
                            Upload
                            </a>
                            <input type="file">
                        </label>
                        </div>
                    </div>
                    </div> --}}
                    <hr>
                    <div class="field">
                        <label class="label">Nom Client <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="nom" value="{{$client->nom}}" class="input" required>
                                </div>
                            </div>
                            @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Prenom Client <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="prenom" value="{{$client->prenom}}" class="input" required>
                                </div>
                            </div>
                            @error('prenom')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">ICE <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="ICE" value="{{$client->ICE}}" class="input" required>
                                </div>
                            </div>
                            @error('ICE')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">IF <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="IF" value="{{$client->IF}}" class="input" required>
                                </div>
                            </div>
                            @error('IF')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Telephone <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field"> 
                                <div class="control">
                                    <input type="phone" autocomplete="on" name="telephone" value="{{$client->telephone}}" class="input" required>
                                </div>
                            </div>
                            @error('telephone')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail <span class="text-red-600">*</span></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="email" autocomplete="on" name="email" value="{{$client->email}}" class="input" required>
                                </div>
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Ville</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="ville" value="{{$client->ville}}" class="input">
                                </div>
                            </div>
                            @error('ville')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Pays</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="pays" value="{{$client->pays}}" class="input">
                                </div>
                            </div>
                            @error('pays')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Adresse</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="adresse" value="{{$client->adresse}}" class="input">
                                </div>
                            </div>
                            @error('adresse')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Code Postal</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="code_postal" value="{{$client->code_postal}}" class="input">
                                </div>
                            </div>
                            @error('code_postal')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                    <div class="control">
                        <button type="submit" class="button green">
                        Submit
                        </button>
                    </div>
                    </div>
                </form>
            </x-card-content>
        </x-card>
    </section>

</x-layout>