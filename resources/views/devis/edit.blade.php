<x-layout>
      
    <section class="section main-section mb-5">
        <a href="{{route('devis.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form id="your-form-id" method="POST" action="{{route('devis.update',['devis'=>$devis->id])}}">
            @method('PUT')
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Modifier Devis
                </x-card-header>
                <x-card-content>
                        
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="mb-6">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date <span class="text-red-600">*</span></label>
                                <input type="date" id="date" name="date" value="{{ $devis->date ? $devis->date : now()->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                @error('date')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="etat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat <span class="text-red-600">*</span></label>
                                <select type="text" id="etat" name="etat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo veniam eaque incidunt tenetur, quia voluptatibus aliquam nisi quibusdam? Iste quaerat provident deserunt velit autem fuga facilis possimus vero dolorem impedit.">
                                    <option value="En cours" {{ $devis->etat == 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Approuve" {{ $devis->etat == 'Approuve' ? 'selected' : '' }}>Approuvé</option>
                                    <option value="Brouillon" {{ $devis->etat == 'Brouillon' ? 'selected' : '' }}>Brouillon</option>
                                    <option value="Rejete" {{ $devis->etat == 'Rejete' ? 'selected' : '' }}>Rejeté</option>
                                    <option value="Annule" {{ $devis->etat == 'Annule' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                
                                @error('etat')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
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
                            </div>

                            <div class="m-1">
                                <label for="remarque">Remarque</label>
                                <input type="text" id="remarque" name="remarque" value="{{$devis->remarque}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('remarque')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <hr>

                </x-card-content>
            </x-card>

            <x-card class="mb-10 card has-table">
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
                            <th>Quantité</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="article-container">
                            @php
                                $index = 0;
                            @endphp
                            @foreach ($devis->ligneDevis as $ligneDevis)
                            <tr class="">
                                @php
                                    $index = $index + 1;
                                @endphp
                                <td data-label="Titre">
                                    <div class="mb-6">
                                        <input type="text" id="titre" name="articles[{{$index}}][titre]" value="{{$ligneDevis->article->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                    </div>
                                </td>
                                <td data-label="Description">
                                    <div class="mb-6">
                                        <textarea type="text" id="description" name="articles[{{$index}}][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{$ligneDevis->article->description}}</textarea>
                
                                    </div>       
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="articles[{{$index}}][quantite]" value="{{$ligneDevis->article->quantite ? $ligneDevis->article->quantite : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                
                                    </div>
                                </td>
                                <td class="actions-cell">
                                    <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                        <span class="icon"><i class="fa fa-trash-can"></i></span>
                                    </button>     
                                </td>
                            </tr>
                            @endforeach
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
        var addressCount = $("#article-container").children().length + 1;
        // Handle "Add Article" button click event
        $("#add-article-btn").click(function() {
            
            var newRow = `
            <tr class="">
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
                <td data-label="Quantité">
                    <div class="mb-6">
                        <input type="number" id="quantite" name="articles[`+addressCount+`][quantite]" value="{{old('quantite') ? old('quantite') : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>

                    </div>
                </td>
                <td class="actions-cell">
                    <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                        <span class="icon"><i class="fa fa-trash-can"></i></span>
                    </button>     
                </td>
            </tr>
            `;
            addressCount++;
            // Append the new row to the table
            $("#article-container").append(newRow);
        });

        // Handle dynamically added row remove button click event
        $(document).on("click", ".remove-article-btn", function() {
            // Remove the parent row
            $(this).closest("tr").remove();
        });

    
    });
</script>