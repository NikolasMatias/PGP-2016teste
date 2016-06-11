<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Subject | My Study Life</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href={{url('/plugins/datepicker/datepicker3.css')}}>
  <link rel="stylesheet" href={{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}>
  <link rel="stylesheet" href={{url('/plugins/select2/select2.min.css')}}>
  <link rel="stylesheet" href={{url('/resources/css/AdminLTE.min.css')}}>
  <link rel="stylesheet" href={{url('/resources/css/skins/skin-blue.min.css')}}>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href={{url('/home')}} class="logo">
      <span class="logo-mini"><b>My</b></span>
      <span class="logo-lg"><b>My Study Life</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href={{url('/settings')}} title="Settings"><i class="ion-gear-a"></i></a>
          </li>
          <!-- Logout Sidebar Toggle Button -->
          <li>
            <a href={{url('/logout')}} title="Logout"><i class="ion-log-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src={{url('/resources/img/user.jpg')}} class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php $user = \Auth::user();?>
          <p><?php echo $user->name?></p>
          <p><?php echo $user->email?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
        <!-- Optionally, you can add icons to the links -->
        <li><a href={{url('/home')}}><i class="ion-home"></i> <span>Home</span></a></li>
        <li><a href={{url('/calendar')}}><i class="ion-calendar"></i> <span>Calendar</span></a></li>
        <li><a href={{url('/tasks')}}><i class="ion-compose"></i> <span>Tasks</span></a></li>
        <li><a href={{url('/exams')}}><i class="ion-document-text"></i> <span>Exams</span></a></li>
        <li><a href={{url('/schedule')}}><i class="ion-university"></i> <span>Schedule</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $subject->name?>
        <small><?php echo $subject->teacher?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-3">
        <div class="row">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newTaskModal">New Task</button>
        </div>
        </br>
        <div class="row">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newExamModal">New Exam</button>
        </div>
        </br>
        <div class="row">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newScheduleModal">New Schedule</button>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <i class="ion-star"></i>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="https://github.com/nikolassupremo/PGP-2016">My Study Life</a>.</strong> Gerência de Projeto de Software.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Modal New Task -->
<div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="newTaskModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new Task</h4>
      </div>
      <form action="{{url('/newTask')}}<?php echo '/'.$subject->id?>" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <input type="text" class="form-control" placeholder="Task title" name="title">
            </div>
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="taskDueDate" placeholder="Due date" name="due_date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <textarea rows="10" class="form-control" placeholder="Task description" name="description"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Task</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal New Exam -->
<div class="modal fade" id="newExamModal" tabindex="-1" role="dialog" aria-labelledby="newExamModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new Exam</h4>
      </div>
      <form action="{{url('/newExam')}}<?php echo '/'.$subject->id?>" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="examDate" placeholder="Exam date" name="date">
              </div>
            </div>
            <div class="form-group has-feedback col-md-6">
              <div class="input-group bootstrap-timepicker">
                <input type="text" class="form-control timepicker pull-left" id="examTime" placeholder="Exam start time" name="start_time">
                <div class="input-group-addon">
                  <i class="ion-clock"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <input type="text" class="form-control" placeholder="Exam building" name="building">
            </div>
            <div class="form-group has-feedback col-sm-6">
              <input type="text" class="form-control" placeholder="Exam room" name="room">
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <textarea rows="10" class="form-control" placeholder="Exam description" name="description"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Exam</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal New Schedule -->
<div class="modal fade" id="newScheduleModal" tabindex="-1" role="dialog" aria-labelledby="newScheduleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new Schedule</h4>
      </div>
      <form action="{{url('/newSchedule')}}<?php echo '/'.$subject->id?>" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <input type="text" class="form-control" placeholder="Schedule building" name="building">
            </div>
            <div class="form-group has-feedback col-sm-6">
              <input type="text" class="form-control" placeholder="Schedule room" name="room">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <select class="form-control select2" multiple="multiple" data-placeholder="Select a Day" style="width: 100%;" name="day[]">
                <option value="1">Sunday</option>
                <option value="2">Monday</option>
                <option value="3">Tuesday</option>
                <option value="4">Wednesday</option>
                <option value="5">Thursday</option>
                <option value="6">Friday</option>
                <option value="7">Saturday</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-md-6">
              <div class="input-group bootstrap-timepicker">
                <input type="text" class="form-control timepicker pull-left" id="scheduleStartTime" placeholder="Schedule start time" name="startTime">
                <div class="input-group-addon">
                  <i class="ion-clock"></i>
                </div>
              </div>
            </div>
            <div class="form-group has-feedback col-md-6">
              <div class="input-group bootstrap-timepicker">
                <input type="text" class="form-control timepicker pull-left" id="scheduleEndTime" placeholder="Schedule end time" name="endTime">
                <div class="input-group-addon">
                  <i class="ion-clock"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Schedule</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src={{url('/plugins/jQuery/jQuery-2.2.0.min.js')}}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{url('/bootstrap/js/bootstrap.min.js')}}></script>
<!-- Datepicker -->
<script src={{url('/plugins/datepicker/bootstrap-datepicker.js')}}></script>
<!-- Timepicker -->
<script src={{url('/plugins/timepicker/bootstrap-timepicker.min.js')}}></script>
<!-- Select2 -->
<script src={{url('/plugins/select2/select2.full.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{url('/resources/js/app.min.js')}}></script>

<script>
  //Date picker
  $(".select2").select2();
  
  $('#taskDueDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#examDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  
  $("#examTime").timepicker({
    showMeridian: false,
    showInputs: false
  });
  $("#scheduleStartTime").timepicker({
    showMeridian: false,
    showInputs: false
  });
  $("#scheduleEndTime").timepicker({
    showMeridian: false,
    showInputs: false
  });
</script>
</body>
</html>
