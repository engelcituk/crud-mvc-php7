
<div class="sidebar" data-color="rose" data-background-color="black" data-image="vistas/assets/img/sidebar-2.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          CO
        </a>
        <a href="#" class="simple-text logo-normal">
          CRUD OPERATIONS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="vistas/assets/img/faces/default-avatar.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
              <?php  echo $_SESSION["nombre"]; ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> U </span>
                    <span class="sidebar-normal"> <?php  echo $_SESSION["username"]; ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item" id="listaInicio">
            <a class="nav-link" href="inicio">
            <i class="fas fa-home"></i> 
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#paginasCrud">
            <i class="fas fa-user"></i> 
              
              <p> CRUD
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="paginasCrud">
              <ul class="nav">
                <li class="nav-item" id="listaCategorias">
                  <a class="nav-link" href="categorias">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Categorias </span>
                  </a>
                </li>
                <li class="nav-item " id="listaProductos">
                  <a class="nav-link" href="productos">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Productos </span>
                  </a>
                </li>
                <li class="nav-item" id="listaUsuarios">
                  <a class="nav-link" href="usuarios">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Usuarios </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>