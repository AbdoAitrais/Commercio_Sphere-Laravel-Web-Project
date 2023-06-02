<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Commercio <b class="font-black">Sphere</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="active">
        <a href="/"> 
          <span class="icon"><i class="fa fa-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Examples</p>
    <ul class="menu-list">
      <li>
        <a class="dropdown">
          <span class="icon"><i class="fa fa-file-invoice"></i></span>
          <span class="menu-item-label">Ventes</span>
          <span class="icon"><i class="fa fa-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="#">
              <span>Bon de Livraison</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="fa-regular fa-file"></i></span>
          <span class="menu-item-label">Achats</span>
          <span class="icon"><i class="fa fa-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="#">
              <span>Bon de Commande</span>
            </a>
          </li>
          <li>
            <a href="{{route('demandeachats.index')}}">
              <span>Demande d'Achat</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="fa fa-cart-shopping"></i></span>
          <span class="menu-item-label">Stock</span>
          <span class="icon"><i class="fa fa-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="{{route('articles.index')}}">
              <span>Articles</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="fa fa-user"></i></span>
          <span class="menu-item-label">Contacts</span>
          <span class="icon"><i class="fa fa-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="{{route('clients.index')}}">
              <span>Clients</span>
            </a>
          </li>
          <li>
            <a href="{{route('fournisseurs.index')}}">
              <span>Fournisseurs</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>