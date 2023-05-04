<x-layout>
      
    <section class="section main-section">
        <a href="{{route('clients.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <x-card>
            <x-card-header>
                <span class="icon"><i class="fa fa-user-circle"></i></span>
                Ajouter Client
            </x-card-header>
            <x-card-content>
                <form method="POST" action="{{route('clients.store')}}">
                    @csrf
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
                                    <input type="text" autocomplete="on" name="nom" value="{{old('nom')}}" class="input" required>
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
                                    <input type="text" autocomplete="on" name="prenom" value="{{old('prenom')}}" class="input" required>
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
                                    <input type="text" autocomplete="on" name="ICE" value="{{old('ICE')}}" class="input" required>
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
                                    <input type="text" autocomplete="on" name="IF" value="{{old('IF')}}" class="input" required>
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
                                    <input type="phone" autocomplete="on" name="telephone" value="{{old('telephone')}}" class="input" required>
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
                                    <input type="email" autocomplete="on" name="email" value="{{old('email')}}" class="input" required>
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
                                    <input type="text" autocomplete="on" name="ville" value="{{old('ville')}}" class="input">
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
                                    <input type="text" autocomplete="on" name="pays" value="{{old('pays')}}" class="input">
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
                                    <input type="text" autocomplete="on" name="adresse" value="{{old('adresse')}}" class="input">
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
                                    <input type="text" autocomplete="on" name="code_postal" value="{{old('code_postal')}}" class="input">
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
    <x-nav-bar/>
    <x-footer/>
    <x-flash-message/>
    <x-aside/>
</x-layout>