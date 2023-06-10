<x-layout>
      
    <section class="section main-section mb-5">
        <a href="{{route('demandeachats.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form id="your-form-id" method="POST" action="{{route('demandeachats.store')}}">
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Ajouter Demande d'achat
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
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date <span class="text-red-600">*</span></label>
                                <input type="date" id="date" name="date" value="{{ old('date') ? old('date') : now()->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                @error('date')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="etat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat <span class="text-red-600">*</span></label>
                                <select type="text" id="etat" name="etat" value="{{old('etat')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo veniam eaque incidunt tenetur, quia voluptatibus aliquam nisi quibusdam? Iste quaerat provident deserunt velit autem fuga facilis possimus vero dolorem impedit." required>
                                    <option value="En cours">En cours</option>
                                    <option value="Approuve">Approuvé</option>
                                    <option value="Brouillon">Brouillon</option>
                                    <option value="Rejete">Rejeté</option>
                                    <option value="Annule">Annulé</option>4
                                </select>
                                @error('etat')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <hr>

                </x-card-content>
            </x-card>

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
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Taxe</th>
                            <th>P.H.T</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="article-container">
              
  
                            {{-- <tr class=" h-20">
                                <td data-label="Titre">
                                    <div class="mb-6">
                                        <input type="text" id="titre" name="virtuelarticles[][titre]" value="{{old('virtuelarticles[][titre]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                        @error('virtuelarticles[][titre]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </td>
                                <td data-label="Description">
                                    <div class="mb-6">
                                        <textarea type="text" id="description" name="virtuelarticles[][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{old('virtuelarticles[][description]')}}</textarea>
                                        @error('virtuelarticles[][description]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>       
                                </td>
                                <td data-label="Prix">
                                    <div class="mb-6">
                                        <input type="number" id="prix" name="virtuelarticles[][prix]" value="{{old('virtuelarticles[][prix]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('virtuelarticles[][prix]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>    
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="virtuelarticles[][quantite]" value="{{old('virtuelarticles[][quantite]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('virtuelarticles[][quantite]')
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
                                
                            

                            @foreach($formFields['virtuelarticles'] as $index => $virtuelarticle)

                            <tr class=" h-20">

                                <div class="mb-6">
                                    <label for="titre{{ $index }}">Titre</label>
                                    <input type="text" id="titre{{ $index }}" name="virtuelarticles[{{ $index }}][titre]" value="{{ old('virtuelarticles.'.$index.'.titre') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @error('virtuelarticles.'.$index.'.titre')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="description{{ $index }}">Description</label>
                                    <textarea id="description{{ $index }}" name="virtuelarticles[{{ $index }}][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('virtuelarticles.'.$index.'.description') }}</textarea>
                                    @error('virtuelarticles.'.$index.'.description')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <td data-label="Prix">
                                    <div class="mb-6">
                                        <input type="number" id="prix" name="virtuelarticles[{{ $index }}][prix]" value="{{old('virtuelarticles[][prix]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('virtuelarticles.'.$index.'.prix]')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>    
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="virtuelarticles[{{ $index }}][quantite]" value="{{old('virtuelarticles[][quantite]')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                        @error('virtuelarticles.'.$index.'.quantite]')
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
                                <label for="numbertowords" class=" underline">Arreté la présente demande d'achat (TTC):</label>
                                <input type="text" id="numbertowords" name="numbertowords" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            
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
                                    <input type="number" min="0" value="0" id="marge" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
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
                                        20%
                                    </span>
                                </div>
                                <div class="flex p-2 border border-solid">
                                    <input type="number" min="0" value="0" id="totalvente" class="rounded-none bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
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

<script>
    $(document).ready(function() {
        var addressCount = 1;
        // Handle "Add Article" button click event
        $("#add-article-btn").click(function() {
            
            var newRow = `
            <tr class=" h-20">
                                <td data-label="Titre">
                                    <div class="mb-6">
                                        <input type="text" id="titre" name="virtuelarticles[`+addressCount+`][titre]" value="{{old('titre')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                    </div>
                                </td>
                                <td data-label="Description">
                                    <div class="mb-6">
                                        <textarea type="text" id="description" name="virtuelarticles[`+addressCount+`][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{old('description')}}</textarea>

                                    </div>       
                                </td>
                                <td data-label="Prix">
                                    <div class="mb-6">
                                        <input type="number" id="prix" name="virtuelarticles[`+addressCount+`][prix]" value="{{old('prix') ? old('prix') : 0.00}}" class="prix bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                                    </div>    
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="virtuelarticles[`+addressCount+`][quantite]" value="{{old('quantite') ? old('quantite') : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                                    </div>
                                </td>
                                <td data-label="Taxe">
                                    <div class="mb-6">
                                        <select id="taxe" name="taxe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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


            $(".prix").keyup(function(){
                // calculate each row total
                var $row = $(this).closest("tr");
                var prix = $row.find(".prix").val();
                var quantite = $row.find(".quantite").val();
                var total = prix * quantite;
                $row.find(".pht").val(total);
            });

            $(".quantite").keyup(function(){
                // calculate each row total
                var $row = $(this).closest("tr");
                var prix = $row.find(".prix").val();
                var quantite = $row.find(".quantite").val();
                var total = prix * quantite;
                $row.find(".pht").val(total);
            });




        });

        // Handle dynamically added row remove button click event
        $(document).on("click", ".remove-article-btn", function() {
            // Remove the parent row
            $(this).closest("tr").remove();
        });

    
    });
</script>