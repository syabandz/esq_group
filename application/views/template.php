<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sya'BaNdz :: Doc's</title>
        <link rel="icon"       type="image/x-icon" href="<?php echo base_url(); ?>assets/images/sya.png" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/waves.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-material-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/waitMe.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-table.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/themes/all-themes.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-select.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/morris.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.ui.datepicker.monthyearpicker.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <style>
            /* set accounting */
            .ac{
                text-align:right;
            }
            /* all header table */
            th{
                text-align:center;
            }
            /* all header table just for number and action  */
            .th{
                text-align:center;
            }
            /* setting modules icons */
            .icons{
                line-height:50px;
                font-size:22px;
            }
            .icon{
                line-height:50px;
                font-size:30px;
            }
            /* setting form-labels for all label forms */
            .form-labels{
                color: #aaa;
                font-family: sans-serif;
            }
        </style>
    </head>

    <!-- <body class="theme-red" onload="window.print()"> -->
    <body class="theme-red">
        
        <!-- <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait ...</p>
            </div>
        </div> -->

        <?php $this->load->view('sidebar'); ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                        <?php
                        echo $contents;
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autosize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/basic-form-elements.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autosize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-table.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chart.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.price_format.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.datepicker.monthyearpicker.js"></script>

        <script type="text/javascript">

        // uploads photo js
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
                //  alert("fake subminting")
                return false
            })
        })

        //  setting date
        $(document).ready(function(){
            $('#date').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'clip',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date1').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'fadeIn',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date2').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'blind',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date3').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'drop',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date4').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'bounce',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date5').datepicker({
                dateFormat: 'yy-mm-dd',
                outoclose:true,
                showAnim:'slideDown',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date6').datepicker({
                dateFormat: 'dd/mm/yy',
                outoclose:true,
                showAnim:'fold',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date7').datepicker({
                dateFormat: 'dd/mm/yy',
                outoclose:true,
                showAnim:'slide',
            });
        });

        //  setting date
        $(document).ready(function(){
            $('#date8').datepicker({
                dateFormat: 'dd/mm/yy',
                outoclose:true,
                showAnim:'slide',
                // showAnim:'slideDown',
                // showAnim:'fadeIn',
                // showAnim:'blind',
                // showAnim:'bounce',
                // showAnim:'drop',
                // showAnim:'fold',
                // showAnim:'clip',
            });
        });

        </script>
        <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()",1000);  
        function waktu() {   
        var tanggal = new Date();  
        setTimeout("waktu()",1000);  
        document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
        }
        </script>

    </body>
</html>