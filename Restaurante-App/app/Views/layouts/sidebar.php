		<nav id="sidebar" class="sidebar js-sidebar">
		    <div class="sidebar-content js-simplebar">
		        <a class="sidebar-brand" href="index.html">
		            <span class="align-middle">AdminKit</span>
		        </a>

		        <ul class="sidebar-nav">
		            <li class="sidebar-header">
		                Pages
		            </li>

                    <li class="sidebar-item <?= (current_url() == base_url('/dashboard')) ? 'active' : '' ?>">
                        <a class="sidebar-link" href="<?= base_url('/dashboard') ?>">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>


		            <li class="sidebar-item <?= (current_url() == base_url('/usuarios')) ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('/usuarios') ?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuarios</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="pages-sign-in.html">
		                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="pages-sign-up.html">
		                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="pages-blank.html">
		                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
		                </a>
		            </li>

		            <li class="sidebar-header">
		                Tools & Components
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="ui-buttons.html">
		                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="ui-forms.html">
		                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
		                </a>
		            </li>
                    <!-- Submenu de ejemplo -->
                    <li class="sidebar-item">
                        <a data-bs-target="#submenu-ejemplo" data-bs-toggle="collapse" class="sidebar-link d-flex align-items-center">
                            <i class="align-middle" data-feather="layers"></i> 
                            <span class="align-middle">Gestión</span>
                            <i class="chevron-icon align-middle ms-auto" data-feather="chevron-down"></i> <!-- Flecha que cambiará -->
                        </a>
                        <ul id="submenu-ejemplo" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="usuarios.html">Usuarios</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="roles.html">Roles</a>
                            </li>
                        </ul>
                    </li>



		            <li class="sidebar-item">
		                <a class="sidebar-link" href="ui-cards.html">
		                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="ui-typography.html">
		                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="icons-feather.html">
		                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
		                </a>
		            </li>

		            <li class="sidebar-header">
		                Plugins & Addons
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="charts-chartjs.html">
		                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
		                </a>
		            </li>

		            <li class="sidebar-item">
		                <a class="sidebar-link" href="maps-google.html">
		                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
		                </a>
		            </li>
		        </ul>

		    </div>
		</nav>
        <script>
            
        </script>