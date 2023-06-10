<x-layout>
      
    <section class="section main-section mb-5">
        <a href="{{route('devis.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form id="your-form-id" method="POST" action="{{route('devis.store')}}">
            @csrf   
            
            <div class="grid grid-cols-2">
                <x-card>   
                    <x-card-header>
                        <span class="icon"><i class="fa fa-file"></i></span>
                        Ajouter Devis
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
                        
                            
                            <div>
                                <div class="relative z-0 w-full mb-6 group">
                                <div class="mb-6">
                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date <span class="text-red-600">*</span></label>
                                    <input type="date" id="date" name="date" value="{{ old('date') ? old('date') : now()->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                    @error('date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero <span class="text-red-600">*</span></label>
                                    <input type="numero" id="numero" name="numero" value="{{$numero ?? ""}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                    @error('numero')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                {{-- <div class="mb-6">
                                    <label for="etat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat <span class="text-red-600">*</span></label>
                                    <select type="text" id="etat" name="etat" value="{{old('etat')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo veniam eaque incidunt tenetur, quia voluptatibus aliquam nisi quibusdam? Iste quaerat provident deserunt velit autem fuga facilis possimus vero dolorem impedit." required>
                                        <option value="En cours">En cours</option>
                                        <option value="Gagne">Gagné</option>
                                        <option value="Facture">Facturé</option>
                                        <option value="Brouillon">Brouillon</option>
                                        <option value="Rejete">Rejeté</option>
                                        <option value="Annule">Annulé</option>4
                                    </select>
                                    @error('etat')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div> --}}
                                
                            </div>
                            </div>
                            
                            <hr>
    
                    </x-card-content>
                </x-card>
                <x-card class="">   
                    <x-card-header>
                        <span class="icon"><i class="fa fa-user-circle"></i></span>
                        Ajouter Client
                    </x-card-header>
                    <x-card-content class="z-0">
                              
                            <div>
                                <div id="client-infos-div" class="relative z-0 w-full mb-6 group">
                                <div  class="mb-6 z-0">
                                    <label for="search_client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client <span class="text-red-600">*</span></label>
                                    <div class="flex w-full z-0">
                                        <div class=" flex-grow z-0">
                                            <input type="text" id="search_client" name="search_client" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chercher Client" required>
                                            <input type="hidden" name="client_id" id="client_id">
                                        </div>
                                        {{-- search button --}}
                                        <div class="flex-grow-0 ml-2">
                                            <button class="remove-article-btn bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                                <span class="icon"><i class="fa fa-search"></i></span>
                                            </button>  
                                            <button class="remove-article-btn bg-transparent bg-blue-500 font-semibold text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                                <span class="icon"><i class="fa fa-plus"></i></span>
                                            </button> 
                                        </div>
                                    </div>

                                    @error('search_client')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm text-gray-900 dark:text-white font-bold">{{ isset($client) ? $client->nom : "" }}</label>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ isset($client) ? $client->prenom : "" }}</label>
                                    
                                    
                                </div>
                                
                            </div>
                            </div>
                            
                            
    
                    </x-card-content>
                </x-card>
            </div>

            {{-- <section class="section main-section mb-10">
                <div class="card has-table">
                  <header class="card-header">
                    <p class="card-header-title text-lg">
                      <span class="icon"><i class="fa fa-account-multiple"></i></span>
                      List des Articles
                    </p>
                    <a href="#" class="card-header-icon">
                      <span class="icon"><i class="fa fa-reload"></i></span>
                    </a>
                  </header>
                  <div class="card-content">
                    
                    <div class="mt-5 md:w-full lg:w-full flex justify-center">
                        <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Ajouter</button>
                        <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partir de produit</button>
                        <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partit de stock</button>
                    </div>
                  </div>
                </div>
            </section> --}}

            <x-card class="mb-10">
                <x-card-header>
                    <span class="icon"><i class="fa fa-account-multiple"></i></span>
                    List des Articles
                </x-card-header>
                <x-card-content>
                    <table class="text-sm">
                        <thead>
                          <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Prix Vente</th>
                            <th>Prix Achat</th>
                            <th>Quantité</th>
                            <th>Taxe</th>
                            <th>P.H.T</th>
                            <th>Marge</th>

                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="article-container">
              
  
                            {{-- <tr class=" h-20">
                                <td data-label="Titre">
                                    <div class="mb-6">
                                        <input type="text" id="titre" name="articles[][titre]" value="{{old('articles[][titre]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                        @error('articles[][titre]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td data-label="Description">
                                    <div class="mb-6">
                                        <textarea type="text" id="description" name="articles[][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{old('articles[][description]')}}</textarea>
                                        @error('articles[][description]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>       
                                </td>
                                <td data-label="Prix">
                                    <div class="mb-6">
                                        <input type="number" id="prix_vente" name="articles[][prix_vente]" value="{{old('articles[][prix_vente]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('articles[][prix_vente]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>    
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="articles[][quantite]" value="{{old('articles[][quantite]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('articles[][quantite]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td data-label="Taxe">
                                    <div class="mb-6">
                                        <select id="taxe" name="taxe" value="{{old('taxe')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            <option value="0">0%</option>
                                            <option value="0.07">7%</option>
                                            <option value="0.1">10%</option>
                                            <option value="0.2" selected>20%</option>
                                        </select>
                                    </div>
                                </td>
                                <td data-label="P.H.T">
                                    <div class="mb-6">
                                        <input type="number" id="pht" name="pht" value="{{old('pht')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                    </div>
                                </td>
                                <td>
                                    <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                        <span class="icon"><i class="fa fa-trash-can"></i></span>
                                    </button>     
                                </td>
                            </tr> --}}

                            

                            

                            @isset($formFields)
                                
                            

                            @foreach($formFields['articles'] as $index => $article)

                            <tr class=" h-20">

                                <div class="mb-6">
                                    <label for="titre{{ $index }}">Titre</label>
                                    <input type="text" id="titre{{ $index }}" name="articles[{{ $index }}][titre]" value="{{ old('articles.'.$index.'.titre') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('articles.'.$index.'.titre')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="description{{ $index }}">Description</label>
                                    <textarea id="description{{ $index }}" name="articles[{{ $index }}][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('articles.'.$index.'.description') }}</textarea>
                                    @error('articles.'.$index.'.description')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <td data-label="Prix Vente">
                                    <div class="mb-6">
                                        <input type="number" id="prix_vente" name="articles[{{ $index }}][prix_vente]" value="{{old('articles[][prix_vente]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('articles.'.$index.'.prix_vente]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>    
                                </td>
                                <td data-label="Prix Achat">
                                    <div class="mb-6">
                                        <input type="number" id="prix_achat" name="articles[{{ $index }}][prix_achat]" value="{{old('articles[][prix_achat]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('articles.'.$index.'.prix_achat]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="articles[{{ $index }}][quantite]" value="{{old('articles[][quantite]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('articles.'.$index.'.quantite]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td data-label="Taxe">
                                    <div class="mb-6">
                                        <select id="taxe" name="taxe" value="{{old('taxe')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            <option value="0">0%</option>
                                            <option value="0.07">7%</option>
                                            <option value="0.1">10%</option>
                                            <option value="0.2" selected>20%</option>
                                        </select>
                                    </div>
                                </td>
                                <td data-label="P.H.T">
                                    <div class="mb-6">
                                        <input type="number" id="pht" name="pht" value="{{old('pht')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                    </div>
                                </td>
                                <td data-label="Marge">
                                    <div class="mb-6">
                                        <input type="number" id="marge" name="marge" value="{{old('marge')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                    </div>
                                </td>
                                <td>
                                    <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                        <span class="icon"><i class="fa fa-trash-can"></i></span>
                                    </button>     
                                </td>

                                <!-- ... repeat the above for other fields in the article ... -->

                            </tr>
                            @endforeach
                                
                            @endisset
              
                        </tbody>
                        </table>
                        @unless($errors->isEmpty())
                            <x-alert-error>
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                            </x-alert-error>
                        @endunless
                      <hr>
                      <div class="mt-5 md:w-full lg:w-full flex justify-center">
                        <button id="add-article-btn" class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Ajouter</button>
                        <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partir de produit</button>
                        <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partit de stock</button>
                    </div>
                </x-card-content>
            </x-card>    

            <x-card>
                <x-card-content>
                    <div class="grid lg:grid-cols-2 md:gap-6 mt-5 md:grid-rows-1">
                        <div class="m-2">
                            <div class="m-1">
                                <label for="towords" class=" underline">Arreté la présente demande d'achat (TTC):</label>
                                <input type="text" id="towords" name="towords" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            
                            </div>
                            <div class="m-1">
                                <label for="remarque">Remarque</label>
                                <input type="text" id="remarque" name="remarque" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        
                            </div>
                        </div>
                        <div class="m-2 grid grid-cols-2 mt-5">
                            {{-- Labels --}}
                            <div class="">
                                <div class="flex p-2 border border-solid">
                                    <label for="marge" class="rounded-none border border-opacity-0 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5">Total Marge:</label>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <label for="achat" class="rounded-none border border-opacity-0 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5">Total Achat:</label>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <label for="vente" class="rounded-none border border-opacity-0 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5">Total Vente:</label>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <label for="tva" class="rounded-none border border-opacity-0 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5">TVA Vente:</label>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <label for="totalvente" class="rounded-none border border-opacity-0 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5 font-bold">Total Vente:</label>
                                </div>
                            </div>
                            {{-- Inputs --}}
                            <div class="">
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="total_marge" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        HT
                                    </span>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="achat" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        HT
                                    </span>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="vente" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        HT
                                    </span>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="tva" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                                    <span id="spantva" class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        TVA
                                    </span>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="ttc" class="rounded-none bg-gray-50 border text-red-600 font-bold block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        TTC
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card-content>
            </x-card>    

            <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Submit</button>
        </form>  
    </section>
    <x-nav-bar/>
    <x-footer/>
    <x-flash-message/>
    <x-aside/>
</x-layout>
<script async="" src="{{asset('scripts/towords.js')}}"></script>
<script>
    $(document).ready(function() {
        
  
    var addressCount = 1;
    // Handle "Add Article" button click event
    $("#add-article-btn").click(function() {
        
        var newRow = `
        <tr class=" h-20">
                            <td data-label="Titre">
                                <div class="mb-6">
                                    <input type="text" id="titre" name="articles[`+addressCount+`][titre]" value="{{old('titre')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                </div>
                            </td>
                            <td data-label="Description">
                                <div class="mb-6">
                                    <textarea type="text" id="description" name="articles[`+addressCount+`][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{old('description')}}</textarea>

                                </div>       
                            </td>
                            <td data-label="Prix Vente">
                                <div class="mb-6">
                                    <input type="number" id="prix_vente" name="articles[`+addressCount+`][prix_vente]" value="{{old('prix_vente') ? old('prix_vente') : 0.00}}" class="prix_vente bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                                </div>    
                            </td>
                            <td data-label="Prix Achat">
                                <div class="mb-6">
                                    <input type="number" id="prix_achat" name="articles[`+addressCount+`][prix_achat]" value="{{old('prix_achat') ? old('prix_achat') : 0.00}}" class="prix_achat bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                                </div>
                            </td>
                            <td data-label="Quantité">
                                <div class="mb-6">
                                    <input type="number" id="quantite" name="articles[`+addressCount+`][quantite]" value="{{old('quantite') ? old('quantite') : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                                </div>
                            </td>
                            <td data-label="Taxe">
                                <div class="mb-6">
                                    <select id="taxe" name="taxe" class="taxe bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option value="0">0%</option>
                                        <option value="0.07">7%</option>
                                        <option value="0.1">10%</option>
                                        <option value="0.2" selected>20%</option>
                                    </select>
                                </div>
                            </td>
                            <td data-label="P.H.T">
                                <div class="mb-6">
                                    <input type="number" id="pht" name="pht" value="{{old('pht') ? old('pht') : 0.00}}" class="pht bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                </div>
                            </td>
                            <td data-label="Marge">
                                <div class="mb-6">
                                    <input type="marge" id="marge" name="marge" value="{{old('marge') ? old('marge') : 0.00}}" class="marge bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                </div>
                            </td>
                            <td>
                                <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                                </button>     
                            </td>
                        </tr>
        `;
        addressCount++;
        // Append the new row to the table
        $("#article-container").append(newRow);


        $(".prix_vente").keyup(function(){
            // calculate each row total
            var $row = $(this).closest("tr");
            var prix_vente = $(this).val();
            var quantite = $row.find(".quantite").val();
            var total = prix_vente * quantite;
            $row.find(".pht").val(total);
            // calculate each row margin
            var $row = $(this).closest("tr");
            var prix_achat = $row.find(".prix_achat").val();
            var prix_vente = $(this).val();
            var marge = prix_vente - prix_achat;
            $row.find(".marge").val(marge);
            // total margin
            var total_marge = 0;
            $(".marge").each(function(){
                total_marge += +$(this).val();
            });
            $("#total_marge").val(total_marge);
            // total vente 
            var total_vente = 0;
            $(".prix_vente").each(function(){
                total_vente += +$(this).val();
            });
            $("#vente").val(total_vente);
            // total tva
            var total_taxe = 0;
            $(".pht").each(function(){
                taxe = $(this).closest("tr").find(".taxe").val();
                pht = $(this).val();
                total_taxe += +pht * +taxe;
            });
            $("#tva").val(total_taxe);
            // total ttc
            var total_ttc = 0;
            var vente = $("#vente").val();
            var taxe = $("#tva").val();
            total_ttc = +vente + +taxe;
            $("#ttc").val(total_ttc);
            // towords
            var ttc = $("#ttc").val();
            var towords = NumberToLetter(ttc);
            console.log(towords);
            $("#towords").val(towords);
        });

        $(".quantite").keyup(function(){
            // calculate each row total
            var $row = $(this).closest("tr");
            var prix_vente = $row.find(".prix_vente").val();
            var quantite = $row.find(".quantite").val();
            var total = prix_vente * quantite;
            $row.find(".pht").val(total);
            // total tva
            var total_taxe = 0;
            $(".pht").each(function(){
                taxe = $(this).closest("tr").find(".taxe").val();
                pht = $(this).val();
                total_taxe += +pht * +taxe;
            });
            $("#tva").val(total_taxe);
            // total ttc
            var total_ttc = 0;
            var vente = $("#vente").val();
            var taxe = $("#tva").val();
            total_ttc = +vente + +taxe;
            $("#ttc").val(total_ttc);
            // towords
            var ttc = $("#ttc").val();
            var towords = NumberToLetter(ttc);
            $("#towords").val(towords);
        });

        // on change taxe
        $(".taxe").change(function(){
            // calculate each row total
            var $row = $(this).closest("tr");
            var prix_vente = $row.find(".prix_vente").val();
            var quantite = $row.find(".quantite").val();
            var total = prix_vente * quantite;
            $row.find(".pht").val(total);
            // total tva
            var total_taxe = 0;
            $(".pht").each(function(){
                taxe = $(this).closest("tr").find(".taxe").val();
                pht = $(this).val();
                total_taxe += +pht * +taxe;
            });
            $("#tva").val(total_taxe);
            // total ttc
            var total_ttc = 0;
            var vente = $("#vente").val();
            var taxe = $("#tva").val();
            total_ttc = +vente + +taxe;
            $("#ttc").val(total_ttc);
            // towords
            var ttc = $("#ttc").val();
            var towords = NumberToLetter(ttc);
            $("#towords").val(towords);
        });

        $(".prix_achat").keyup(function(){
            // calculate each row margin
            var $row = $(this).closest("tr");
            var prix_achat = $(this).val();
            var prix_vente = $row.find(".prix_vente").val();
            var marge = prix_vente - prix_achat;
            $row.find(".marge").val(marge);
            // total margin
            var total_marge = 0;
            $(".marge").each(function(){
                total_marge += +$(this).val();
            });
            $("#total_marge").val(total_marge);
            // total achat
            var total_achat = 0;
            $(".prix_achat").each(function(){
                total_achat += +$(this).val();
            });
            $("#achat").val(total_achat);
            // total tva
            var total_taxe = 0;
            $(".pht").each(function(){
                taxe = $(this).closest("tr").find(".taxe").val();
                pht = $(this).val();
                console.log(pht + " " + taxe);
                total_taxe += +pht * +taxe;
            });
            $("#tva").val(total_taxe);
            // total ttc
            var total_ttc = 0;
            var vente = $("#vente").val();
            var taxe = $("#tva").val();
            total_ttc = +vente + +taxe;
            $("#ttc").val(total_ttc);
            // towords
            var ttc = $("#ttc").val();
            var towords = NumberToLetter(ttc);
            $("#towords").val(towords);
        });


        





    });

    // Handle dynamically added row remove button click event
    $(document).on("click", ".remove-article-btn", function() {
        // Remove the parent row
        $(this).closest("tr").remove();
    });

    function findString(str, strToFind) {
        return str.toLowerCase().indexOf(strToFind.toLowerCase()) != -1;
    }

    // search client
    function autocomplete(inp, arr) {
        var currentFocus;
        var name = "data";
        console.log(arr);
        inp.on("input", function(e) {
        var val = $(this).val();
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        var div = $("<div class='absolute z-10 border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>")
            .addClass("autocomplete-items")
            .appendTo(inp.parent());
        
        for (var i = 0; i < arr.length; i++) {
            
            if (arr[i].person.nom.toUpperCase().includes(val.toUpperCase())
            // arr[i].person.nom.substr(0, val.length).toUpperCase() == val.toUpperCase()
            ) {
                // wrap the substring in strong tags
                var object = arr[i];
                var string = arr[i].person.nom.substr(0, arr[i].person.nom.toLowerCase().indexOf(val.toLowerCase()));
                string += "<strong>" + arr[i].person.nom.substr(arr[i].person.nom.toLowerCase().indexOf(val.toLowerCase()), val.length) + "</strong>";
                string += arr[i].person.nom.substr(arr[i].person.nom.toLowerCase().indexOf(val.toLowerCase()) + val.length);
                
                var item = $("<div class='border-t p-2 hover:bg-gray-200 cursor-pointer'>")
                    .append(string)
                    .data('client', object)
                    .on("click", function() {
                    inp.val($(this).text());
                    // remove client details div if it exists
                    $("#client-details-div").remove();
                    // add client details to the client details div
                    var client = $(this).data('client');
                    // add id to the client id input
                    $("#client_id").val(client.id);
                    var details = `<div id="client-details-div" class="flex flex-col">
                                    <strong >`+client.person.nom+` ` +client.person.prenom + `</strong>
                                    <span class="text-sm font-semibold">`+client.person.addresses[0].adresse+`</span>
                                    <span class="text-sm font-semibold">`+client.person.addresses[0].telephone+`</span>
                        </div>`;

                    $(details).appendTo("#client-infos-div");
                    // add client id to the client id input
                    
                    closeAllLists();
                    });
                item.appendTo(div);
            }
        }
        });

        inp.on("keydown", function(e) {
        var x = $(".autocomplete-items div");
        if (e.keyCode == 40) {
            // arrow down
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            // arrow up
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            // enter
            e.preventDefault();
            if (currentFocus > -1) {
            if (x) {
                x[currentFocus].click();
            }
            }
        }
        });

        function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
        }

        function closeAllLists(elmnt) {
        $(".autocomplete-items").remove();
        }

        $(document).on("click", function(e) {
        closeAllLists(e.target);
        });
    }

  // fetch clients
  function fetchClients() {
    $.ajax({
      url: "{{ route('clients.fetchAll') }}",
      type: "GET",
      dataType: "json",
      success: function(data) {
        console.log(data.clients);
        autocomplete($("#search_client"), data.clients);
        // $.each(data.clients, function (indexInArray, valueOfElement) { 
        //      console.log(valueOfElement.person.addresses);
        // });
        
      }
    });
  }
  fetchClients();  

  var clients = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "Andorra"
  ];

  //autocomplete($("#search_client"), clients);

    
    });
</script>