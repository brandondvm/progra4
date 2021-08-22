<div class="heladeria-wrapper heladeria-usuarios container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-usuarios-header">
        <p class="heladeria-usuarios-title">Usuarios</p>
        <a class="primary-button" href="?c=agregar_usuario">Agregar</a>
      </div>      
    </div>
  </div>
  
  <div class="row heladeria-usuarios-lista">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <?php foreach($users as $user) { ?>
        <div class="heladeria-usuario-card card">
          <div class="card-body">
            <h5 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->name ?></h5>
            <p class="card-text"><span>Email:</span> <?php echo $user->email ?></p>
            <p class="card-text"><span>Dirección:</span> <?php echo $user->address ?></p>
            <p class="card-text"><span>Telefono:</span> <?php echo $user->phone ?></p>
            <p class="card-text"><span>Edad:</span> <?php echo $user->age ?></p>
            <p class="card-text"><span>Role:</span>
              <?php
                switch($user->role) {
                  case 1:
                    echo "Admin";
                    break;
                  case 2:
                    echo "Editor";
                    break;
                  default:
                    echo "Cliente";
                }
              ?>
            </p>
            <div class="heladeria-usuario-buttons">
              <a class="heladeria-producto-option heladeria-producto-edit" href="?c=update_usuario&id=<?php echo $user->getElement("id")?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a class="heladeria-producto-option heladeria-producto-delete" href="?c=delete_usuario&id=<?php echo $user->getElement("id")?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
            </div>            
          </div>
        </div>
      <?php } ?>
      <?php if (empty($users)) { ?>
        <div class="heladeria-empty-container">
          <i class="fa fa-warning" aria-hidden="true"></i>
          <h1>No hay usuarios en el sistema</h1>
        </div>
      <?php } ?>
    </div>    
  </div>  
</div>