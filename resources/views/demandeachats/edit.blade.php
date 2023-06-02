<x-layout>
    <section class="section main-section mb-5">
        <a href="{{route('demandeachats.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form method="POST" action="{{route('demandeachats.update',['demandeachat'=>$demandeachat->id])}}">
            @method('PUT')
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Modifier Article
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
                                <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre <span class="text-red-600">*</span></label>
                                <input type="text" id="titre" name="titre" value="{{$demandeachat->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                @error('titre')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span class="text-red-600">*</span></label>
                                <textarea type="text" id="description" name="description" value="{{$demandeachat->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo veniam eaque incidunt tenetur, quia voluptatibus aliquam nisi quibusdam? Iste quaerat provident deserunt velit autem fuga facilis possimus vero dolorem impedit." required></textarea>
                                @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <hr>

                </x-card-content>
            </x-card>

            <section class="section main-section mb-10">
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
                    <table class="text-sm">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Description</th>
                          <th>Code</th>
                          <th>Prix</th>
                          <th>Quantité</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
            

                        <tr>
                            <td data-label="Titre">
                                <div class="mb-6">
                                    <input type="text" id="titre" name="titre" value="{{$demandeachat->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" required>
                                    @error('titre')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </td>
                            <td data-label="Description">
                                <div class="mb-6">
                                    <textarea type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" required>
                                        {{$demandeachat->description}}
                                    </textarea>
                                    @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>       
                            </td>
                            <td data-label="Code">
                                <div class="mb-6">
                                    <input type="text" id="code" name="code" value="{{$demandeachat->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" required>
                                    @error('code')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>    
                            </td>
                            <td data-label="Prix">
                                <div class="mb-6">
                                    <input type="number" id="prix" name="prix" value="{{$demandeachat->prix}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.99" required>
                                    @error('prix')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>    
                            </td>
                            <td data-label="Quantité">
                                <div class="mb-6">
                                    <input type="number" id="quantite" name="quantite" value="{{$demandeachat->quantite}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.99" required>
                                    @error('quantite')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </td>
                            <td data-label="Taxe">
                                <div class="mb-6">
                                    <select id="taxe" name="taxe" value="{{$demandeachat->taxe}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.99" required>
                                        <option value="0">0%</option>
                                        <option value="0.07">7%</option>
                                        <option value="0.1">10%</option>
                                        <option value="0.2" selected>20%</option>
                                    </select>
                                    @error('taxe')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </td>
                            <td data-label="P.H.T">
                                <div class="mb-6">
                                    <input type="number" id="pht" name="pht" value="{{$demandeachat->pht}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.99" required>
                                    @error('pht')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </td>
                        

                          <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <button class="button small red --jb-modal" type="button">
                                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                                </button>

                            </div>
                            
                        
                          </td>
                        </tr>
            
                      </tbody>
                    </table>
            
                    {{$demandeachats->links()}}
                  </div>
                </div>
              </section>

            <div class="mt-5 md:w-full lg:w-full flex justify-center">
                <button type="submit" class="md:w-full lg:w-auto hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </section>
    <x-nav-bar/>
    <x-footer/>
    <x-flash-message/>
    <x-aside/>
</x-layout>