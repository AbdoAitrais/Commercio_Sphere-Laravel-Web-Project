<x-layout>
      
    <section class="section main-section mb-5">
        <a href="{{route('demandeachats.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form id="your-form-id" method="POST" action="{{route('demandeachats.update',['demandeachat'=>$demandeachat->id])}}">
            @method('PUT')
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Modifier Demande d'achat
                </x-card-header>
                <x-card-content>
                        
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="mb-6">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date <span class="text-red-600">*</span></label>
                                <input type="date" id="date" name="date" value="{{ $demandeachat->date ? $demandeachat->date : now()->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre Produit" required>
                                @error('date')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="etat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat <span class="text-red-600">*</span></label>
                                <select type="text" id="etat" name="etat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo veniam eaque incidunt tenetur, quia voluptatibus aliquam nisi quibusdam? Iste quaerat provident deserunt velit autem fuga facilis possimus vero dolorem impedit.">
                                    <option value="En cours" {{ $demandeachat->etat == 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Approuve" {{ $demandeachat->etat == 'Approuve' ? 'selected' : '' }}>Approuvé</option>
                                    <option value="Brouillon" {{ $demandeachat->etat == 'Brouillon' ? 'selected' : '' }}>Brouillon</option>
                                    <option value="Rejete" {{ $demandeachat->etat == 'Rejete' ? 'selected' : '' }}>Rejeté</option>
                                    <option value="Annule" {{ $demandeachat->etat == 'Annule' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                
                                @error('etat')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="m-1">
                                <label for="remarque">Remarque</label>
                                <input type="text" id="remarque" name="remarque" value="{{$demandeachat->remarque}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                            @foreach ($demandeachat->virtuelLigneAchats as $virtuelLigneAchat)
                            <tr class="">
                                @php
                                    $index = $index + 1;
                                @endphp
                                <td data-label="Titre">
                                    <div class="mb-6">
                                        <input type="text" id="titre" name="articles[{{$index}}][titre]" value="{{$virtuelLigneAchat->article->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                    </div>
                                </td>
                                <td data-label="Description">
                                    <div class="mb-6">
                                        <textarea type="text" id="description" name="articles[{{$index}}][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>{{$virtuelLigneAchat->article->description}}</textarea>
                
                                    </div>       
                                </td>
                                <td data-label="Quantité">
                                    <div class="mb-6">
                                        <input type="number" id="quantite" name="articles[{{$index}}][quantite]" value="{{$virtuelLigneAchat->quantite ? $virtuelLigneAchat->quantite : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                
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
                        <button type="button" id="add-article-btn" class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Ajouter</button>
                        <button type="button" id="show-sample-modal-frequent-product" class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partir de produit</button>
                        <button type="button" id="show-sample-modal-stock-product" class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Ajouter à partit de stock</button>
                    </div>
                    {{-- Frequent Product Modal --}}
                    <div id="sample-modal-frequent-product" class="modal">
                        <div class="modal-background --jb-modal-close"></div>
                        <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-titre">Recherche</p>
                        </header>
                        <section id="frequentarticles-infos-div" class="modal-card-body">
                            <div class="font-bold text-xl mb-2">
                                Chercher un produit fréquent
                            </div>
    
                            <div class="flex w-full z-0">
                                <div class=" flex-grow z-0">
                                    <input type="text" id="search_article_frequent" name="search_article_frequent" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chercher Article">

                                </div>
                                {{-- search button --}}
                                <div class="flex-grow-0 ml-2">
                                     
                                </div>
                            </div>
                        </section>
                        <footer class="modal-card-foot">
                            <button type="button" class="button --jb-modal-close">Annulé</button>
                            <button type="button" class="button blue --jb-modal-close">Confirmer</button>
                        </footer>
                        </div>
                    </div>
                    {{-- Stock Product Modal --}}
                    <div id="sample-modal-stock-product" class="modal">
                        <div class="modal-background --jb-modal-close"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <p class="modal-card-titre">Recherche</p>
                            </header>
                            <section id="stockarticles-infos-div" class="modal-card-body h-60">
                                <div class="font-bold text-xl mb-2">
                                    Chercher un article en stock
                                </div>
        
                                <div class="flex w-full z-0">
                                    <div class=" flex-grow z-0">
                                        <input type="text" id="search_article_stock" name="search_article_stock" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chercher Article">
                                    </div>
                                    {{-- search button --}}
                                    <div class="flex-grow-0 ml-2">
                                        
                                        
                                    </div>
                                </div>
                            
                            </section>
                            <footer class="modal-card-foot">
                                <button type="button" class="button --jb-modal-close">Annulé</button>
                                <button type="button" class="button blue --jb-modal-close">Confirmer</button>
                            </footer>
                        </div>
                    </div>
                </x-card-content>
            </x-card>     

            <div class="w-full flex justify-center">
            <button class="m-2 md:w-full lg:w-auto hidden md:block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Soumettre</button>

            </div>
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

    // close modals on click on close button --jb-modal-close
    $("#show-sample-modal-frequent-product").each(function(i, item) {
            $(item).on("click", function() {
                $("#sample-modal-frequent-product").show();
            })
        })
        $("#show-sample-modal-stock-product").each(function(i, item) {
            $(item).on("click", function() {
                $("#sample-modal-stock-product").show();
            })
        })
        $(".--jb-modal-close").each(function(i, item) {
            $(item).on("click", function() {
                $(".modal").hide();
            })
        })

        // autocompleteArticleInStock
    function autocompleteArticle(inp, arr, article_type) {
        var currentFocus;
        // console.log(arr);
        inp.on("input", function(e) {
        var val = $(this).val();
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        var div = $("<div class=' border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>")
            .addClass("autocompleteArticles-items")
            .appendTo(inp.parent());
        
        for (var i = 0; i < arr.length; i++) {
            
            if (arr[i].description.toUpperCase().includes(val.toUpperCase())
            // arr[i].description.substr(0, val.length).toUpperCase() == val.toUpperCase()
            ) {
                // wrap the substring in strong tags
                var object = arr[i];
                var string = arr[i].description.substr(0, arr[i].description.toLowerCase().indexOf(val.toLowerCase()));
                string += "<strong>" + arr[i].description.substr(arr[i].description.toLowerCase().indexOf(val.toLowerCase()), val.length) + "</strong>";
                string += arr[i].description.substr(arr[i].description.toLowerCase().indexOf(val.toLowerCase()) + val.length);
                
                var item = $("<div class='border-t p-2 hover:bg-gray-200 cursor-pointer'>")
                    .append(string)
                    .data('article', object)
                    .on("click", function() {
                    inp.val($(this).text());
                    // remove article details div if it exists
                    $("#article"+article_type+"-details-div").remove();
                    // add article details to the article details div
                    var article = $(this).data('article');
                    // add id to the article id input
                    var addressCount = $("#article-container").children().length + 1;
                                var newRow = `
                    <tr class="">
                        <td data-label="Titre">
                            <div class="mb-6">
                                <input type="text" id="titre" name="articles[`+addressCount+`][titre]" value="`+article.titre+`" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                        </td>
                        <td data-label="Description">
                            <div class="mb-6">
                                <textarea type="text" id="description" name="articles[`+addressCount+`][description]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>`+article.description+`</textarea>
                            </div>
                        </td>
                        <td data-label="Quantité">
                            <div class="mb-6">
                                <input type="number" id="quantite" name="articles[`+addressCount+`][quantite]" value="{{old('quantite') ? old('quantite') : 1}}" class="quantite bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                            </div>
                        </td>
                        <td>
                            <button class="remove-article-btn bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded-2xl mb-6" type="button">
                                <span class="icon"><i class="fa fa-trash-can"></i></span>
                            </button>     
                        </td>
                        </tr>
                    `;
                    var details = `<div id="article`+article_type+`-details-div" class="flex flex-col">
                                    <strong >` +article.titre + `</strong>
                                    <span class="text-sm font-semibold">`+article.description+`</span>
                        </div>`;

                    $(details).appendTo("#"+article_type+"articles-infos-div");
                    // append new row
                    $("#article-container").append(newRow);
                    
                    closeAllLists();
                    });
                item.appendTo(div);
            }
        }
        });

        inp.on("keydown", function(e) {
        var x = $(".autocompleteArticles-items div");
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
        x[currentFocus].classList.add("autocompleteArticles-active");
        }

        function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocompleteArticles-active");
        }
        }

        function closeAllLists(elmnt) {
        $(".autocompleteArticles-items").remove();
        }

        $(document).on("click", function(e) {
        closeAllLists(e.target);
        });
        
    }

    // fetch stock articles
    function fetchArticles() {
        $.ajax({
        url: "{{ route('articles.articlesInStock') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {
            // console.log(data.articles);

            
            // if data.articles is empty then show a message to the user
            if(data.articles.length == 0) {
                $("#stockarticles-infos-div").html("<span class='text-sm font-semibold'>Aucun article en stock</span>");
            }else{
                autocompleteArticle($("#search_article_stock"), data.articles, "stock");
            }
            // $.each(data.articles, function (indexInArray, valueOfElement) { 
            //      console.log(valueOfElement.person.addresses);
            // });
                
        }
        });

    }
    fetchArticles();

    // fetch frequent articles
    function fetchFrequentArticles() {
        $.ajax({
        url: "{{ route('articles.articlesFrequent') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {
            // console.log(data.articles);

            
            // if data.articles is empty then show a message to the user
            if(data.articles.length == 0) {
                $("#frequentarticles-infos-div").html("<span class='text-sm font-semibold'>Aucun article fréquent</span>");
            }else{
            autocompleteArticle($("#search_article_frequent"), data.articles, "frequent");
            }
            // $.each(data.articles, function (indexInArray, valueOfElement) { 
            //      console.log(valueOfElement.person.addresses);
            // });
                
        }
        });

    }
    fetchFrequentArticles();

    });
</script>