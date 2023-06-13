<x-layout>
  <style>
    .active {

  background-color: #f5f5f5;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
  /* Add styles for active state */
  border-width: 2px;
  border-color: #e2e8f0;
}

    </style>
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Demandes d'achat
      </h1>
      <a href="{{route('demandeachats.create')}}"><button class="button light">Ajouter</button></a>
    </div>
  </section>
  <form action="{{route('demandeachats.index')}}">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
      <div class="absolute top-4 left-3">
        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
      </div>
      <input type="text" name="date" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
        placeholder="Chercher Une date 2000-12-31" />
      <div class="absolute top-2 right-2">
        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-blue-500 hover:bg-blue-600">
          Search
        </button>
      </div>
    </div>
</form>
  <section class="section main-section mb-10">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title text-lg">
          <span class="icon"><i class="fa fa-account-multiple"></i></span>
          List des demandes d'achat
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="fa fa-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <form action="{{route('demandeachats.index')}}">
        <input type="text" name="etat" id="etat" hidden>
          <ul id="etat_list" class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="mr-2">
              
              <button data-etat="En cours" aria-current="page" class="inline-block p-4 hover:bg-gray-100 {{$filters['etat'] == 'En cours' ? 'active' : ''}}" type="submit">
                <span class=" bg-blue-500 text-white pl-1 pr-1 pt-0.5 pb-1">
                  En cours ({{$etatArray['En cours'] ?? 0}}) 
                </span>
              </button>
            </li>
            <li class="mr-2">
              
              <button data-etat="Approuve" class="inline-block p-4 rounded-t-lg  hover:bg-gray-100 {{$filters['etat'] == 'Approuve' ? 'active' : ''}}" type="submit">
                <span class=" bg-green-600 text-white pl-1 pr-1 pt-0.5 pb-1">
                  Approuvé ({{$etatArray['Approuve'] ?? 0}})
                </span>
              </button>
            </li>
            <li class="mr-2">
                
                <button data-etat="Brouillon" class="inline-block p-4 rounded-t-lg hover:bg-gray-100 {{$filters['etat'] == 'Brouillon' ? 'active' : ''}}" type="submit">
                  <span class=" bg-gray-600 text-white pl-1 pr-1 pt-0.5 pb-1">
                    Brouillon ({{$etatArray['Brouillon'] ?? 0}})
                  </span>
                </button>
            </li>
            <li class="mr-2">
                
                <button data-etat="Rejete" class="inline-block p-4 rounded-t-lg  hover:bg-gray-100 {{$filters['etat'] == 'Rejete' ? 'active' : ''}}" type="submit">
                  <span class=" bg-yellow-500 text-white pl-1 pr-1 pt-0.5 pb-1">
                    Rejeté ({{$etatArray['Rejete'] ?? 0}})
                  </span>
                </button>
            </li>
            <li class="mr-2">
                
                <button data-etat="Annule" class="inline-block p-4 rounded-t-lg  hover:bg-gray-100 {{$filters['etat'] == 'Annule' ? 'active' : ''}}" type="submit">
                  <span class=" bg-red-600 text-white pl-1 pr-1 pt-0.5 pb-1">
                    Annulé ({{$etatArray['Annule'] ?? 0}})
                  </span>
                </button>
            </li>
        </ul>
        </form>
        <table class="text-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Numero</th>
              <th>Etat</th>
              <th>Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @unless ($demandeachats->isEmpty())

            @foreach ($demandeachats as $demandeachat)
            <tr>
              <td data-label="Id">{{$demandeachat->id}}</td>
              <td data-label="Date">{{$demandeachat->numero}}</td>
              <td data-label="Description">
                <span class="{{
                  // use the ternary operator to return the corresponding color
                  $demandeachat->etat == 'En cours' ? 'bg-blue-500' : ($demandeachat->etat == 'Approuve' ? 'bg-green-600' : ($demandeachat->etat == 'Brouillon' ? 'bg-gray-600' : ($demandeachat->etat == 'Rejete' ? 'bg-yellow-500' : 'bg-red-600')))
                  }} text-white pl-1 pr-1 pt-0.5 pb-1">{{$demandeachat->etat}}</span>
              </td>
              <td data-label="Date">{{$demandeachat->date}}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{route('demandeachats.pdf',['demandeachat'=>$demandeachat->id])}}" target="_blank">
                    <button class="button small bg-gray-500" data-target="sample-modal-pdf-{{$demandeachat->id}}" type="button" title="document">
                      <span class="icon"><i class="fa-regular fa-file-pdf text-white"></i></span>   
                    </button>
                  </a>
                  <button class="button small blue --jb-modal" data-target="sample-modal-2{{$demandeachat->id}}" type="button" title="details">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                  </button>
                  <a href="{{route('demandeachats.edit',['demandeachat'=>$demandeachat->id])}}">
                    <button class="button small green" type="button" title="modifier">
                      <span class="icon"><i class="fa fa-pen"></i></span>   
                    </button>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal-{{$demandeachat->id}}" type="button" title="supprimer">
                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                  </button>
                </div>
                {{-- Details Modal --}}
                <div id="sample-modal-2{{$demandeachat->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Details</p>
                    </header>
                    <section class="modal-card-body">
                      <div class="font-bold text-xl mb-2">
                        Details de la demande d'achat
                      </div>

                      <div class="mb-6">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="text" id="date" name="date" value="{{$demandeachat->date}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled>

                      </div>
                      <div class="mb-6">
                          <label for="etat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat</label>
                          <input type="text" id="etat" name="etat" value="{{$demandeachat->etat}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" disabled>
                      </div>
                      
                      @foreach ($demandeachat->virtuelLigneAchats as $virtuelLigneAchat)
                      <div class="font-bold text-xl mb-2">
                        Article {{$loop->iteration}}
                      </div>
                        <div class="mb-6">
                          <label for="titre{{$loop->iteration}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                          <input type="text" id="titre{{$loop->iteration}}" name="titre" value="{{$virtuelLigneAchat->article->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled>

                        </div>
                        <div class="mb-6">
                            <label for="description{{$loop->iteration}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <input type="text" id="description{{$loop->iteration}}" name="description" value="{{$virtuelLigneAchat->article->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" disabled>
                        </div>
                        <div class="mb-6">
                          <label for="quantite{{$loop->iteration}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité</label>
                          <input type="number" min="0" id="quantite{{$loop->iteration}}" name="quantite" value="{{$virtuelLigneAchat->quantite}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXXXXXXXXX" disabled>
                        </div>
                      @endforeach
                  
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annulé</button>
                      <button class="button blue --jb-modal-close">Confirmer</button>
                    </footer>
                  </div>
                </div>
                {{-- Delete Modal --}}
                <div id="sample-modal-{{$demandeachat->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Suppression</p>
                    </header>
                    <section class="modal-card-body">
                      <p>Vous etes sur vous voulez supprimez le demandeachat <b>{{$demandeachat->date}}</b> ?</p>
                      <p>Clickez <b>Confirmer</b> pour proceder la suppression du demandeachat</p>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annuler</button>
                      <form method="POST" action="{{route('demandeachats.destroy',['demandeachat'=>$demandeachat->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="button red --jb-modal-close">Confirmer</button>
                      </form>
                    </footer>
                  </div>
                </div>
                {{-- PDF Modal --}}
                {{-- <div id="sample-modal-pdf-{{$demandeachat->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">PDF</p>
                    </header>
                    <section class="modal-card-body">
                      <iframe id="pdfContainer{{ $demandeachat->id }}" width="100%" height="500px" frameborder="0">
                        
                      </iframe>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annuler</button>
                    </footer>
                  </div>
                </div> --}}
              </td>
            </tr>
            @endforeach


            @else

            <tr>
<div class="notification red">
              <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                  <span class="icon"><i class="fa-brands fa-buffer"></i></span>
                  <b>Empty table.</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
              </div>
            </div>

            
</tr>

            @endunless

          </tbody>
        </table>

        {{$demandeachats->links()}}
      </div>
    </div>
  </section>



  
  <x-nav-bar />
  <x-footer />
  <x-flash-message />
  <x-aside />
</x-layout>

<script>
  $(document).ready(function() {
    // Get all the buttons
    const buttons = $('.button[data-target^="sample-modal-"]');

    // Add a click event listener to each button
    buttons.on('click', function() {
      const modalId = $(this).data('target'); // Get the modal ID from the data-target attribute
      const modal = $('#' + modalId); // Get the modal element using the ID

      modal.show(); // Show the modal
    });
    

    // Add a click event listener to the close buttons and modal backgrounds
    const closeModalElements = $('.--jb-modal-close');
    closeModalElements.on('click', function() {
      const modal = $(this).closest('.modal'); // Get the closest modal element

      modal.hide(); // Hide the modal
    });

    

    // select #etat_list's list items
    const etatListItems = $('#etat_list li');
    // select etatListItems's buttons
    const etatListButtons = etatListItems.find('button');

    etatListButtons.each(function() {
    $(this).on('click', function() {
      var element1 = etatListItems.find('button.active');
      // element1.removeClass('active');
      // $(this).addClass('active');

      const etat = $(this).data('etat');
      const etatInput = $('#etat');
      etatInput.val(etat);
    });
  });



  });
</script>

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            @foreach ($demandeachats as $demandeachat)
                $('#sample-modal-pdf-{{ $demandeachat->id }}').on('show.bs.modal', function(event) {
                    var modal = $(this);
                    var pdfBase64 = '{{ $pdfBase64Array[$demandeachat->id] }}';

                    modal.find('#pdfContainer{{ $demandeachat->id }}').attr('src', 'data:application/pdf;base64,' + pdfBase64);
                });
            @endforeach
        });
    </script>
@endpush --}}