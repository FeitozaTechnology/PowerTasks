<script src="<?php echo base_url('assets/js/upload_photo.js') ?>"></script>

<form action="<?php echo base_url('usuario/atualizar'); ?>" enctype="multipart/form-data" method="POST">
<div class="row">
  <div class="col-lg-6">

      <div class="input-container">
        <input type="text" name="name" value="<?php echo $user->name; ?>" id="name" required>
        <label for="name">Nome</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" name="email" value="<?php echo $user->email; ?>" id="email" required>
        <label for="email">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" id="password">
        <label for="password">Senha</label>
        <div class="bar text-right"><em>Digite para alterar</em></div>
      </div>

  </div>

  <div class="col-lg-4 text-center">
    <div>
      <img alt="Foto do Perfil" id="uploadPreview" width="200px" height="200px" src="<?php echo base_url('assets/img/users/'.$user->photo); ?>" class="img-circle">
      <br><br>
      <a href="#" onclick="file_photo();" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-camera"></i> Foto</a>
    </div>

    <div class="hidden">
    	<input type="file" name="photo" onchange="PreviewImage();" id="uploadImage">
    </div>
  </div>
</div>

<div class="button-container">
  <button><span>Atualizar</span></button>
</div>
</form>
