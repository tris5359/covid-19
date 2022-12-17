<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin - COVID19</title>
    
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/logo/bkl.png"/>
    <!-- Favicon-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/fontawesome/css/font-awesome.min.css">

    <!-- css notif -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/cssNotif.css">
    

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/sweetalert/sweetalerts.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>/assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url() ?>/assets/plugin/morrisjs/morris.css" rel="stylesheet" />


    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/default.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/componen1.css" />
        <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url() ?>/assets/plugin/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
    <link href="<?php echo base_url() ?>/assets/css/stylee.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/plugin/tinymce/tinymce.min.js" rel="stylesheet" />
    <!-- TinyMCE -->
    <script src="<?php echo base_url() ?>/assets/plugin/tinymce/tinymce.js"></script>

  <style type="text/css">
      /* fallback */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(<?php echo base_url()?>assets/fonts/fonticon.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
    </style>

</head>
  <script>
    
tinymce.init({
  selector: 'textarea',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap  emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  height: 300,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: 'sliding',
  contextmenu: "link image imagetools table",
 });



  </script>

    <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="margin-top:70px;z-index:998"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="margin-top:70px;z-index:998"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>