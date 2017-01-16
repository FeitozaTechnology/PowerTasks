<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/datatables.bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/datatables/js/jquery.datatables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/datatables.bootstrap.min.js'); ?>"></script>

<script>
  $(document).ready(function(){
    $('select').select2();

    $('[data-placement="top"]').tooltip();

    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('#table_members').DataTable({
      responsive: true
    });

    function formatState (state) {
    if (!state.id || state.value == "") { return state.text; }

      var $state = $(
        '<span><img width="30px;" src="<?php echo base_url(); ?>assets/img/users/' + state.title + '" class="img-flag" /> ' + state.text + '</span>'
      );
      return $state;
    };

    $(".js-example-templating").select2({
      templateResult: formatState
    });
  });
</script>

<!-- <div class="alert alert-info"> -->
  <strong>Nome do Time: </strong> <?php echo $team->name; ?><br>
  <strong>Descrição: </strong> <?php echo $team->description; ?><br>
  <strong>Criado em: </strong> <?php echo $team->created_in; ?>
<!-- </div> -->

<br><br>
<ul class="nav nav-tabs">
   <li class="active"><a href="#tasks" data-toggle="tab">Tarefas</a>
   </li>
   <li><a href="#members" data-toggle="tab">Membros</a>
   </li>
   <li><a href="#settings" data-toggle="tab">Configurações</a>
   </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="tasks">
    <br>
    <h4>Tarefas</h4>
  </div>
  <div class="tab-pane fade" id="members">
    <br>
    <h4>Membros</h4>

    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseAddMember" aria-expanded="false" aria-controls="collapseExample">
      <span class="fa fa-plus"></span> Adicionar Membro
    </a><br>
    <div class="collapse" id="collapseAddMember">
      <div class="well">
        <form action="<?php echo base_url('time/membro/adicionar'); ?>" method="post">
          <input type="hidden" name="team_id" value="<?php echo $team->id_team; ?>">
          <select name="member_id" style="width: 100%" class="js-example-templating js-states form-control input-lg">
            <option disabled selected value=""> -- Selecione -- </option>
            <?php
            foreach($availableMembers as $member){
              echo '<option value="',$member->id_user,'" title="',$member->photo,'">',$member->name,'</option>';
            }
            ?>
          </select><br>
          <button class="btn btn-primary">Confirmar</button>

        </form>
      </div>
    </div>

    <br><br>
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="table_members">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Adicionado em</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($members as $member){
              echo '<tr>';
              echo '<td><img width="30px" src="',base_url('assets/img/users/'.$member->photo),'" class="img-circle">&nbsp;&nbsp;', $member->name,'</td>';
              echo '<td>',$member->created_in,'</td>';
              echo '<td><a href="" data-placement="top" class="btn btn-sm btn-danger" title="Remover do Time"><span class="fa fa-trash"></span></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="settings">
    <br><br>
    <?php $this->load->view('team/edit'); ?>
  </div>
</div>
