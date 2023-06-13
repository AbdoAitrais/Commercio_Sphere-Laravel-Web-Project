<x-layout>
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Fournisseurs
      </h1>
      <a href="{{route('fournisseurs.create')}}"><button class="button light">Ajouter</button></a>
    </div>
  </section>
  @include('partials._search', ['search_component' => 'fournisseur'])
  <section class="section main-section mb-10">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title text-lg">
          <span class="icon"><i class="fa fa-account-multiple"></i></span>
          List des Fournisseurs
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="fa fa-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table class="text-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nom Fournisseur</th>
              <th>Prenom Fournisseur</th>
              <th>I.C.E</th>
              <th>Identifiant Fiscal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @unless ($fournisseurs->isEmpty())
            @foreach ($fournisseurs as $fournisseur)
            <tr>
              <td data-label="Id">{{$fournisseur->id}}</td>
              <td data-label="Nom Fournisseur">{{$fournisseur->person->nom}}</td>
              <td data-label="Prenom Fournisseur">{{$fournisseur->person->prenom}}</td>
              <td data-label="I.C.E">{{$fournisseur->person->ICE}}</td>
              <td data-label="Identifiant Fiscal">{{$fournisseur->person->IF}}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small blue --jb-modal" data-target="sample-modal-2{{$fournisseur->id}}" type="button">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                  </button>
                  <a href="{{route('fournisseurs.edit',['fournisseur'=>$fournisseur->id])}}">
                    <button class="button small green" type="button">
                      <span class="icon"><i class="fa fa-pen"></i></span>   
                    </button>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal{{$fournisseur->id}}" type="button">
                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                  </button>
                </div>
                {{-- Details Modal --}}
                <div id="sample-modal-2{{$fournisseur->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Details</p>
                    </header>
                    <section class="modal-card-body">
                      <div class="font-bold text-xl mb-2">
                        Details Fournisseur
                      </div>
                      <div class="mb-6">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom Fournisseur <span class="text-red-600">*</span></label>
                        <input type="text" id="nom" name="nom" value="{{$fournisseur->person->nom}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled>

                    </div>
                    <div class="mb-6">
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom Fournisseur <span class="text-red-600">*</span></label>
                        <input type="text" id="prenom" name="prenom" value="{{$fournisseur->person->prenom}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" disabled>
                    </div>
                    <div class="mb-6">
                        <label for="IF" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IF <span class="text-red-600">*</span></label>
                        <input type="text" id="IF" name="IF" value="{{$fournisseur->person->IF}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" disabled>

                    </div>
                    <div class="mb-6">
                        <label for="ICE" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">I.C.E <span class="text-red-600">*</span></label>
                        <input type="text" id="ICE" name="ICE" value="{{$fournisseur->person->ICE}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXXXXXXXXX" disabled>

                    </div>
                    {{-- Adresse facturation --}}
                    @foreach ($fournisseur->addresses as $addresse)
                    @if ($addresse->type == 'facturation')
                      <div class="font-bold text-xl mb-2">
                        Adresse Facturation
                      </div>
                    @elseif ($addresse->type == 'livraison')
                      <div class="font-bold text-xl mb-2">
                        Adresse Livraison
                      </div>
                    @endif
                      <div class="mb-6">
                        <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre <span class="text-red-600">*</span></label>
                        <input type="text" id="titre" name="titre" value="{{$addresse->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" disabled>

                      </div>
                      <div class="mb-6">
                          <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone <span class="text-red-600">*</span></label>
                          <input type="text" id="telephone" name="telephone" value="{{$addresse->telephone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212 xxxxxxx" disabled>

                      </div>
                      <div class="mb-6">
                          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail <span class="text-red-600">*</span></label>
                          <input type="text" id="email" name="email" value="{{$addresse->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="peter@zylker.com" disabled>

                      </div>
                      <div class="mb-6">
                          <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse <span class="text-red-600">*</span></label>
                          <input type="text" id="adresse" name="adresse" value="{{$addresse->adresse}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678" disabled>

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
                <div id="sample-modal{{$fournisseur->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Suppression</p>
                    </header>
                    <section class="modal-card-body">
                      <p>Vous etes sur vous voulez supprimez le fournisseur <b>{{$fournisseur->nom}}</b> ?</p>
                      <p>Clickez <b>Confirmer</b> pour proceder la suppression du fournisseur</p>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annuler</button>
                      <form method="POST" action="{{route('fournisseurs.destroy',['fournisseur'=>$fournisseur->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="button red --jb-modal-close">Confirmer</button>
                      </form>
                    </footer>
                  </div>
                </div>
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

        {{$fournisseurs->links()}}
      </div>
    </div>
  </section>



  
  <x-nav-bar />
  <x-footer />
  <x-flash-message />
  <x-aside />
</x-layout>