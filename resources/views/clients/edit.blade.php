<x-layout>
    <section class="section main-section mb-5">
        <a href="{{route('clients.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form method="POST" action="{{route('clients.update',['client'=>$client->id])}}">
            @method('PUT')
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Modifier Client
                </x-card-header>
                <x-card-content>
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
                    
                        
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="mb-6">
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom Client <span class="text-red-600">*</span></label>
                                <input type="text" id="nom" name="nom" value="{{$client->person->nom}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                @error('nom')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom Client <span class="text-red-600">*</span></label>
                                <input type="text" id="prenom" name="prenom" value="{{$client->person->prenom}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                                @error('prenom')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="IF" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IF <span class="text-red-600">*</span></label>
                                <input type="text" id="IF" name="IF" value="{{$client->person->IF}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" required>
                                @error('IF')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="ICE" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">I.C.E <span class="text-red-600">*</span></label>
                                <input type="text" id="ICE" name="ICE" value="{{$client->person->ICE}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXXXXXXXXX" required>
                                @error('ICE')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <hr>

                </x-card-content>
            </x-card>
            <div class="grid lg:grid-cols-2 md:gap-6 mt-5 md:grid-rows-1">
                @foreach ($client->addresses as $address)
                    <x-card>
                        <x-card-header>
                            <span class="icon"><i class="fa fa-address-book"></i></span>
                            Adresse de {{$address->type}}
                        </x-card-header>
                        <x-card-content>
                            @if ($address->type == 'facturation')
                            <div class="mb-6">
                                <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre <span class="text-red-600">*</span></label>
                                <input type="text" id="titre" name="titre" value="{{$address->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                @error('titre')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone <span class="text-red-600">*</span></label>
                                <input type="text" id="telephone" name="telephone" value="{{$address->telephone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212 xxxxxxx" required>
                                @error('telephone')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail <span class="text-red-600">*</span></label>
                                <input type="text" id="email" name="email" value="{{$address->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="peter@zylker.com" required>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse <span class="text-red-600">*</span></label>
                                <input type="text" id="adresse" name="adresse" value="{{$address->adresse}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678" required>
                                @error('adresse')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            @elseif($address->type == 'livraison')

                                <div class="mb-6">
                                    <label for="titre2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre <span class="text-red-600">*</span></label>
                                    <input type="text" id="titre2" name="titre2" value="{{$address->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                    @error('titre2')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="telephone2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone <span class="text-red-600">*</span></label>
                                    <input type="text" id="telephone2" name="telephone2" value="{{$address->telephone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212 xxxxxxx" required>
                                    @error('telephone2')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="email2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail <span class="text-red-600">*</span></label>
                                    <input type="text" id="email2" name="email2" value="{{$address->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="peter@zylker.com" required>
                                    @error('email2')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="adresse2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse <span class="text-red-600">*</span></label>
                                    <input type="text" id="adresse2" name="adresse2" value="{{$address->adresse}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678" required>
                                    @error('adresse2')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            @endif
                                
                                
                                
                        </x-card-content>
                    </x-card>
                @endforeach
                
                
            </div>
            <div class="mt-5 md:w-full lg:w-1/2 flex justify-center">
                <button type="submit" class="md:w-full lg:w-auto hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </div>
        </form>
    </section>
    <x-nav-bar/>
    <x-footer/>
    <x-flash-message/>
    <x-aside/>
</x-layout>