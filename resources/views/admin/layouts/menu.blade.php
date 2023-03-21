<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('asset-admin')}}/images/admin-logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="{{route('category.index')}}">
            <i class="fa fa-th"></i> <span>Quản lý danh mục </span>
          </a>
        </li>
        <li>
          <a href="{{route('brand.index')}}">
            <i class="fa fa-th"></i> <span>Quản lý thương hiệu </span>
          </a>
        </li>
        <li>
          <a href="{{route('product.index')}}">
            <i class="fa fa-th"></i> <span>Quản lý sản phẩm </span>
          </a>
        </li>
        <li>
          <a href="{{route('order.index')}}">
            <i class="fa fa-th"></i> <span>Quản lý đơn hàng </span>
          </a>
        </li>
        <li>
          <a href="{{route('user-admin.index')}}">
            <i class="fa fa-th"></i> <span>Danh sách người dùng </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>