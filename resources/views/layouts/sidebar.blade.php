<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Core Sale -->
                <div class="sb-sidenav-menu-heading">Core Sale</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Interface / Setup -->
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseSetup" aria-expanded="false" aria-controls="collapseSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSetup" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('setup.category') }}">Category</a>
                        <a class="nav-link" href="{{ route('setup.product') }}">Product</a>
                        <a class="nav-link" href="{{ route('setup.customer') }}">Customer</a>
                        <a class="nav-link" href="{{ route('setup.supplier') }}">Supplier</a>
                    </nav>
                </div>

                <!-- Purchase -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapsePurchase" aria-expanded="false" aria-controls="collapsePurchase">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Purchase
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePurchase" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('purchase.purchase') }}">Purchase</a>
                    </nav>
                </div>

            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
        </div>
    </nav>
</div>
