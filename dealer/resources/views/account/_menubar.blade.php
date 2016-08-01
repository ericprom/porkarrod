<nav class="sub-navbar">
  <div class="container">
    <ul class="nav nav-pills">
      <li role="presentation" {{{ (Request::is('account/dashboard') ? 'class=active' : '') }}}>
        <a href="{{ url('/account/dashboard') }}" class="submenu">Dashboard</a>
      </li>
      <li role="presentation" {{{ (Request::is('account/shop') ? 'class=active' : '') }}}>
        <a href="{{ url('/account/shop') }}" class="submenu">My shop</a>
      </li>
      <li role="presentation" {{{ (Request::is('account/profile') ? 'class=active' : '') }}}>
        <a href="{{ url('/account/profile') }}" class="submenu">Profile</a>
      </li>
      <li role="presentation" {{{ (Request::is('account/partners') ? 'class=active' : '') }}}>
        <a href="{{ url('/account/partners') }}" class="submenu">Partners</a>
      </li>
    </ul>
  </div>
</nav>
