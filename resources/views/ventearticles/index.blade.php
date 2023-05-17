<x-layout>
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Articles d'Achat 
      </h1>
      <a href="{{route('ventearticles.create')}}"><button class="button light">Ajouter</button></a>
    </div>
  </section>
  @include('partials._search', ['search_component' => 'ventearticle'])
  <section class="section main-section mb-10">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title text-lg">
          <span class="icon"><i class="fa fa-account-multiple"></i></span>
          List des Articles d'Achat 
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
              <th>Titre</th>
              <th>Description</th>
              <th>Code</th>
              <th>Prix</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @unless ($ventearticles->isEmpty())

            @foreach ($ventearticles as $ventearticle)
            <tr>
              <td data-label="Id">{{$ventearticle->id}}</td>
              <td data-label="Titre">{{$ventearticle->article->titre}}</td>
              <td data-label="Description">{{$ventearticle->article->description}}</td>
              <td data-label="Code">{{$ventearticle->article->code}}</td>
              <td data-label="Prix">{{$ventearticle->article->prix}}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small blue --jb-modal" data-target="sample-modal-2{{$ventearticle->id}}" type="button">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                  </button>
                  <a href="{{route('ventearticles.edit',['ventearticle'=>$ventearticle->id])}}">
                    <button class="button small green" type="button">
                      <span class="icon"><i class="fa fa-pen"></i></span>   
                    </button>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal{{$ventearticle->id}}" type="button">
                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                  </button>
                </div>
                {{-- Details Modal --}}
                <div id="sample-modal-2{{$ventearticle->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Details</p>
                    </header>
                    <section class="modal-card-body">
                      <div class="font-bold text-xl mb-2">
                        Details Article
                      </div>
                      <div class="mb-6">
                        <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                        <input type="text" id="titre" name="titre" value="{{$ventearticle->article->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled>

                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" id="description" name="description" value="{{$ventearticle->article->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" disabled>
                    </div>
                    <div class="mb-6">
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                        <input type="text" id="code" name="code" value="{{$ventearticle->article->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" disabled>

                    </div>
                    <div class="mb-6">
                        <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                        <input type="text" id="prix" name="prix" value="{{$ventearticle->article->prix}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXXXXXXXXX" disabled>

                    </div>
                  
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Cancel</button>
                      <button class="button blue --jb-modal-close">Confirm</button>
                    </footer>
                  </div>
                </div>
                {{-- Delete Modal --}}
                <div id="sample-modal{{$ventearticle->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Suppression</p>
                    </header>
                    <section class="modal-card-body">
                      <p>Vous etes sur vous voulez supprimez le ventearticle <b>{{$ventearticle->titre}}</b> ?</p>
                      <p>Clickez <b>Confirmer</b> pour proceder la suppression du ventearticle</p>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annuler</button>
                      <form method="POST" action="{{route('ventearticles.destroy',['ventearticle'=>$ventearticle->id])}}">
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

            <div class="notification red">
              <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                  <span class="icon"><i class="fa fa-buffer"></i></span>
                  <b>Empty table.</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
              </div>
            </div>

            <div class="card empty">
              <div class="card-content">
                <div>
                  <span class="icon large"><i class="fa fa-emoticon-sad fa-48px"></i></span>
                </div>
                <p>Nothing's here…</p>
              </div>
            </div>

            @endunless

          </tbody>
        </table>

        {{$ventearticles->links()}}
      </div>
    </div>
  </section>



  
  <x-nav-bar />
  <x-footer />
  <x-flash-message />
  <x-aside />
</x-layout>