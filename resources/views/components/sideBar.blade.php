<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/home" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{asset('ui/assets/img/icons/unicons/loo.png')}}" style="width: 40px" alt="">
        </span>
        <span class="app-brand-text menu-text fw-bolder ms-2" style="font-size: 25px">BiteDash</span>
      </a>
  
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>
  
    <div class="menu-inner-shadow"></div>
  
    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="/home" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      @auth
      <li class="menu-item ">
        <a href="{{route('users.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-user'></i>
          <div data-i18n="Analytics">Users</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('restaurants.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-store-alt'></i>
          <div data-i18n="Analytics">Restaurants</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('categories.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-category'></i>
          <div data-i18n="Analytics">Categories</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('dishes.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-dish'></i>
          <div data-i18n="Analytics">Dishes</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('orders.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-food-menu'></i>
          <div data-i18n="Analytics">Orders</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('orderItems.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bx bx-restaurant'></i>
          <i class=''></i>
          <div data-i18n="Analytics">Order Items</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('reviews.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-message-square-dots'></i>
          <div data-i18n="Analytics">Reviews</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('favorites.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-heart'></i>
          <div data-i18n="Analytics">Favorites</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('posts.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-copy-alt'></i>
          <div data-i18n="Analytics">Posts</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('comments.index')}}" class="menu-link">
          <i class='menu-icon tf-icons bx bxs-chat'></i>
          <div data-i18n="Analytics">Comments</div>
        </a>
      </li>
  
  
      @endauth
  
      
      <!-- Components -->
      
      
    </ul>
  </aside>