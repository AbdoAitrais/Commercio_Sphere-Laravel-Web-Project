<x-layout>
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Tables
      </h1>
      <a href="{{route('clients.create')}}"><button class="button light">Ajouter</button></a>
    </div>
  </section>
  @include('partials._search')
  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="fa fa-account-multiple"></i></span>
          Clients
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="fa fa-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table class="text-sm">
          <thead>
            <tr>
              <th class="checkbox-cell">
                <label class="checkbox">
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </th>
              <th>Client</th>
              <th>ICE</th>
              <th>Ville</th>
              <th>addresse</th>
              <th>tel</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @unless (empty($clients))

            @foreach ($clients as $client)
            <tr>
              <td class="checkbox-cell">
                <label class="checkbox">
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </td>
              <td data-label="client">{{$client->nom . " " . $client->prenom}}</td>
              <td data-label="ice">{{$client->ICE}}</td>
              <td data-label="ville">{{$client->ville}}</td>
              <td data-label="addresse">
                {{$client->adresse}}
              </td>
              <td data-label="tel">
                <small class="text-gray-500" title="Oct 25, 2021">{{$client->telephone}}</small>
              </td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{route('clients.show',['client'=>$client->id])}}">
                    <button class="button small green --jb-modal" type="button">
                      <span class="icon"><i class="fa fa-eye"></i></span>
                    </button>
                  </a>
                  <button class="button small red --jb-modal" data-target="sample-modal{{$client->id}}" type="button">
                    <span class="icon"><i class="fa fa-trash-can"></i></span>
                  </button>
                </div>
                {{-- Modal --}}
                <div id="sample-modal{{$client->id}}" class="modal">
                  <div class="modal-background --jb-modal-close"></div>
                  <div class="modal-card">
                    <header class="modal-card-head">
                      <p class="modal-card-title">Suppression</p>
                    </header>
                    <section class="modal-card-body">
                      <p>Vous etes sur vous voulez supprimez le client <b>{{$client->nom}}</b> ?</p>
                      <p>Clickez <b>Confirmer</b> pour proceder la suppression du client</p>
                    </section>
                    <footer class="modal-card-foot">
                      <button class="button --jb-modal-close">Annuler</button>
                      <form method="POST" action="{{route('clients.destroy',['client'=>$client->id])}}">
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

        {{$clients->links()}}
      </div>
    </div>
  </section>



  {{-- <div id="sample-modal-2" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Sample modal</p>
      </header>
      <section class="modal-card-body">
        <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
        <p>This is sample modal</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button --jb-modal-close">Cancel</button>
        <button class="button blue --jb-modal-close">Confirm</button>
      </footer>
    </div>
  </div> --}}
  <x-nav-bar />
  <x-footer />
  <x-flash-message />
  <x-aside />
</x-layout>