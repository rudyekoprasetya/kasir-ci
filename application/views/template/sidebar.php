<ul class="nav navbar-nav side-nav">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('transaksi') ?>"><i class="fa fa-money"></i> Transaksi</a></li>
			<li><a href="<?php echo site_url('admin/barang') ?>"><i class="fa fa-list-ul"></i> Barang</a></li>
            <li><a href="<?php echo site_url('admin/penjualan') ?>"><i class="fa fa-tag"></i> Penjualan</a></li>
			<li><a href="<?php echo site_url('admin/pembelian') ?>"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>      
      <li><a href="<?php echo site_url('admin/admin') ?>"><i class="fa fa-users"></i> Administrasi</a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('laporan/penjualan') ?>"><i class="fa fa-book"></i> Penjualan</a></li>
            <li><a href="<?php echo site_url('laporan/pembelian') ?>"><i class="fa fa-book"></i> Pembelian</a></li>
          </ul>
      </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> User Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
              </ul>
</li>