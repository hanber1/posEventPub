<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mitarbeiter verwalten
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mitarbeiter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>

                <?php if (in_array('createUser', $user_permission)) : ?>
                <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Mitarbeiter hinzufügen</a>
                <br /> <br />
                <?php endif; ?>


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mitarbeiter verwalten</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <!-- <th>Geburtsdatum</th> -->
                                    <th>E-Mail Adresse</th>
                                    <th>Telefonnummer</th>
                                    <th>Benutzergruppe</th>
                                    <th>Status</th>

                                    <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                                    <th>Aktion</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($user_data) : ?>
                                <?php foreach ($user_data as $k => $v) : ?>

                                <tr>
                                    <td><?php echo $v['user_info']['name'] . ' ' . $v['user_info']['vorname']; ?></td>
                                    <!-- <td><?php  ?></td> -->
                                    <td><?php echo $v['user_info']['email']; ?></td>
                                    <td><?php echo $v['user_info']['telefon']; ?></td>
                                    <td><?php echo $v['user_group']['bezeichnung']; ?></td>
                                    <?php $status = ($v['user_info']['status'] == 1) ? '<span class="label label-success">Aktiv</span>' : '<span class="label label-warning">Inaktiv</span>'; ?>

                                    <td><?php echo $status; ?></td>

                                    <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>

                                    <td>
                                        <?php if (in_array('updateUser', $user_permission)) : ?>
                                        <a href="<?php echo base_url('users/edit/' . $v['user_info']['id']) ?>" class="btn btn-primary" title="Bearbeiten"><i class="fa fa-pencil"></i></a>
                                        <?php endif; ?>
                                        <?php if (in_array('deleteUser', $user_permission)) : ?>
                                        <a href="<?php echo base_url('users/delete/' . $v['user_info']['id']) ?>" class="btn btn-danger" title="Löschen"><i class="fa fa-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- col-md-12 -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#userTable').DataTable({
            'order': [],
        });

        $("#userMainNav").addClass('active');
        $("#userSubMenu").addClass('active');
    });
</script> 