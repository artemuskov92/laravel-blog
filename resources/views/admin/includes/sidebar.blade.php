<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bolder ms-2">admin panel</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ (request()->is('admin-panel')) ? 'active' : '' }}">
      <a href="{{route('admin')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>


    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item {{ (request()->is('admin-panel/posts')) ? 'active' : '' }}">
      <a href="{{route('posts.index')}}" class="menu-link " >
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Post</div>
      </a>
    </li>
    <li class="menu-item {{ (request()->is('admin-panel/categories')) ? 'active' : '' }}">
      <a href="{{route('categories.index')}}" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Categories</div>
      </a>
    </li>
    <li class="menu-item {{ (request()->is('admin-panel/tags')) ? 'active' : '' }}">
      <a href="{{route('tags.index')}}" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Tags</div>
      </a>
    </li>
    <li class="menu-item {{ (request()->is('admin-panel/comments')) ? 'active' : '' }}">
      <a href="{{route('comments.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Comments</div>
      </a>
    </li>
    <li class="menu-item {{ (request()->is('admin-panel/users')) ? 'active' : '' }}">
      <a href="{{route('users.index')}}" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Users</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Subscribers</div>
      </a>
    </li>
  </ul>
</aside>